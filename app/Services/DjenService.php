<?php

namespace App\Services;

use App\Exceptions\DjenException;
use App\Models\Process;
use App\Models\ProcessPublication;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

/**
 * Integração com o DJEN (Diário de Justiça Eletrônico Nacional), exposto pelo
 * sistema "Comunica" do CNJ.
 *
 * Documentação: https://hcomunicaapi.cnj.jus.br/swagger/index.html
 *
 * Endpoint de consulta pública (sem autenticação):
 *   GET {base}/api/v1/comunicacao
 *      ?numeroProcesso=NNNNNNNNNNNNNNNNNNNN (20 dígitos, sem máscara)
 *      &siglaTribunal=TRF3|TJSP|...
 *      &pagina=1&itensPorPagina=50 (máx. 50)
 *
 * Resposta: { "count": N, "items": [ ... ] }
 *
 * Observações importantes:
 *  - A API faz GEO-BLOQUEIO (retorna 403 para origens fora do Brasil).
 *  - O campo "texto" traz HTML hostil (usa class/style que conflitam com o
 *    Tailwind global) e deve ser sanitizado antes de renderizar.
 *  - itensPorPagina tem limite silencioso de 50 itens.
 */
class DjenService
{
    protected string $baseUrl;
    protected int $timeout;
    protected int $retries;
    protected int $retryDelay;
    protected bool $cacheEnabled;
    protected int $cacheTtl;
    protected int $maxPages;

    public function __construct()
    {
        $this->baseUrl = rtrim(config('djen.base_url'), '/');
        $this->timeout = (int) config('djen.timeout', 40);
        $this->retries = (int) config('djen.retries', 2);
        $this->retryDelay = (int) config('djen.retry_delay', 500);
        $this->cacheEnabled = (bool) config('djen.cache_enabled', true);
        $this->cacheTtl = (int) config('djen.cache_ttl', 86400);
        $this->maxPages = (int) config('djen.max_pages', 200);
    }

    /**
     * Busca todas as publicações/intimações de um processo no DJEN.
     *
     * @return array{count: int, items: array}
     */
    public function getPublicacoes(string $tribunal, string $numeroProcesso, ?int $maxPages = null): array
    {
        $tribunal = strtoupper(trim($tribunal));
        $numero = preg_replace('/\D/', '', $numeroProcesso);

        if (strlen($numero) !== 20) {
            throw new DjenException(
                'O número do processo precisa ter 20 dígitos para a consulta no DJEN.'
            );
        }

        $maxPages = $maxPages ?? $this->maxPages;
        $all = [];
        $count = 0;
        $pagina = 1;

        do {
            $params = [
                'numeroProcesso' => $numero,
                'siglaTribunal' => $tribunal,
                'pagina' => $pagina,
                'itensPorPagina' => 50, // limite máximo aceito pela API
            ];

            $body = $this->cached(
                $this->cacheKey($tribunal, $numero, $pagina),
                fn () => $this->request($params)
            );

            $items = $body['items'] ?? [];

            if ($pagina === 1) {
                $count = (int) ($body['count'] ?? 0);
            }

            $all = array_merge($all, $items);
            $pagina++;

            // Se a página veio vazia, não há mais nada a buscar.
            if (empty($items)) {
                break;
            }
        } while (count($all) < $count && $pagina <= $maxPages);

        return ['count' => $count, 'items' => $all];
    }

    /**
     * URL da certidão (PDF) de uma publicação a partir do seu hash (id).
     */
    public function getCertidaoUrl(string $hash): string
    {
        return $this->baseUrl.'/api/v1/comunicacao/'.rawurlencode($hash).'/certidao';
    }

    /**
     * Normaliza um item do DJEN para o formato de armazenamento.
     */
    public function normalize(array $item): array
    {
        $texto = (string) ($item['texto'] ?? '');

        return [
            'djen_id' => $item['id'] ?? null,
            'numero_processo' => $item['numero_processo'] ?? $item['numeroProcesso'] ?? null,
            'sigla_tribunal' => $item['siglaTribunal'] ?? null,
            'tipo' => $item['tipoComunicacao'] ?? $item['tipoDocumento'] ?? null,
            'documento_tipo' => $item['tipoDocumento'] ?? null,
            'texto' => $texto,
            'texto_html' => $this->sanitizeHtml($texto),
            'data_disponibilizacao' => $this->toDate($item['data_disponibilizacao'] ?? $item['datadisponibilizacao'] ?? null),
            'data_publicacao' => $this->toDate($item['dataPublicacao'] ?? null),
            'orgao_julgador' => $item['nomeOrgao'] ?? $item['orgaoJulgador'] ?? null,
            'classe' => $item['nomeClasse'] ?? $item['classe'] ?? null,
            'assuntos' => $this->normalizeAssuntos($item['assuntos'] ?? null),
            'cancelado' => ! empty($item['motivo_cancelamento']) || ($item['ativo'] ?? true) === false,
            'motivo_cancelamento' => $item['motivo_cancelamento'] ?? null,
            'certidao_url' => isset($item['hash'])
                ? $this->getCertidaoUrl((string) $item['hash'])
                : (isset($item['id']) ? $this->getCertidaoUrl((string) $item['id']) : null),
            'source_data' => $item,
        ];
    }

    /**
     * Sincroniza (inserindo/atualizando) as publicações do DJEN para um processo.
     *
     * @return int Total de publicações persistidas.
     */
    public function syncPublications(Process $process): int
    {
        $tribunal = strtoupper(trim((string) ($process->court_acronym ?? '')));
        $numero = preg_replace('/\D/', '', (string) ($process->cnj_number ?: $process->process_number ?: ''));

        if (empty($tribunal) || strlen($numero) !== 20) {
            return 0;
        }

        $result = $this->getPublicacoes($tribunal, $numero);

        $saved = 0;
        foreach ($result['items'] as $item) {
            $data = $this->normalize($item);

            if (empty($data['djen_id'])) {
                continue;
            }

            ProcessPublication::updateOrCreate(
                [
                    'process_id' => $process->id,
                    'djen_id' => $data['djen_id'],
                ],
                $data
            );

            $saved++;
        }

        return $saved;
    }

    // ---------------------------------------------------------------------
    // Internos
    // ---------------------------------------------------------------------

    /**
     * Executa a requisição HTTP (com cache opcional por página).
     */
    protected function request(array $params): array
    {
        $url = $this->baseUrl.'/api/v1/comunicacao';

        try {
            $response = Http::withHeaders(['Accept' => 'application/json'])
                ->timeout($this->timeout)
                ->retry($this->retries, $this->retryDelay)
                ->get($url, $params);
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            throw new DjenException('Falha de conexão com o DJEN: '.$e->getMessage());
        }

        if ($response->status() === 403) {
            throw new DjenException(
                'O DJEN retornou 403 (geo-bloqueio). A sincronização deve ser executada a partir de um IP no Brasil.'
            );
        }

        if ($response->failed()) {
            throw new DjenException(
                'O DJEN retornou o status '.$response->status().': '.$response->body()
            );
        }

        $json = $response->json();

        if (! is_array($json)) {
            throw new DjenException('Resposta inválida do DJEN (JSON esperado).');
        }

        return $json;
    }

    protected function cacheKey(string $tribunal, string $numero, int $pagina): string
    {
        return 'djen.'.strtolower($tribunal).'.'.$numero.'.p'.$pagina;
    }

    protected function cached(string $key, callable $callback)
    {
        if (! $this->cacheEnabled) {
            return $callback();
        }

        return Cache::remember($key, $this->cacheTtl, $callback);
    }

    /**
     * Converte a data do DJEN (timestamp de 14 dígitos ou string ISO) para date.
     */
    protected function toDate($value): ?string
    {
        if (empty($value)) {
            return null;
        }

        if (is_numeric($value) && strlen((string) $value) === 14) {
            try {
                return \Carbon\Carbon::createFromFormat('YmdHis', (string) $value, 'America/Sao_Paulo')
                    ->toDateString();
            } catch (\Throwable $e) {
                // ignora e tenta os formatos abaixo
            }
        }

        foreach (['Y-m-d', 'Y-m-d H:i:s', 'd/m/Y', 'd/m/Y H:i'] as $fmt) {
            try {
                return \Carbon\Carbon::createFromFormat($fmt, (string) $value)->toDateString();
            } catch (\Throwable $e) {
                // tenta o próximo formato
            }
        }

        try {
            return \Carbon\Carbon::parse($value)->toDateString();
        } catch (\Throwable $e) {
            return null;
        }
    }

    protected function normalizeAssuntos($assuntos): ?string
    {
        if (empty($assuntos)) {
            return null;
        }

        if (! is_array($assuntos)) {
            return (string) $assuntos;
        }

        return implode('; ', array_map(function ($a) {
            if (is_array($a)) {
                return $a['nome'] ?? ($a['descricao'] ?? '');
            }

            return (string) $a;
        }, $assuntos));
    }

    /**
     * Sanitiza o HTML hostil do DJEN, removendo scripts, estilos e atributos
     * perigosos (class/style/id/on*) que conflitam com o Tailwind global.
     */
    protected function sanitizeHtml(string $html): string
    {
        $html = trim((string) $html);

        if ($html === '') {
            return '';
        }

        $dom = new \DOMDocument();

        $previous = libxml_use_internal_errors(true);
        // Garante UTF-8 e evita a injeção de <html>/<body> em torno do fragmento.
        $dom->loadHTML('<?xml encoding="utf-8" ?><div>'.$html.'</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        $removeTags = ['script', 'style', 'iframe', 'object', 'embed', 'link', 'meta', 'base', 'form', 'input', 'button', 'img'];
        foreach ($removeTags as $tag) {
            while (($nodes = $dom->getElementsByTagName($tag)) && $nodes->length > 0) {
                $node = $nodes->item(0);
                if ($node->parentNode) {
                    $node->parentNode->removeChild($node);
                }
            }
        }

        $xpath = new \DOMXPath($dom);

        // Remove atributos perigosos de qualquer elemento.
        $dangerous = ['onerror', 'onload', 'onclick', 'onmouseover', 'onmouseout', 'onfocus', 'onblur', 'style', 'class', 'id'];
        foreach ($xpath->query('//*') as $node) {
            foreach ($dangerous as $attr) {
                if ($node->hasAttribute($attr)) {
                    $node->removeAttribute($attr);
                }
            }
        }

        // Mantém apenas links http(s)/mailto. Demais hrefs são removidos.
        foreach ($xpath->query('//a[@href]') as $a) {
            $href = $a->getAttribute('href');
            if (! preg_match('#^(https?://|mailto:|/)#i', $href)) {
                $a->removeAttribute('href');
            }
        }

        $result = $dom->saveHTML($dom->documentElement ?: $dom);

        // Remove a <div> "wrapper" que adicionamos.
        $result = preg_replace('#^<div>#', '', (string) $result);
        $result = preg_replace('#</div>$#', '', (string) $result);

        return $result ?: '';
    }
}

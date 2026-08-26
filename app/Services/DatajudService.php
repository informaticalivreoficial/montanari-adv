<?php

namespace App\Services;

use App\Exceptions\DatajudException;
use App\Models\Process;
use App\Models\ProcessMovement;
use App\Models\ProcessParty;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

/**
 * Serviço de integração com a API Pública do Datajud (CNJ).
 *
 * A API utiliza consultas no formato Elasticsearch (DSL) via POST em:
 *   {base_url}/api_publica_<tribunal>/_search
 *
 * Autenticação: cabeçalho "Authorization: APIKey <chave>".
 *
 * Exemplo de uso:
 *   $datajud = new \App\Services\DatajudService();
 *   $processo = $datajud->findByNumero('tjgo', '0000000-00.0000.0.00.0000');
 *   $processo = $datajud->sync($clientId, 'tjgo', '0000000-00.0000.0.00.0000');
 */
class DatajudService
{
    protected string $baseUrl;
    protected ?string $apiKey;
    protected int $timeout;
    protected int $retries;
    protected int $retryDelay;
    protected bool $cacheEnabled;
    protected int $cacheTtl;

    public function __construct()
    {
        $this->baseUrl     = rtrim(config('datajud.base_url', 'https://api-publica.datajud.cnj.jus.br'), '/');
        $this->apiKey      = config('datajud.api_key');
        $this->timeout     = (int) config('datajud.timeout', 30);
        $this->retries     = (int) config('datajud.retries', 2);
        $this->retryDelay  = (int) config('datajud.retry_delay', 500);
        $this->cacheEnabled = (bool) config('datajud.cache_enabled', true);
        $this->cacheTtl    = (int) config('datajud.cache_ttl', 3600);
    }

    /**
     * Lista de tribunais suportados (alias => nome).
     */
    public function getTribunais(): array
    {
        return config('datajud.tribunais', []);
    }

    /**
     * Executa uma busca genérica (Elasticsearch DSL) em um tribunal.
     *
     * @param  string  $tribunal  Sigla do tribunal (ex.: tjgo, trf3, stf)
     * @param  array   $query     Corpo da consulta Elasticsearch (ex.: ["query" => [...]])
     * @param  int     $size      Limite de resultados (default 10)
     * @return array  Retorna o array "hits.hits" completo (inclui _source, _id, etc.)
     */
    public function search(string $tribunal, array $query, int $size = 10): array
    {
        $query = array_merge(['size' => $size], $query);
        $cacheKey = $this->cacheKey($tribunal, 'search:' . md5(json_encode($query)));

        return $this->cached($cacheKey, function () use ($tribunal, $query) {
            $body = $this->request($tribunal, $query);

            return $body['hits']['hits'] ?? [];
        });
    }

    /**
     * Busca um processo pelo número CNJ (com ou sem máscara).
     *
     * @return array|null  O "_source" do primeiro documento encontrado ou null.
     */
    public function findByNumero(string $tribunal, string $numero, int $size = 5): ?array
    {
        // O Datajud armazena "numeroProcesso" sem máscara (20 dígitos), mas por
        // segurança consultamos ambas as formas (com e sem máscara).
        $numeroNormalizado = $this->normalizeNumero($numero);
        $numeroUnmasked    = preg_replace('/\D/', '', $numero);
        $cacheKey = $this->cacheKey($tribunal, "numero:{$numeroUnmasked}");

        return $this->cached($cacheKey, function () use ($tribunal, $numeroUnmasked, $numeroNormalizado, $size) {
            $query = [
                'query' => [
                    'bool' => [
                        'should' => [
                            ['term' => ['numeroProcesso' => $numeroUnmasked]],
                            ['term' => ['numeroProcesso' => $numeroNormalizado]],
                        ],
                        'minimum_should_match' => 1,
                    ],
                ],
                'size' => $size,
            ];

            $body = $this->request($tribunal, $query);
            $hits = $body['hits']['hits'] ?? [];

            return $hits[0]['_source'] ?? null;
        });
    }

    /**
     * Busca e normaliza um processo para o formato do modelo Process.
     *
     * @return array|null
     */
    public function getProcesso(string $tribunal, string $numero): ?array
    {
        $source = $this->findByNumero($tribunal, $numero);

        return $source ? $this->normalize($source) : null;
    }

    /**
     * Sincroniza (cria ou atualiza) um processo local a partir do Datajud.
     *
     * @param  int         $clientId  ID do cliente dono do processo
     * @param  string      $tribunal  Sigla do tribunal
     * @param  string      $numero    Número CNJ do processo
     * @param  array       $extra     Campos extras a mesclar (ex.: responsible_id, case_type)
     * @return Process
     *
     * @throws DatajudException se o processo não for encontrado no Datajud.
     */
    public function sync(int $clientId, string $tribunal, string $numero, array $extra = []): Process
    {
        $source = $this->findByNumero($tribunal, $numero);

        if ($source === null) {
            throw new DatajudException("Processo {$numero} não encontrado no Datajud ({$tribunal}).");
        }

        $data = $this->normalize($source);
        $data = array_merge($data, $extra, [
            'client_id'       => $clientId,
            'source'          => 'datajud',
            'source_provider' => 'datajud',
            'source_id'       => $data['cnj_number'],
            'source_data'     => $source,
            'last_synced_at'  => now(),
            'sync_attempts'   => 1,
            'sync_error'      => null,
        ]);

        // Mantém o status local se já existir; caso contrário, define como ativo.
        $process = Process::where('source_provider', 'datajud')
            ->where('source_id', $data['cnj_number'])
            ->first();

        if ($process) {
            $process->update($data);
        } else {
            $data['status'] = $extra['status'] ?? 'active';
            $process = Process::create($data);
        }

        // Sincroniza movimentações e partes (histórico completo)
        $this->syncDetails($process, $source);

        return $process;
    }

    /**
     * Sincroniza movimentações e partes do Datajud para o processo local.
     * Substitui os registros existentes, pois a resposta do Datajud traz o conjunto completo.
     */
    public function syncDetails(Process $process, array $source): void
    {
        $this->syncMovements($process, $source);
        $this->syncParties($process, $source);
    }

    /**
     * Sincroniza as movimentações do processo.
     */
    protected function syncMovements(Process $process, array $source): void
    {
        $movimentos = $this->dig($source, 'movimentos') ?? [];

        if (!is_array($movimentos) || empty($movimentos)) {
            return;
        }

        $rows = [];
        foreach ($movimentos as $m) {
            if (!is_array($m)) {
                continue;
            }

            $rows[] = [
                'process_id'     => $process->id,
                'data_hora'      => $this->toDateTime($m['dataHora'] ?? $m['data'] ?? null),
                'codigo'         => $this->dig($m, 'codigo') !== null ? (string) $this->dig($m, 'codigo') : null,
                'nome'           => $this->dig($m, 'nome') ?? '',
                'complementos'   => isset($m['complementosTabelados']) ? json_encode($m['complementosTabelados'], JSON_UNESCAPED_UNICODE) : null,
                'orgao_julgador' => $this->dig($m, 'orgaoJulgador.nome') ?? (is_array($this->dig($m, 'orgaoJulgador')) ? null : $this->dig($m, 'orgaoJulgador')),
                'created_at'     => now(),
                'updated_at'     => now(),
            ];
        }

        ProcessMovement::where('process_id', $process->id)->delete();

        if (!empty($rows)) {
            ProcessMovement::insert($rows);
        }
    }

    /**
     * Sincroniza as partes (polos ativo/passivo) do processo.
     * O formato exato varia entre tribunais; o extractor é defensivo.
     */
    protected function syncParties(Process $process, array $source): void
    {
        $root = $this->dig($source, 'partes')
            ?? $this->dig($source, 'polo')
            ?? $this->dig($source, 'polos')
            ?? null;

        if (!is_array($root)) {
            return;
        }

        $map = [
            'poloAtivo'  => 'ativo',
            'poloPassivo' => 'passivo',
            'ativo'      => 'ativo',
            'passivo'    => 'passivo',
        ];

        $rows = [];
        foreach ($root as $key => $group) {
            if (!is_array($group)) {
                // Lista simples de partes sem polo definido
                $nome = is_scalar($group) ? (string) $group : null;
                if ($nome) {
                    $rows[] = $this->partyRow($process->id, 'outros', $nome, null, null);
                }
                continue;
            }

            $tipo = $map[is_string($key) ? $key : ''] ?? 'outros';

            foreach ($group as $p) {
                if (!is_array($p)) {
                    continue;
                }

                $nome = $this->dig($p, 'nome') ?? $this->dig($p, 'nomeParte') ?? null;
                if (!$nome) {
                    continue;
                }

                $rows[] = $this->partyRow(
                    $process->id,
                    $tipo,
                    $nome,
                    $this->dig($p, 'numeroDocumentoPrincipal') ?? $this->dig($p, 'documento') ?? null,
                    $this->dig($p, 'tipoParte') ?? $this->dig($p, 'categoria') ?? null
                );
            }
        }

        if (empty($rows)) {
            return;
        }

        ProcessParty::where('process_id', $process->id)->delete();
        ProcessParty::insert($rows);
    }

    protected function partyRow($processId, string $tipo, string $nome, $documento, $categoria): array
    {
        return [
            'process_id' => $processId,
            'tipo'       => $tipo,
            'nome'       => $nome,
            'documento'  => $documento,
            'categoria'  => $categoria,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    protected function toDateTime($value): ?string
    {
        if (empty($value)) {
            return null;
        }

        try {
            return \Carbon\Carbon::parse($value)->format('Y-m-d H:i:s');
        } catch (\Throwable $e) {
            return null;
        }
    }

    /**
     * Invalida o cache de uma consulta por número.
     */
    public function forget(string $tribunal, string $numero): void
    {
        if (!$this->cacheEnabled) {
            return;
        }

        Cache::forget($this->cacheKey($tribunal, 'numero:' . $this->normalizeNumero($numero)));
    }

    /**
     * Normaliza o "_source" do Datajud para os campos do modelo Process.
     *
     * Os nomes de campo do Datajud variam entre tribunais; usamos null coalescing
     * e helpers para extrair o máximo possível de informação de forma defensiva.
     */
    public function normalize(array $source): array
    {
        $numero = $this->dig($source, 'numeroProcesso');
        $numero = $this->normalizeNumero((string) $numero);

        $classe = $this->dig($source, 'classe') ?? [];
        $assunto = $this->dig($source, 'assuntos') ?? [];
        $assunto = is_array($assunto) && isset($assunto[0]) ? $assunto[0] : $assunto;

        $comarca = $this->dig($source, 'comarca') ?? [];
        $foro = $this->dig($source, 'foro') ?? [];
        $orgao = $this->dig($source, 'orgaoJulgador') ?? [];

        $movimentos = $this->dig($source, 'movimentos') ?? [];
        $lastMovimento = $this->lastMovementDate($movimentos);

        return [
            'process_number'        => $numero,
            'cnj_number'            => $numero,
            'court_acronym'         => $this->dig($source, 'tribunal'),
            'justice_segment'       => $this->dig($source, 'segmento'),
            'instance_level'        => $this->dig($source, 'grau'),
            'state'                 => $this->dig($source, 'uf'),
            'judicial_district'     => $this->dig($comarca, 'nome'),
            'judicial_district_code'=> $this->dig($comarca, 'codigo'),
            'forum'                 => $this->dig($foro, 'nome'),
            'forum_code'            => $this->dig($foro, 'codigo'),
            'judicial_unit'         => $this->dig($orgao, 'nome') ?? $this->dig($source, 'vara'),
            'court_division_code'   => $this->dig($orgao, 'codigo'),
            'court_name'            => $this->dig($orgao, 'nome') ?? $this->dig($source, 'vara'),
            'case_class'            => $this->dig($classe, 'nome'),
            'case_class_code'       => $this->dig($classe, 'codigo'),
            'main_subject'          => $this->dig($assunto, 'nome'),
            'main_subject_code'     => $this->dig($assunto, 'codigo'),
            'cause_value'           => $this->toFloat($this->dig($source, 'valorCausa')),
            'distribution_date'     => $this->toDate($this->dig($source, 'dataDistribuicao') ?? $this->dig($source, 'dataAjuizamento')),
            'filing_date'           => $this->toDate($this->dig($source, 'dataAjuizamento')),
            'last_movement_date'    => $lastMovimento,
            'situation'             => $this->dig($source, 'situacao') ?? $this->dig($source, 'situacaoProcesso'),
            'secret_of_justice'     => (bool) ($this->dig($source, 'segredoJustica') ?? false),
            'free_justice'          => (bool) ($this->dig($source, 'justicaGratuita') ?? false),
        ];
    }

    /*
     * ----------------------------------------------------------------------
     * Métodos auxiliares
     * ----------------------------------------------------------------------
     */

    /**
     * Executa a requisição HTTP POST para o endpoint _search do tribunal.
     *
     * @throws DatajudException
     */
    protected function request(string $tribunal, array $query): array
    {
        if (empty($this->apiKey)) {
            throw new DatajudException('DATAJUD_API_KEY não configurada. Defina a chave pública do Datajud no .env.');
        }

        $tribunal = strtolower(trim($tribunal));
        $url = "{$this->baseUrl}/api_publica_{$tribunal}/_search";

        try {
            $response = Http::withHeaders([
                'Authorization' => 'APIKey ' . $this->apiKey,
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json',
            ])
            ->timeout($this->timeout)
            ->retry($this->retries, $this->retryDelay)
            ->post($url, $query);
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            throw new DatajudException("Falha de conexão com o Datajud: {$e->getMessage()}", 0, $e);
        }

        if ($response->failed()) {
            $status = $response->status();
            $body = $response->body();

            if ($status === 401) {
                throw new DatajudException('Datajud retornou 401: chave de API inválida ou expirada. Verifique DATAJUD_API_KEY.');
            }

            throw new DatajudException("Datajud retornou status {$status}: {$body}");
        }

        $json = $response->json();

        if (!is_array($json)) {
            throw new DatajudException('Resposta inválida do Datajud (JSON esperado).');
        }

        return $json;
    }

    /**
     * Executa um callable com cache opcional.
     */
    protected function cached(string $key, callable $callback)
    {
        if (!$this->cacheEnabled) {
            return $callback();
        }

        return Cache::remember($key, $this->cacheTtl, $callback);
    }

    protected function cacheKey(string $tribunal, string $suffix): string
    {
        return 'datajud.' . strtolower(trim($tribunal)) . '.' . $suffix;
    }

    /**
     * Normaliza o número do processo para o formato CNJ com máscara:
     *   NNNNNNN-DD.AAAA.J.TR.OOOO
     * Aceita número com ou sem máscara (apenas dígitos).
     */
    public function normalizeNumero(string $numero): string
    {
        $digits = preg_replace('/\D/', '', $numero);

        if (strlen($digits) === 20) {
            return sprintf(
                '%s-%s.%s.%s.%s.%s',
                substr($digits, 0, 7),   // NNNNNNN
                substr($digits, 7, 2),   // DD
                substr($digits, 9, 4),   // AAAA
                substr($digits, 13, 1),  // J
                substr($digits, 14, 2),  // TR
                substr($digits, 16, 4)   // OOOO
            );
        }

        // Se já estiver mascarado/misto, retorna limpo de espaços.
        return trim($numero);
    }

    /**
     * Extrai valor aninhado de array usando notação de ponto.
     * Ex.: dig($arr, 'classe.nome')
     */
    protected function dig(array $array, string $key)
    {
        if (array_key_exists($key, $array)) {
            return $array[$key];
        }

        if (!str_contains($key, '.')) {
            return null;
        }

        $value = $array;
        foreach (explode('.', $key) as $segment) {
            if (!is_array($value) || !array_key_exists($segment, $value)) {
                return null;
            }
            $value = $value[$segment];
        }

        return $value;
    }

    protected function toFloat($value): ?float
    {
        if ($value === null || $value === '') {
            return null;
        }

        return (float) $value;
    }

    protected function toDate($value): ?string
    {
        if (empty($value)) {
            return null;
        }

        // DataJud retorna datas em ISO (ex.: 2020-01-01 ou 2020-01-01T00:00:00Z)
        try {
            return \Carbon\Carbon::parse($value)->toDateString();
        } catch (\Throwable $e) {
            return null;
        }
    }

    protected function lastMovementDate(array $movimentos): ?string
    {
        if (empty($movimentos)) {
            return null;
        }

        $last = end($movimentos);
        $data = $this->dig($last, 'dataHora') ?? $this->dig($last, 'data') ?? null;

        return $this->toDate($data);
    }
}

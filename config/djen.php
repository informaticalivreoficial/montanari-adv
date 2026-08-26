<?php

/*
 * Configuração do serviço de integração com o DJEN (Diário de Justiça Eletrônico
 * Nacional), exposto pelo sistema "Comunica" do CNJ.
 *
 * Documentação (swagger): https://hcomunicaapi.cnj.jus.br/swagger/index.html
 * Spec: https://hcomunicaapi.cnj.jus.br/swagger/djen.yml
 *
 * A consulta pública de comunicações (intimações/citações) NÃO exige autenticação.
 * Atenção: a API faz GEO-BLOQUEIO — retorna 403 para origens fora do Brasil.
 */

return [

    /*
     * URL base do serviço público do DJEN (Comunica PJe).
     */
    'base_url' => env('DJEN_BASE_URL', 'https://comunicaapi.pje.jus.br'),

    /*
     * Tempo máximo (segundos) de espera por uma resposta.
     */
    'timeout' => env('DJEN_TIMEOUT', 40),

    /*
     * Número de tentativas em caso de falha de conexão e intervalo (ms) entre elas.
     */
    'retries' => env('DJEN_RETRIES', 2),
    'retry_delay' => env('DJEN_RETRY_DELAY', 500),

    /*
     * Habilita cache das respostas (recomendado: evita estourar o rate limit).
     */
    'cache_enabled' => env('DJEN_CACHE_ENABLED', true),

    /*
     * Tempo de vida do cache (segundos).
     */
    'cache_ttl' => env('DJEN_CACHE_TTL', 86400),

    /*
     * Limite de páginas percorridas por consulta (cada página traz no máx. 50 itens;
     * o total de itens retornados pela API é limitado a 10000).
     */
    'max_pages' => env('DJEN_MAX_PAGES', 200),

];


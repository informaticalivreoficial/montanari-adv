<?php

/*
 * Configuração do serviço de integração com a API Pública do Datajud (CNJ).
 *
 * Documentação: https://datajud-wiki.cnj.jus.br/api-publica/
 * Acesso/Chave: https://datajud-wiki.cnj.jus.br/api-publica/acesso
 *
 * A API exige autenticação via cabeçalho "Authorization: APIKey <chave>".
 * A chave pública é publicada na wiki do CNJ e pode ser rotacionada a qualquer
 * momento, por isso é obrigatório definir DATAJUD_API_KEY no .env.
 */

return [

    /*
     * URL base da API Pública do Datajud.
     */
    'base_url' => env('DATAJUD_BASE_URL', 'https://api-publica.datajud.cnj.jus.br'),

    /*
     * Chave pública de acesso (Authorization: APIKey <chave>).
     * Obtenha a chave vigente em: https://datajud-wiki.cnj.jus.br/api-publica/acesso
     */
    'api_key' => env('DATAJUD_API_KEY'),

    /*
     * Tempo máximo (segundos) de espera por uma resposta.
     */
    'timeout' => env('DATAJUD_TIMEOUT', 30),

    /*
     * Número de tentativas em caso de falha de conexão e intervalo (ms) entre elas.
     */
    'retries' => env('DATAJUD_RETRIES', 2),
    'retry_delay' => env('DATAJUD_RETRY_DELAY', 500),

    /*
     * Habilita cache das respostas (recomendado: os dados mudam com movimentações).
     */
    'cache_enabled' => env('DATAJUD_CACHE_ENABLED', true),

    /*
     * Tempo de vida do cache (segundos).
     */
    'cache_ttl' => env('DATAJUD_CACHE_TTL', 3600),

    /*
     * Siglas de tribunais suportadas. O alias usado na URL é "api_publica_<sigla>".
     * A lista é apenas referencial — qualquer sigla válida do CNJ funciona.
     */
    'tribunais' => [
        // Superiores
        'stf' => 'Supremo Tribunal Federal',
        'stj' => 'Superior Tribunal de Justiça',
        'tst' => 'Tribunal Superior do Trabalho',
        'tse' => 'Tribunal Superior Eleitoral',
        'tcu' => 'Tribunal de Contas da União',

        // Federais (TRFs)
        'trf1' => 'TRF da 1ª Região',
        'trf2' => 'TRF da 2ª Região',
        'trf3' => 'TRF da 3ª Região',
        'trf4' => 'TRF da 4ª Região',
        'trf5' => 'TRF da 5ª Região',
        'trf6' => 'TRF da 6ª Região',

        // Trabalhistas (TRTs)
        'trt1'  => 'TRT da 1ª Região',
        'trt2'  => 'TRT da 2ª Região',
        'trt3'  => 'TRT da 3ª Região',
        'trt4'  => 'TRT da 4ª Região',
        'trt5'  => 'TRT da 5ª Região',
        'trt6'  => 'TRT da 6ª Região',
        'trt7'  => 'TRT da 7ª Região',
        'trt8'  => 'TRT da 8ª Região',
        'trt9'  => 'TRT da 9ª Região',
        'trt10' => 'TRT da 10ª Região',
        'trt11' => 'TRT da 11ª Região',
        'trt12' => 'TRT da 12ª Região',
        'trt13' => 'TRT da 13ª Região',
        'trt14' => 'TRT da 14ª Região',
        'trt15' => 'TRT da 15ª Região',
        'trt16' => 'TRT da 16ª Região',
        'trt17' => 'TRT da 17ª Região',
        'trt18' => 'TRT da 18ª Região',
        'trt19' => 'TRT da 19ª Região',
        'trt20' => 'TRT da 20ª Região',
        'trt21' => 'TRT da 21ª Região',
        'trt22' => 'TRT da 22ª Região',
        'trt23' => 'TRT da 23ª Região',
        'trt24' => 'TRT da 24ª Região',

        // Estaduais (TJs)
        'tjac' => 'TJ do Acre',
        'tjal' => 'TJ de Alagoas',
        'tjap' => 'TJ do Amapá',
        'tjam' => 'TJ do Amazonas',
        'tjba' => 'TJ da Bahia',
        'tjce' => 'TJ do Ceará',
        'tjdf' => 'TJ do Distrito Federal',
        'tjes' => 'TJ do Espírito Santo',
        'tjgo' => 'TJ de Goiás',
        'tjma' => 'TJ do Maranhão',
        'tjmg' => 'TJ de Minas Gerais',
        'tjms' => 'TJ de Mato Grosso do Sul',
        'tjmt' => 'TJ de Mato Grosso',
        'tjpa' => 'TJ do Pará',
        'tjpb' => 'TJ da Paraíba',
        'tjpe' => 'TJ de Pernambuco',
        'tjpi' => 'TJ do Piauí',
        'tjpr' => 'TJ do Paraná',
        'tjrj' => 'TJ do Rio de Janeiro',
        'tjrn' => 'TJ do Rio Grande do Norte',
        'tjro' => 'TJ de Rondônia',
        'tjrr' => 'TJ de Roraima',
        'tjrs' => 'TJ do Rio Grande do Sul',
        'tjsc' => 'TJ de Santa Catarina',
        'tjsp' => 'TJ de São Paulo',
        'tjse' => 'TJ de Sergipe',
        'tjto' => 'TJ do Tocantins',
    ],

];

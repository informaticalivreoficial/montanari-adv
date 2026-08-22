<?php

return [
    /*
    |--------------------------------------------------------------------------
    | WebP Quality (1-100)
    |--------------------------------------------------------------------------
    | Qualidade da conversão para WebP. Quanto maior, melhor a qualidade
    | e maior o tamanho do arquivo.
    */
    'webp_quality' => (int) env('IMAGE_WEBP_QUALITY', 85),

    /*
    |--------------------------------------------------------------------------
    | Dimensões Máximas
    |--------------------------------------------------------------------------
    | Largura e altura máxima em pixels. Imagens maiores serão redimensionadas
    | mantendo a proporção.
    */
    'max_width'  => (int) env('IMAGE_MAX_WIDTH', 2000),
    'max_height' => (int) env('IMAGE_MAX_HEIGHT', 2000),

    /*
    |--------------------------------------------------------------------------
    | Tamanho Máximo do Arquivo (KB)
    |--------------------------------------------------------------------------
    | Tamanho máximo permitido por imagem em kilobytes.
    | Padrão: 5120 KB = 5 MB
    */
    'max_file_size_kb' => (int) env('IMAGE_MAX_SIZE_KB', 5120),

    /*
    |--------------------------------------------------------------------------
    | Dimensões da Capa (Thumbnail)
    |--------------------------------------------------------------------------
    | Largura e altura do thumbnail de capa gerado automaticamente.
    */
    'cover_width'  => 720,
    'cover_height' => 480,
];

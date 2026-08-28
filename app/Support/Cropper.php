<?php

namespace App\Support;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Cropper
{
    public static function thumb(string $uri, int $width, ?int $height = null): string
    {
        $cachePath  = public_path('storage/cache');
        $filename   = md5($uri . $width . $height) . '.webp';
        $cachedFile = $cachePath . '/' . $filename;

        // ✅ retorna cache se já existir
        if (file_exists($cachedFile)) {
            return 'cache/' . $filename;
        }

        if (!file_exists($cachePath)) {
            mkdir($cachePath, 0755, true);
        }

        // ✅ resolve a imagem-fonte: local primeiro, senão baixa do R2
        $sourcePath = null;
        $tmpFile    = null;

        if (\Storage::disk('public')->exists($uri)) {
            $sourcePath = \Storage::disk('public')->path($uri);
        } elseif (\Storage::disk('r2')->exists($uri)) {
            $tmpFile    = tempnam(sys_get_temp_dir(), 'crop') . '.webp';
            file_put_contents($tmpFile, \Storage::disk('r2')->get($uri));
            $sourcePath = $tmpFile;
        }

        if (!$sourcePath || !file_exists($sourcePath)) {
            return '';
        }

        $manager = new ImageManager(new Driver());
        $image   = $manager->read($sourcePath);

        // ✅ crop centralizado (igual ao Cropper) ou só redimensiona largura
        if ($height) {
            $image->cover($width, $height);
        } else {
            $image->scale(width: $width);
        }

        $image->toWebp(80)->save($cachedFile);

        if ($tmpFile && file_exists($tmpFile)) {
            @unlink($tmpFile);
        }

        return 'cache/' . $filename;
    }

    public static function flush(?string $path = null): void
    {
        $cachePath = public_path('storage/cache');

        if (!empty($path)) {
            // ✅ limpa apenas as miniaturas da imagem específica
            $hash = md5($path);
            foreach (glob($cachePath . '/' . $hash . '*.webp') as $file) {
                if (is_file($file)) unlink($file);
            }
        } else {
            // ✅ limpa todo o cache
            foreach (glob($cachePath . '/*.webp') as $file) {
                if (is_file($file)) unlink($file);
            }
        }
    }
}
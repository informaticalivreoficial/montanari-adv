<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

/**
 * Helper central para servir/excluir arquivos de mídia.
 *
 * Estratégia: novos arquivos são gravados no disco R2 (Cloudflare, bucket privado).
 * Arquivos antigos que ainda estão no disco 'public' (local) continuam funcionando
 * via fallback. Como o bucket é privado, as URLs de exibição são pré-assinadas.
 */
class Asset
{
    /** Disco usado para novos uploads (R2 se configurado, senão local). */
    public static function disk(): string
    {
        return config('filesystems.disks.r2') ? 'r2' : 'public';
    }

    /**
     * URL de exibição (para <img>, fundos, etc).
     * - Se existir localmente: usa a URL pública local.
     * - Senão: gera URL pré-assinada do R2 (válida por $expires minutos, inline).
     */
    public static function url(?string $path, int $expires = 1440): string
    {
        if (!$path) {
            return '';
        }

        if (Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->url($path);
        }

        return Storage::disk('r2')->temporaryUrl($path, now()->addMinutes($expires), [
            'ResponseContentDisposition' => 'inline',
        ]);
    }

    /**
     * Remove o arquivo dos dois discos (local primeiro).
     */
    public static function delete(?string $path): void
    {
        if (!$path) {
            return;
        }

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            return;
        }

        if (Storage::disk('r2')->exists($path)) {
            Storage::disk('r2')->delete($path);
        }
    }
}

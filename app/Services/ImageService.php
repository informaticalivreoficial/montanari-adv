<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageService
{
    /**
     * Configurações de conversão WebP
     */
    protected int $webpQuality;
    protected int $maxWidth;
    protected int $maxHeight;
    protected int $maxFileSizeKb;

    public function __construct()
    {
        $this->webpQuality  = (int) config('image-converter.webp_quality', 85);
        $this->maxWidth     = (int) config('image-converter.max_width', 2000);
        $this->maxHeight    = (int) config('image-converter.max_height', 2000);
        $this->maxFileSizeKb = (int) config('image-converter.max_file_size_kb', 5120);
    }

    /**
     * Valida um array de imagens (UploadedFile)
     *
     * @return array{valid: array, errors: array}
     */
    public function validate(array $files, string $prefix = 'images'): array
    {
        $valid  = [];
        $errors = [];

        $allowedMimes = [
            'image/jpeg', 'image/png', 'image/gif',
            'image/webp', 'image/bmp', 'image/tiff',
        ];

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp', 'tiff'];

        foreach ($files as $index => $file) {
            $field = "{$prefix}.{$index}";

            if (!$file instanceof UploadedFile) {
                $errors[$field] = "Arquivo inválido no posição {$index}.";
                continue;
            }

            if (!in_array($file->getMimeType(), $allowedMimes)) {
                $errors[$field] = "Tipo não permitido: {$file->getMimeType()}.";
                continue;
            }

            $extension = strtolower($file->getClientOriginalExtension());
            if (!in_array($extension, $allowedExtensions)) {
                $errors[$field] = "Extensão não permitida: .{$extension}";
                continue;
            }

            $maxBytes = $this->maxFileSizeKb * 1024;
            if ($file->getSize() > $maxBytes) {
                $sizeMb = round($file->getSize() / 1024 / 1024, 1);
                $maxMb  = round($maxBytes / 1024 / 1024, 1);
                $errors[$field] = "Imagem muito grande ({$sizeMb}MB). Máximo: {$maxMb}MB.";
                continue;
            }

            $imageInfo = @getimagesize($file->getPathname());
            if ($imageInfo === false) {
                $errors[$field] = "Arquivo corrompido ou não é uma imagem válida.";
                continue;
            }

            $valid[] = $file;
        }

        return ['valid' => $valid, 'errors' => $errors];
    }

    /**
     * Converte um UploadedFile para WebP e salva no storage.
     *
     * @param  UploadedFile  $file
     * @param  string        $directory  Diretório relativo ao disk 'public'
     * @param  string|null   $filename   Nome sem extensão (null = uniqid)
     * @param  bool          $isCover    Se true, cria também thumbnail
     * @return array{path: string, width: int, height: int, size: int}
     */
    public function convertToWebp(
        UploadedFile $file,
        string $directory = 'uploads',
        ?string $filename = null,
        bool $isCover = false,
    ): array {
        $filename = $filename ?: uniqid('img_', true);

        // Carrega a imagem — usa o path real (funciona com TemporaryUploadedFile do Livewire)
        $realPath = $file->getRealPath();

        if (!$realPath || !file_exists($realPath)) {
            throw new \RuntimeException('Arquivo temporário não encontrado para conversão WebP.');
        }

        $img = Image::make($realPath);

        // Redimensiona se exceder máximos (mantendo proporção)
        if ($img->width() > $this->maxWidth || $img->height() > $this->maxHeight) {
            $img->resize($this->maxWidth, $this->maxHeight, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }

        // Para capas, cria thumbnail 720x480
        if ($isCover) {
            $this->createCoverThumbnail($img, $directory, $filename);
        }

        // Converte para WebP — Intervention Image v2 usa encode()
        $webpContent = $img->encode('webp', $this->webpQuality);

        // Garante que o diretório existe
        $fullDir = storage_path("app/public/{$directory}");
        if (!is_dir($fullDir)) {
            mkdir($fullDir, 0755, true);
        }

        // Gera nome do arquivo
        $path = "{$directory}/{$filename}.webp";

        // Salva no storage public
        Storage::disk('public')->put($path, $webpContent);

        return [
            'path'   => $path,
            'width'  => $img->width(),
            'height' => $img->height(),
            'size'   => strlen($webpContent),
        ];
    }

    /**
     * Cria thumbnail de capa (720x480) para WebP
     */
    protected function createCoverThumbnail($img, string $directory, string $filename): void
    {
        $thumb = clone $img;
        $thumb->fit(720, 480, function ($constraint) {
            $constraint->upsize();
        });

        $webpContent = $thumb->encode('webp', $this->webpQuality);
        $thumbPath = "{$directory}/{$filename}_thumb.webp";

        Storage::disk('public')->put($thumbPath, $webpContent);
    }

    /**
     * Remove imagem e thumbnail do storage
     */
    public function delete(string $path): bool
    {
        $deleted = false;

        if (Storage::disk('public')->exists($path)) {
            $deleted = Storage::disk('public')->delete($path);
        }

        // Remove thumbnail se existir
        $thumbPath = str_replace('.webp', '_thumb.webp', $path);
        if (Storage::disk('public')->exists($thumbPath)) {
            Storage::disk('public')->delete($thumbPath);
        }

        return $deleted;
    }

    /**
     * Retorna regras para validação de imagens
     */
    public function getValidationRules(): array
    {
        $maxMb = round($this->maxFileSizeKb / 1024, 1);

        return [
            'mimes:jpg,jpeg,png,gif,webp,bmp,tiff',
            "max:{$this->maxFileSizeKb}",
        ];
    }

    /**
     * Retorna mensagens de erro customizadas para validação
     */
    public function getValidationMessages(): array
    {
        $maxMb = round($this->maxFileSizeKb / 1024, 1);

        return [
            'images.*.mimes'  => 'Tipo não permitido. Use JPEG, PNG, GIF ou WebP.',
            'images.*.max'    => "Imagem muito grande. Máximo: {$maxMb}MB.",
            'newImages.*.mimes' => 'Tipo não permitido. Use JPEG, PNG, GIF ou WebP.',
            'newImages.*.max'   => "Imagem muito grande. Máximo: {$maxMb}MB.",
        ];
    }
}

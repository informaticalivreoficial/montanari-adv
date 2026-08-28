<?php

namespace App\Http\Livewire\Dashboard\Posts\Pages;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use App\Models\CatPost;
use App\Models\PostGb;
use App\Services\ImageService;
use App\Traits\HasAlerts;
use App\Traits\HasValidations;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class EditPage extends Component
{
    use HasAlerts, WithFileUploads;

    // ── Regras de upload ──────────────────────────────────
    protected static int    $maxUploadSize   = 5120;
    protected static array  $uploadMimeTypes = [
        'image/jpeg', 'image/png', 'image/gif',
        'image/webp', 'image/bmp', 'image/tiff',
    ];

    // ── Propriedades ──────────────────────────────────────
    public $postId;
    public $post = null;

    public $title = '';
    public $content = '';
    public $excerpt = '';
    public $metaDescription = '';
    public $category = '';
    public $tags = '';
    public $status = 0;
    public $menu = 0;
    public $thumbCaption = '';
    public $thumbCaptions = [];

    // ── Imagens ───────────────────────────────────────────
    public $newImages = [];
    public $existingImages = [];

    // ── Dados auxiliares ──────────────────────────────────
    public $categories = [];

    // ── Serviço de imagem ─────────────────────────────────
    protected ImageService $imageService;

    public function boot(): void
    {
        $this->imageService = app(ImageService::class);
    }

    public function mount($id): void
    {
        $this->postId = $id;
        $this->categories = CatPost::active()->pluck('title', 'id')->toArray();
        $this->loadPage();
    }

    public function loadPage(): void
    {
        $this->post = Post::findOrFail($this->postId);

        $this->title           = $this->post->title;
        $this->content         = $this->post->content;
        $this->excerpt         = $this->post->excerpt;
        $this->metaDescription = $this->post->metaDescription;
        $this->category        = $this->post->category;
        $this->tags            = $this->post->tags;
        $this->status          = $this->post->status ? 1 : 0;
        $this->menu            = $this->post->menu ? 1 : 0;
        $this->thumbCaption    = $this->post->thumb_caption ?? '';

        $this->refreshImages();
    }

    protected function refreshImages(): void
    {
        $images = $this->post->images()->orderBy('order')->get();

        $this->existingImages = $images->map(fn($img) => [
            'id'            => $img->id,
            'path'          => $img->path,
            'url'           => \App\Services\Asset::url($img->path),
            'cover'         => (bool) $img->cover,
            'thumb_caption' => $img->thumb_caption ?? '',
        ])->toArray();

        $this->thumbCaptions = [];
        foreach ($this->existingImages as $img) {
            $this->thumbCaptions[$img['id']] = $img['thumb_caption'];
        }
    }

    // ──────────────────────────────────────────────────────
    //  Regras de validação
    // ──────────────────────────────────────────────────────

    protected function rules(): array
    {
        return [
            'title'           => 'required|string|min:3|max:255',
            'content'         => 'nullable|string|max:100000',
            'excerpt'         => 'nullable|string|max:500',
            'metaDescription' => 'nullable|string|max:160',
            'category'        => 'nullable|exists:cat_post,id',
            'tags'            => 'nullable|string|max:500',
            'status'          => 'in:0,1',
            'menu'            => 'in:0,1',
            'thumbCaption'    => 'nullable|string|max:255',

            // Imagens
            'newImages'         => 'nullable|array|max:10',
            'newImages.*'       => 'file|image|mimes:jpg,jpeg,png,gif,webp,bmp,tiff|max:5120',

            // Legenda das imagens existentes
            'thumbCaptions'     => 'nullable|array',
            'thumbCaptions.*'   => 'nullable|string|max:255',
        ];
    }

    protected function messages(): array
    {
        return [
            'title.required'      => 'O título da página é obrigatório.',
            'title.min'           => 'O título deve ter pelo menos 3 caracteres.',
            'title.max'           => 'O título não pode exceder 255 caracteres.',
            'content.max'         => 'O conteúdo não pode exceder 100.000 caracteres.',
            'excerpt.max'         => 'O resumo não pode exceder 500 caracteres.',
            'metaDescription.max' => 'A meta descrição não pode exceder 160 caracteres.',
            'category.exists'     => 'A categoria selecionada não existe.',
            'tags.max'            => 'As tags não podem exceder 500 caracteres.',
            'status.in'           => 'Status inválido.',
            'menu.in'             => 'Valor de menu inválido.',
            'thumbCaption.max'    => 'A legenda da capa não pode exceder 255 caracteres.',
            'newImages.array'     => 'O campo de imagens é inválido.',
            'newImages.max'       => 'Máximo de 10 imagens por página.',
            'newImages.*.file'    => 'Cada imagem deve ser um arquivo válido.',
            'newImages.*.image'   => 'O arquivo deve ser uma imagem.',
            'newImages.*.mimes'   => 'Tipo não permitido. Use JPEG, PNG, GIF ou WebP.',
            'newImages.*.max'     => 'Imagem muito grande. Tamanho máximo: 5MB.',
            'thumbCaptions.*.max' => 'A legenda não pode exceder 255 caracteres.',
        ];
    }

    // ──────────────────────────────────────────────────────
    //  Validação customizada de imagens (com Intervention)
    // ──────────────────────────────────────────────────────

    protected function validateImageFiles(array $files): void
    {
        if (empty($files)) return;

        $result = $this->imageService->validate($files, 'newImages');

        if (!empty($result['errors'])) {
            $firstError = reset($result['errors']);
            throw ValidationException::withMessages([
                'newImages' => $firstError,
            ]);
        }
    }

    // ──────────────────────────────────────────────────────
    //  Atualizar
    // ──────────────────────────────────────────────────────

    public function update(): void
    {
        $this->validate();
        $this->validateImageFiles($this->newImages);

        $this->post->update([
            'title'           => $this->title,
            'content'         => $this->content,
            'excerpt'         => $this->excerpt ?: null,
            'metaDescription' => $this->metaDescription ?: null,
            'category'        => $this->category ?: null,
            'tags'            => $this->tags ?: null,
            'status'          => $this->status ? 1 : 0,
            'menu'            => $this->menu ? 1 : 0,
            'thumb_caption'   => $this->thumbCaption ?: null,
        ]);

        // Salva legenda individual de cada imagem
        foreach ($this->thumbCaptions as $imageId => $caption) {
            PostGb::where('id', $imageId)
                ->where('post', $this->postId)
                ->update(['thumb_caption' => $caption]);
        }

        // Upload novas imagens como WebP
        $this->uploadNewImagesAsWebp();

        $this->toastSuccess('Página atualizada com sucesso!');
        $this->loadPage();
    }

    // ──────────────────────────────────────────────────────
    //  Upload WebP
    // ──────────────────────────────────────────────────────

    protected function uploadNewImagesAsWebp(): void
    {
        if (empty($this->newImages)) return;

        $existingCount = count($this->existingImages);

        foreach ($this->newImages as $index => $image) {
            $result = $this->imageService->convertToWebp(
                file: $image,
                directory: "posts/{$this->postId}",
                filename: uniqid("post_{$this->postId}_", true),
                isCover: false,
            );

            PostGb::create([
                'post'          => $this->postId,
                'path'          => $result['path'],
                'cover'         => 0,
                'order'         => $existingCount + $index,
                'thumb_caption' => null,
            ]);
        }
    }

    // ──────────────────────────────────────────────────────
    //  Excluir imagem
    // ──────────────────────────────────────────────────────

    public function deleteImage($imageId): void
    {
        $image = PostGb::findOrFail($imageId);

        $this->imageService->delete($image->path);

        $image->delete();
        $this->refreshImages();

        $this->toastSuccess('Imagem removida!');
    }

    // ──────────────────────────────────────────────────────
    //  Definir capa
    // ──────────────────────────────────────────────────────

    public function setCover($imageId): void
    {
        PostGb::where('post', $this->postId)->update(['cover' => 0]);
        PostGb::where('id', $imageId)->update(['cover' => 1]);

        $this->refreshImages();
        $this->toastSuccess('Capa atualizada!');
    }

    // ──────────────────────────────────────────────────────
    //  Reordenar imagens
    // ──────────────────────────────────────────────────────

    public function reorderImages($order): void
    {
        if (!is_array($order)) return;

        foreach ($order as $item) {
            PostGb::where('id', $item['id'])
                ->where('post', $this->postId)
                ->update(['order' => $item['order']]);
        }

        $this->refreshImages();
    }

    // ──────────────────────────────────────────────────────
    //  Live-updating hooks
    // ──────────────────────────────────────────────────────

    public function updatedTitle(string $value): void
    {
        $this->validateOnly('title', [
            'title' => 'required|string|min:3|max:255',
        ]);
    }

    public function updatedNewImages(): void
    {
        if (!empty($this->newImages)) {
            $this->validateOnly('newImages', [
                'newImages'   => 'nullable|array|max:10',
                'newImages.*' => 'file|image|mimes:jpg,jpeg,png,gif,webp,bmp,tiff|max:5120',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.dashboard.Posts.Pages.edit')
            ->layout('layouts.admin', ['title' => 'Editar Página']);
    }
}

<?php

namespace App\Http\Livewire\Dashboard\Posts\Pages;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use App\Models\PostGb;
use App\Services\ImageService;
use App\Traits\HasAlerts;
use App\Traits\HasValidations;
use Illuminate\Validation\ValidationException;

class CreatePage extends Component
{
    use HasAlerts, WithFileUploads;

    // ── Regras de upload ──────────────────────────────────
    protected static int    $maxUploadSize   = 5120;
    protected static array  $uploadMimeTypes = [
        'image/jpeg', 'image/png', 'image/gif',
        'image/webp', 'image/bmp', 'image/tiff',
    ];

    // ── Propriedades do formulário ────────────────────────
    public $title = '';
    public $content = '';
    public $excerpt = '';
    public $metaDescription = '';
    public $category = '';
    public $tags = '';
    public $status = 0;
    public $menu = 0;
    public $thumbCaption = '';

    // ── Imagens ───────────────────────────────────────────
    public $images = [];

    // ── Dados auxiliares ──────────────────────────────────
    public $categories = [];

    // ── Serviço de imagem ─────────────────────────────────
    protected ImageService $imageService;

    public function boot(): void
    {
        $this->imageService = app(ImageService::class);
    }

    public function mount(): void
    {
        $this->categories = CatPost::active()->pluck('title', 'id')->toArray();
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
            'images'         => 'nullable|array|max:10',
            'images.*'       => 'file|image|mimes:jpg,jpeg,png,gif,webp,bmp,tiff|max:5120',
        ];
    }

    protected function messages(): array
    {
        return [
            'title.required'    => 'O título da página é obrigatório.',
            'title.min'         => 'O título deve ter pelo menos 3 caracteres.',
            'title.max'         => 'O título não pode exceder 255 caracteres.',
            'content.max'       => 'O conteúdo não pode exceder 100.000 caracteres.',
            'excerpt.max'       => 'O resumo não pode exceder 500 caracteres.',
            'metaDescription.max' => 'A meta descrição não pode exceder 160 caracteres.',
            'category.exists'   => 'A categoria selecionada não existe.',
            'tags.max'          => 'As tags não podem exceder 500 caracteres.',
            'status.in'         => 'Status inválido.',
            'menu.in'           => 'Valor de menu inválido.',
            'thumbCaption.max'  => 'A legenda da capa não pode exceder 255 caracteres.',
            'images.array'      => 'O campo de imagens é inválido.',
            'images.max'        => 'Máximo de 10 imagens por página.',
            'images.*.file'     => 'Cada imagem deve ser um arquivo válido.',
            'images.*.image'    => 'O arquivo deve ser uma imagem.',
            'images.*.mimes'    => 'Tipo não permitido. Use JPEG, PNG, GIF ou WebP.',
            'images.*.max'      => 'Imagem muito grande. Tamanho máximo: 5MB.',
        ];
    }

    // ──────────────────────────────────────────────────────
    //  Validação customizada de imagens (com Intervention)
    // ──────────────────────────────────────────────────────

    protected function validateImageFiles(array $files): void
    {
        if (empty($files)) return;

        $result = $this->imageService->validate($files, 'images');

        if (!empty($result['errors'])) {
            $firstError = reset($result['errors']);
            throw ValidationException::withMessages([
                'images' => $firstError,
            ]);
        }
    }

    // ──────────────────────────────────────────────────────
    //  Salvar
    // ──────────────────────────────────────────────────────

    public function store(): \Illuminate\Http\RedirectResponse
    {
        $this->validate();
        $this->validateImageFiles($this->images);

        $post = Post::create([
            'autor'           => auth()->id(),
            'type'            => 'page',
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

        $this->uploadImagesAsWebp($post);

        return redirect()->route('dashboard.posts.pages')
            ->with('toast_success', 'Página criada com sucesso!');
    }

    // ──────────────────────────────────────────────────────
    //  Upload de imagens como WebP
    // ──────────────────────────────────────────────────────

    protected function uploadImagesAsWebp(Post $post): void
    {
        if (empty($this->images)) return;

        foreach ($this->images as $index => $image) {
            $isCover = ($index === 0);

            $result = $this->imageService->convertToWebp(
                file: $image,
                directory: "posts/{$post->id}",
                filename: uniqid("post_{$post->id}_", true),
                isCover: $isCover,
            );

            PostGb::create([
                'post'          => $post->id,
                'path'          => $result['path'],
                'cover'         => $isCover ? 1 : 0,
                'order'         => $index,
                'thumb_caption' => $isCover ? ($this->thumbCaption ?: null) : null,
            ]);
        }
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

    public function updatedImages(): void
    {
        if (!empty($this->images)) {
            $this->validateOnly('images', [
                'images'   => 'nullable|array|max:10',
                'images.*' => 'file|image|mimes:jpg,jpeg,png,gif,webp,bmp,tiff|max:5120',
            ]);
        }
    }

    public function render()
    {
        return view('livewire.dashboard.Posts.Pages.create')
            ->layout('layouts.admin', ['title' => 'Nova Página']);
    }
}

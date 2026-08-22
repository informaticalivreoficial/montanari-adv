<?php

namespace App\Http\Livewire\Dashboard\Posts\Articles;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use App\Models\CatPost;
use App\Models\PostGb;
use App\Services\ImageService;
use App\Traits\HasAlerts;
use App\Traits\HasValidations;
use Illuminate\Validation\ValidationException;

class CreateArticle extends Component
{
    use HasAlerts, WithFileUploads;

    // ── Regras de upload ──────────────────────────────────
    protected static int    $maxUploadSize   = 5120; // KB (5 MB)
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
    public $highlight = 0;
    public $publish_at = '';
    public $readingTime = '';
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
            // Dados do post
            'title'          => 'required|string|min:3|max:255',
            'category'       => 'required|exists:cat_post,id',
            'content'        => 'nullable|string|max:100000',
            'excerpt'        => 'nullable|string|max:500',
            'metaDescription' => 'nullable|string|max:160',
            'tags'           => 'nullable|string|max:500',
            'publish_at'     => 'nullable|date_format:d/m/Y|after_or_equal:2000-01-01',
            'readingTime'    => 'nullable|string|max:50',
            'thumbCaption'   => 'nullable|string|max:255',
            'status'         => 'in:0,1',
            'highlight'      => 'in:0,1',

            // Imagens (validação via intervention antes de salvar)
            'images'         => 'nullable|array|max:10',
            'images.*'       => 'file|image|mimes:jpg,jpeg,png,gif,webp,bmp,tiff|max:5120',
        ];
    }

    protected function messages(): array
    {
        return [
            'title.required'    => 'O título do artigo é obrigatório.',
            'title.min'         => 'O título deve ter pelo menos 3 caracteres.',
            'title.max'         => 'O título não pode exceder 255 caracteres.',
            'category.required' => 'Selecione uma categoria para o artigo.',
            'category.exists'   => 'A categoria selecionada não existe.',
            'content.max'       => 'O conteúdo não pode exceder 100.000 caracteres.',
            'excerpt.max'       => 'O resumo não pode exceder 500 caracteres.',
            'metaDescription.max' => 'A meta descrição não pode exceder 160 caracteres.',
            'tags.max'          => 'As tags não podem exceder 500 caracteres.',
            'publish_at.date_format' => 'Formato de data inválido. Use dd/mm/aaaa.',
            'publish_at.after_or_equal' => 'A data de publicação não pode ser anterior a 01/01/2000.',
            'readingTime.max'   => 'Tempo de leitura não pode exceder 50 caracteres.',
            'thumbCaption.max'  => 'A legenda da capa não pode exceder 255 caracteres.',
            'status.in'         => 'Status inválido.',
            'highlight.in'      => 'Valor de destaque inválido.',
            'images.array'      => 'O campo de imagens é inválido.',
            'images.max'        => 'Máximo de 10 imagens por artigo.',
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
        // Valida dados do formulário
        $this->validate();

        // Valida arquivos de imagem (com Intervention)
        $this->validateImageFiles($this->images);

        // Cria o post
        $post = Post::create([
            'autor'           => auth()->id(),
            'type'            => 'artigo',
            'title'           => $this->title,
            'content'         => $this->content,
            'excerpt'         => $this->excerpt ?: null,
            'metaDescription' => $this->metaDescription ?: null,
            'category'        => $this->category,
            'tags'            => $this->tags ?: null,
            'status'          => $this->status ? 1 : 0,
            'highlight'       => $this->highlight ? 1 : 0,
            'publish_at'      => $this->publish_at ?: null,
            'readingTime'     => $this->readingTime ?: null,
            'thumb_caption'   => $this->thumbCaption ?: null,
        ]);

        // Upload e conversão das imagens para WebP
        $this->uploadImagesAsWebp($post);

        return redirect()->route('dashboard.posts.articles')
            ->with('toast_success', 'Artigo criado com sucesso!');
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

    public function updatedCategory(string $value): void
    {
        $this->validateOnly('category', [
            'category' => 'required|exists:cat_post,id',
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
        return view('livewire.dashboard.Posts.Articles.create')
            ->layout('layouts.admin', ['title' => 'Novo Artigo']);
    }
}

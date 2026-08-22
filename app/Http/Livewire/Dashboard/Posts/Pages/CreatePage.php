<?php

namespace App\Http\Livewire\Dashboard\Posts\Pages;

use Livewire\Component;
use App\Models\Post;
use App\Models\CatPost;
use App\Traits\HasAlerts;
use App\Traits\HasValidations;

class CreatePage extends Component
{
    use HasAlerts, HasValidations;

    public $title = '';
    public $content = '';
    public $excerpt = '';
    public $metaDescription = '';
    public $category = '';
    public $tags = '';
    public $status = 0;
    public $menu = 0;

    public $categories = [];

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
        ];
    }

    // ──────────────────────────────────────────────────────
    //  Salvar
    // ──────────────────────────────────────────────────────

    public function store(): \Illuminate\Http\RedirectResponse
    {
        $this->validate();

        Post::create([
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
        ]);

        return redirect()->route('dashboard.posts.pages')
            ->with('toast_success', 'Página criada com sucesso!');
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

    public function render()
    {
        return view('livewire.dashboard.Posts.Pages.create')
            ->layout('layouts.admin', ['title' => 'Nova Página']);
    }
}

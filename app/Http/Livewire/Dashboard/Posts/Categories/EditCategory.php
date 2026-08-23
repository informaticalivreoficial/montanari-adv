<?php

namespace App\Http\Livewire\Dashboard\Posts\Categories;

use Livewire\Component;
use App\Models\CatPost;
use App\Traits\HasAlerts;
use App\Traits\HasValidations;

class EditCategory extends Component
{
    use HasAlerts, HasValidations;

    public $categoryId;
    public $category = null;

    public $title = '';
    public $content = '';
    public $tags = '';
    public $type = 'artigo';
    public $status = 1;

    public function mount($id): void
    {
        $this->categoryId = $id;
        $this->loadCategory();
    }

    public function loadCategory(): void
    {
        $this->category = CatPost::findOrFail($this->categoryId);

        $this->title   = $this->category->title;
        $this->content = $this->category->content;
        $this->tags    = $this->category->tags;
        $this->type    = $this->category->type ?? 'artigo';
        $this->status  = $this->category->status ? 1 : 0;
    }

    // ──────────────────────────────────────────────────────
    //  Regras de validação
    // ──────────────────────────────────────────────────────

    protected function rules(): array
    {
        return [
            'title'   => 'required|string|min:2|max:255|unique:cat_post,title,' . $this->categoryId,
            'content' => 'nullable|string|max:5000',
            'tags'    => 'nullable|string|max:500',
            'type'    => 'required|in:artigo,page',
            'status'  => 'in:0,1',
        ];
    }

    protected function messages(): array
    {
        return [
            'title.required' => 'O título da categoria é obrigatório.',
            'title.min'      => 'O título deve ter pelo menos 2 caracteres.',
            'title.max'      => 'O título não pode exceder 255 caracteres.',
            'title.unique'   => 'Já existe uma categoria com este título.',
            'content.max'    => 'A descrição não pode exceder 5.000 caracteres.',
            'tags.max'       => 'As tags não podem exceder 500 caracteres.',
            'type.required'  => 'Selecione o tipo da categoria.',
            'type.in'        => 'Tipo inválido. Use "artigo" ou "page".',
            'status.in'      => 'Status inválido.',
        ];
    }

    // ──────────────────────────────────────────────────────
    //  Atualizar
    // ──────────────────────────────────────────────────────

    public function update(): void
    {
        $this->validate();

        $this->category->update([
            'title'   => $this->title,
            'content' => $this->content ?: null,
            'tags'    => $this->tags ?: null,
            'type'    => $this->type,
            'status'  => $this->status ? 1 : 0,
        ]);

        $this->toastSuccess('Categoria atualizada com sucesso!');
        $this->loadCategory();
    }

    // ──────────────────────────────────────────────────────
    //  Live-updating hooks
    // ──────────────────────────────────────────────────────

    public function updatedTitle(string $value): void
    {
        $this->validateOnly('title', [
            'title' => 'required|string|min:2|max:255|unique:cat_post,title,' . $this->categoryId,
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.Posts.Categories.edit')
            ->layout('layouts.admin', ['title' => 'Editar Categoria']);
    }
}

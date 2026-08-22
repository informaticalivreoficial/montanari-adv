<?php

namespace App\Http\Livewire\Dashboard\Posts\Categories;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CatPost;
use App\Traits\HasAlerts;

class ListCategories extends Component
{
    use WithPagination, HasAlerts;

    public $search = '';

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $category = CatPost::findOrFail($id);

        if ($category->posts()->count() > 0) {
            $this->toastError('Não é possível excluir: existem posts nesta categoria!');
            return;
        }

        $category->delete();
        $this->toastSuccess('Categoria excluída com sucesso!');
    }

    public function toggleStatus($id)
    {
        $category = CatPost::findOrFail($id);
        $category->update(['status' => $category->status ? 0 : 1]);

        $this->toastSuccess($category->status ? 'Categoria ativada!' : 'Categoria desativada!');
    }

    public function render()
    {
        $categories = CatPost::withCount('posts')
            ->when($this->search, fn($q) => $q->where('title', 'like', "%{$this->search}%"))
            ->latest()
            ->paginate(10);

        return view('livewire.dashboard.Posts.Categories.list', compact('categories'))
            ->layout('layouts.admin', ['title' => 'Categorias']);
    }
}

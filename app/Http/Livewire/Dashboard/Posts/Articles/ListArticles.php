<?php

namespace App\Http\Livewire\Dashboard\Posts\Articles;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use App\Models\CatPost;
use App\Traits\HasAlerts;

class ListArticles extends Component
{
    use WithPagination, HasAlerts;

    public $search = '';
    public $filterCategory = '';
    public $filterStatus = '';

    protected $queryString = ['search', 'filterCategory', 'filterStatus'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterCategory()
    {
        $this->resetPage();
    }

    public function updatingFilterStatus()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        $this->toastSuccess('Artigo excluído com sucesso!');
    }

    public function toggleStatus($id)
    {
        $post = Post::findOrFail($id);
        $post->update(['status' => $post->status ? 0 : 1]);

        $this->toastSuccess($post->status ? 'Artigo ativado!' : 'Artigo inativado!');
    }

    public function render()
    {
        $categories = CatPost::active()->pluck('title', 'id')->toArray();

        $posts = Post::with('categoryObject', 'user')
            ->where('type', 'artigo')
            ->when($this->search, fn($q) => $q->where(function ($query) {
                $query->where('title', 'like', "%{$this->search}%")
                    ->orWhere('slug', 'like', "%{$this->search}%")
                    ->orWhere('excerpt', 'like', "%{$this->search}%");
            }))
            ->when($this->filterCategory, fn($q) => $q->where('category', $this->filterCategory))
            ->when($this->filterStatus !== '', fn($q) => $q->where('status', $this->filterStatus))
            ->latest()
            ->paginate(10);

        return view('livewire.dashboard.Posts.Articles.list', compact('posts', 'categories'))
            ->layout('layouts.admin', ['title' => 'Artigos']);
    }
}

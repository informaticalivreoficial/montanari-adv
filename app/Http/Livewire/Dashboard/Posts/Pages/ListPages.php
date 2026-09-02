<?php

namespace App\Http\Livewire\Dashboard\Posts\Pages;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use App\Models\CatPost;
use App\Traits\HasAlerts;
use Illuminate\Support\Facades\Gate;

class ListPages extends Component
{
    use WithPagination, HasAlerts;

    public $search = '';
    public $filterStatus = '';

    protected $queryString = ['search', 'filterStatus'];

    public function mount(): void
    {
        Gate::authorize('viewAny', \App\Models\Post::class);
    }

    public function updatingSearch()
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

        $this->toastSuccess('Página excluída com sucesso!');
    }

    public function toggleStatus($id)
    {
        $post = Post::findOrFail($id);
        $post->update(['status' => $post->status ? 0 : 1]);

        $this->toastSuccess($post->status ? 'Página publicada!' : 'Página despublicada!');
    }

    public function render()
    {
        $pages = Post::with('category', 'user')
            ->where('type', 'page')
            ->when($this->search, fn($q) => $q->where(function ($query) {
                $query->where('title', 'like', "%{$this->search}%")
                    ->orWhere('slug', 'like', "%{$this->search}%");
            }))
            ->when($this->filterStatus !== '', fn($q) => $q->where('status', $this->filterStatus))
            ->latest()
            ->paginate(10);

        return view('livewire.dashboard.Posts.Pages.list', compact('pages'))
            ->layout('layouts.admin', ['title' => 'Páginas']);
    }
}

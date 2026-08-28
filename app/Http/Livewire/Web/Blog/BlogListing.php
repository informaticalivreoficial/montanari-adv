<?php

namespace App\Http\Livewire\Web\Blog;

use App\Models\Post;
use Livewire\Component;

class BlogListing extends Component
{
    public int $perPage = 9;
    public int $currentPage = 1;
    public int $totalPosts = 0;

    public function loadMore(): void
    {
        $this->currentPage++;
    }

    public function render()
    {
        $query = Post::orderBy('created_at', 'DESC')
            ->where('type', 'artigo')
            ->where('status', 1);

        $this->totalPosts = $query->count();

        $posts = (clone $query)
            ->take($this->currentPage * $this->perPage)
            ->get();

        $hasMore = $posts->count() < $this->totalPosts;

        return view('livewire.web.blog.blog-listing', [
            'posts' => $posts,
            'hasMore' => $hasMore,
        ]);
    }
}

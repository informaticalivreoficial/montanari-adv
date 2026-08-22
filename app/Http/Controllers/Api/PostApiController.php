<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\CatPost;
use App\Models\PostGb;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostApiController extends Controller
{
    /**
     * GET /api/posts
     * Lista posts com filtros (type, category, status)
     */
    public function index(Request $request): JsonResponse
    {
        $query = Post::with(['category', 'user', 'images']);

        // Filtro por tipo
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filtro por categoria
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Filtro por status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Busca
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        // Apenas publicados (para API pública)
        if ($request->boolean('published_only')) {
            $query->where('status', 1);
        }

        $posts = $query->orderByDesc('publish_at')
            ->orderByDesc('created_at')
            ->paginate($request->get('per_page', 15));

        return response()->json([
            'success' => true,
            'data' => $posts,
        ]);
    }

    /**
     * GET /api/posts/{slug}
     * Busca post por slug
     */
    public function showBySlug(string $slug): JsonResponse
    {
        $post = Post::with(['category', 'user', 'images'])
            ->where('slug', $slug)
            ->firstOrFail();

        // Incrementa views
        $post->increment('views');

        return response()->json([
            'success' => true,
            'data' => $this->formatPost($post),
        ]);
    }

    /**
     * GET /api/posts/{id}
     * Busca post por ID
     */
    public function show(int $id): JsonResponse
    {
        $post = Post::with(['category', 'user', 'images'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $this->formatPost($post),
        ]);
    }

    /**
     * POST /api/posts
     * Cria um post
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'type'            => 'required|in:artigo,page',
            'title'           => 'required|string|min:3|max:255',
            'content'         => 'nullable|string|max:100000',
            'excerpt'         => 'nullable|string|max:500',
            'metaDescription' => 'nullable|string|max:160',
            'category'        => 'nullable|exists:cat_post,id',
            'tags'            => 'nullable|string|max:500',
            'status'          => 'boolean',
            'highlight'       => 'boolean',
            'menu'            => 'boolean',
            'publish_at'      => 'nullable|date',
            'readingTime'     => 'nullable|string|max:50',
            'thumb_caption'   => 'nullable|string|max:255',
        ], [
            'title.required'    => 'O título é obrigatório.',
            'title.min'         => 'O título deve ter pelo menos 3 caracteres.',
            'title.max'         => 'O título não pode exceder 255 caracteres.',
            'content.max'       => 'O conteúdo não pode exceder 100.000 caracteres.',
            'excerpt.max'       => 'O resumo não pode exceder 500 caracteres.',
            'metaDescription.max' => 'A meta descrição não pode exceder 160 caracteres.',
            'category.exists'   => 'A categoria selecionada não existe.',
            'tags.max'          => 'As tags não podem exceder 500 caracteres.',
            'publish_at.date'   => 'Formato de data inválido.',
            'readingTime.max'   => 'Tempo de leitura não pode exceder 50 caracteres.',
            'thumb_caption.max' => 'A legenda não pode exceder 255 caracteres.',
        ]);

        $validated['autor'] = auth()->id() ?? 1;

        $post = Post::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Post criado com sucesso!',
            'data' => $this->formatPost($post),
        ], 201);
    }

    /**
     * PUT /api/posts/{id}
     * Atualiza um post
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'type'            => 'sometimes|required|in:artigo,page',
            'title'           => 'sometimes|required|string|min:3|max:255',
            'content'         => 'nullable|string|max:100000',
            'excerpt'         => 'nullable|string|max:500',
            'metaDescription' => 'nullable|string|max:160',
            'category'        => 'nullable|exists:cat_post,id',
            'tags'            => 'nullable|string|max:500',
            'status'          => 'boolean',
            'highlight'       => 'boolean',
            'menu'            => 'boolean',
            'publish_at'      => 'nullable|date',
            'readingTime'     => 'nullable|string|max:50',
            'thumb_caption'   => 'nullable|string|max:255',
        ], [
            'title.min'         => 'O título deve ter pelo menos 3 caracteres.',
            'title.max'         => 'O título não pode exceder 255 caracteres.',
            'content.max'       => 'O conteúdo não pode exceder 100.000 caracteres.',
            'excerpt.max'       => 'O resumo não pode exceder 500 caracteres.',
            'metaDescription.max' => 'A meta descrição não pode exceder 160 caracteres.',
            'category.exists'   => 'A categoria selecionada não existe.',
            'tags.max'          => 'As tags não podem exceder 500 caracteres.',
            'publish_at.date'   => 'Formato de data inválido.',
            'readingTime.max'   => 'Tempo de leitura não pode exceder 50 caracteres.',
            'thumb_caption.max' => 'A legenda não pode exceder 255 caracteres.',
        ]);

        $post->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Post atualizado com sucesso!',
            'data' => $this->formatPost($post),
        ]);
    }

    /**
     * DELETE /api/posts/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post excluído com sucesso!',
        ]);
    }

    /**
     * GET /api/posts/types
     * Retorna tipos disponíveis
     */
    public function types(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => [
                ['value' => 'artigo', 'label' => 'Artigo'],
                ['value' => 'page', 'label' => 'Página'],
            ],
        ]);
    }

    /**
     * GET /api/posts/highlighted
     * Posts em destaque (para o site)
     */
    public function highlighted(): JsonResponse
    {
        $posts = Post::with(['category', 'user', 'images'])
            ->where('status', 1)
            ->where('highlight', 1)
            ->where('type', 'artigo')
            ->orderByDesc('publish_at')
            ->limit(6)
            ->get()
            ->map(fn($p) => $this->formatPost($p));

        return response()->json([
            'success' => true,
            'data' => $posts,
        ]);
    }

    /**
     * GET /api/posts/recent
     * Posts recentes (para o site)
     */
    public function recent(): JsonResponse
    {
        $posts = Post::with(['category', 'user', 'images'])
            ->where('status', 1)
            ->where('type', 'artigo')
            ->orderByDesc('publish_at')
            ->limit(10)
            ->get()
            ->map(fn($p) => $this->formatPost($p));

        return response()->json([
            'success' => true,
            'data' => $posts,
        ]);
    }

    /**
     * ─────────────────────────────────────────────
     *  Categorias
     * ─────────────────────────────────────────────
     */

    /**
     * GET /api/categories
     */
    public function categories(): JsonResponse
    {
        $categories = CatPost::withCount('posts')
            ->where('status', 1)
            ->orderBy('title')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $categories,
        ]);
    }

    /**
     * GET /api/categories/{slug}
     */
    public function categoryBySlug(string $slug): JsonResponse
    {
        $category = CatPost::withCount('posts')
            ->where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        return response()->json([
            'success' => true,
            'data' => $category,
        ]);
    }

    /**
     * POST /api/categories
     */
    public function storeCategory(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title'   => 'required|string|min:2|max:255|unique:cat_post,title',
            'content' => 'nullable|string|max:5000',
            'tags'    => 'nullable|string|max:500',
            'type'    => 'required|in:artigo,page',
            'status'  => 'boolean',
        ], [
            'title.required' => 'O título é obrigatório.',
            'title.min'      => 'O título deve ter pelo menos 2 caracteres.',
            'title.unique'   => 'Já existe uma categoria com este título.',
            'content.max'    => 'A descrição não pode exceder 5.000 caracteres.',
            'tags.max'       => 'As tags não podem exceder 500 caracteres.',
            'type.required'  => 'Selecione o tipo da categoria.',
            'type.in'        => 'Tipo inválido. Use "artigo" ou "page".',
        ]);

        $category = CatPost::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Categoria criada com sucesso!',
            'data' => $category,
        ], 201);
    }

    /**
     * PUT /api/categories/{id}
     */
    public function updateCategory(Request $request, int $id): JsonResponse
    {
        $category = CatPost::findOrFail($id);

        $validated = $request->validate([
            'title'   => 'sometimes|required|string|min:2|max:255|unique:cat_post,title,' . $id,
            'content' => 'nullable|string|max:5000',
            'tags'    => 'nullable|string|max:500',
            'type'    => 'sometimes|required|in:artigo,page',
            'status'  => 'boolean',
        ], [
            'title.min'      => 'O título deve ter pelo menos 2 caracteres.',
            'title.unique'   => 'Já existe uma categoria com este título.',
            'content.max'    => 'A descrição não pode exceder 5.000 caracteres.',
            'tags.max'       => 'As tags não podem exceder 500 caracteres.',
            'type.in'        => 'Tipo inválido. Use "artigo" ou "page".',
        ]);

        $category->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Categoria atualizada com sucesso!',
            'data' => $category,
        ]);
    }

    /**
     * DELETE /api/categories/{id}
     */
    public function destroyCategory(int $id): JsonResponse
    {
        $category = CatPost::findOrFail($id);

        if ($category->posts()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Não é possível excluir: existem posts nesta categoria.',
            ], 422);
        }

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Categoria excluída com sucesso!',
        ]);
    }

    /**
     * Formata post para resposta da API
     */
    protected function formatPost(Post $post): array
    {
        return [
            'id' => $post->id,
            'type' => $post->type,
            'type_label' => $post->type === 'artigo' ? 'Artigo' : 'Página',
            'title' => $post->title,
            'slug' => $post->slug,
            'content' => $post->content,
            'excerpt' => $post->excerpt,
            'meta_description' => $post->metaDescription,
            'tags' => $post->tags,
            'status' => $post->status,
            'status_label' => $post->status ? 'Publicado' : 'Rascunho',
            'highlight' => $post->highlight,
            'menu' => $post->menu,
            'views' => $post->views,
            'reading_time' => $post->readingTime,
            'publish_at' => $post->publish_at?->toIso8601String(),
            'cover_url' => $post->cover(),
            'category' => $post->category ? [
                'id' => $post->category->id,
                'title' => $post->category->title,
                'slug' => $post->category->slug,
            ] : null,
            'author' => $post->user ? [
                'id' => $post->user->id,
                'name' => $post->user->name,
            ] : null,
            'images' => $post->images->map(fn($img) => [
                'id' => $img->id,
                'path' => $img->path,
                'url' => Storage::url($img->path),
                'cover' => (bool) $img->cover,
            ]),
            'created_at' => $post->created_at?->toIso8601String(),
            'updated_at' => $post->updated_at?->toIso8601String(),
        ];
    }
}

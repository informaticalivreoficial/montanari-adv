<div>
    <!-- Header -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Artigos</h1>
            <p class="mt-1 text-sm text-gray-500">Gerencie artigos do blog e do site.</p>
        </div>
        <a
            href="{{ route('dashboard.posts.articles.create') }}"
            class="inline-flex items-center gap-2 rounded-lg bg-amber-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700"
        >
            <i class="fa-solid fa-plus text-xs"></i>
            Novo Artigo
        </a>
    </div>

    <!-- Filters -->
    <div class="mb-6 rounded-xl border border-gray-200 bg-white shadow-sm p-4">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Buscar</label>
                <div class="relative">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <input
                        type="text"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Título, slug, trecho..."
                        class="w-full rounded-lg border border-gray-300 bg-white pl-10 pr-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20"
                    >
                </div>
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Categoria</label>
                <select wire:model.live="filterCategory" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
                    <option value="">Todas</option>
                    @foreach($categories as $id => $title)
                        <option value="{{ $id }}">{{ $title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <select wire:model.live="filterStatus" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
                    <option value="">Todos</option>
                    <option value="1">Publicado</option>
                    <option value="0">Rascunho</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Articles Table -->
    <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
        @if($posts->isEmpty())
            <div class="px-6 py-12 text-center">
                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-gray-100 mx-auto mb-4">
                    <i class="fa-solid fa-newspaper text-2xl text-gray-400"></i>
                </div>
                <p class="text-gray-500">Nenhum artigo encontrado.</p>
                <a href="{{ route('dashboard.posts.articles.create') }}" class="mt-4 inline-flex items-center gap-2 text-amber-600 hover:text-amber-700 font-medium text-sm">
                    <i class="fa-solid fa-plus"></i> Criar primeiro artigo
                </a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Artigo</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Categoria</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Autor</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Views</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Publicado em</th>
                            <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($posts as $post)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="h-10 w-10 flex-shrink-0 rounded-lg bg-gray-100 overflow-hidden">
                                            <img src="{{ $post->cover() }}" alt="" class="h-full w-full object-cover">
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold text-gray-900 max-w-xs truncate">{{ $post->title }}</p>
                                            <p class="text-xs text-gray-500">/blog/artigo/{{ $post->slug }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center rounded-full bg-blue-50 px-2.5 py-0.5 text-xs font-medium text-blue-700">
                                        {{ $post->category?->title ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $post->user?->name ?? '-' }}
                                </td>
                                <td class="px-6 py-4">
                                    <button wire:click="toggleStatus({{ $post->id }})" class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-0.5 text-xs font-medium transition cursor-pointer
                                        {{ $post->status
                                            ? 'bg-emerald-100 text-emerald-800 hover:bg-emerald-200'
                                            : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                                        <span class="h-1.5 w-1.5 rounded-full {{ $post->status ? 'bg-emerald-500' : 'bg-gray-400' }}"></span>
                                        {{ $post->status ? 'Publicado' : 'Rascunho' }}
                                    </button>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ number_format($post->views) }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $post->publish_at?->format('d/m/Y') ?? '-' }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('dashboard.posts.articles.edit', $post->id) }}" class="rounded-lg p-2 text-gray-400 hover:bg-gray-100 hover:text-amber-600 transition">
                                            <i class="fa-solid fa-pen-to-square text-sm"></i>
                                        </a>
                                        <button wire:click="delete({{ $post->id }})" onclick="return confirm('Tem certeza que deseja excluir este artigo?')" class="rounded-lg p-2 text-gray-400 hover:bg-red-50 hover:text-red-600 transition">
                                            <i class="fa-solid fa-trash text-sm"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="border-t border-gray-100 px-6 py-4">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</div>

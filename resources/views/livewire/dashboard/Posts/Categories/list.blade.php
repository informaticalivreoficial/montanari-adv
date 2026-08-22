<div>
    <!-- Header -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Categorias</h1>
            <p class="mt-1 text-sm text-gray-500">Gerencie as categorias de posts.</p>
        </div>
        <a
            href="{{ route('dashboard.posts.categories.create') }}"
            class="inline-flex items-center gap-2 rounded-lg bg-amber-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700"
        >
            <i class="fa-solid fa-plus text-xs"></i>
            Nova Categoria
        </a>
    </div>

    <!-- Filters -->
    <div class="mb-6 rounded-xl border border-gray-200 bg-white shadow-sm p-4">
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Buscar</label>
            <div class="relative">
                <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                <input
                    type="text"
                    wire:model.live.debounce.300ms="search"
                    placeholder="Nome da categoria..."
                    class="w-full rounded-lg border border-gray-300 bg-white pl-10 pr-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20"
                >
            </div>
        </div>
    </div>

    <!-- Categories Table -->
    <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
        @if($categories->isEmpty())
            <div class="px-6 py-12 text-center">
                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-gray-100 mx-auto mb-4">
                    <i class="fa-solid fa-folder text-2xl text-gray-400"></i>
                </div>
                <p class="text-gray-500">Nenhuma categoria encontrada.</p>
                <a href="{{ route('dashboard.posts.categories.create') }}" class="mt-4 inline-flex items-center gap-2 text-amber-600 hover:text-amber-700 font-medium text-sm">
                    <i class="fa-solid fa-plus"></i> Criar primeira categoria
                </a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Categoria</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Tipo</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Posts</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($categories as $cat)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">{{ $cat->title }}</p>
                                        @if($cat->content)
                                            <p class="text-xs text-gray-500 max-w-xs truncate">{{ Str::words($cat->content, 10) }}</p>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center rounded-full bg-purple-50 px-2.5 py-0.5 text-xs font-medium text-purple-700">
                                        {{ ucfirst($cat->type ?? 'artigo') }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    {{ $cat->posts_count }} posts
                                </td>
                                <td class="px-6 py-4">
                                    <button wire:click="toggleStatus({{ $cat->id }})" class="inline-flex items-center gap-1.5 rounded-full px-2.5 py-0.5 text-xs font-medium transition cursor-pointer
                                        {{ $cat->status
                                            ? 'bg-emerald-100 text-emerald-800 hover:bg-emerald-200'
                                            : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                                        <span class="h-1.5 w-1.5 rounded-full {{ $cat->status ? 'bg-emerald-500' : 'bg-gray-400' }}"></span>
                                        {{ $cat->status ? 'Ativa' : 'Inativa' }}
                                    </button>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('dashboard.posts.categories.edit', $cat->id) }}" class="rounded-lg p-2 text-gray-400 hover:bg-gray-100 hover:text-amber-600 transition">
                                            <i class="fa-solid fa-pen-to-square text-sm"></i>
                                        </a>
                                        <button wire:click="delete({{ $cat->id }})" onclick="return confirm('Tem certeza que deseja excluir esta categoria?')" class="rounded-lg p-2 text-gray-400 hover:bg-red-50 hover:text-red-600 transition">
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
                {{ $categories->links() }}
            </div>
        @endif
    </div>
</div>

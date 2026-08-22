<div>
    <!-- Header -->
    <div class="mb-6 flex items-center gap-4">
        <a
            href="{{ route('dashboard.posts.categories') }}"
            class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white p-2 text-gray-600 shadow-sm transition hover:bg-gray-50"
        >
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Editar Categoria</h1>
            <p class="mt-1 text-sm text-gray-500">Edite as informações da categoria.</p>
        </div>
    </div>

    <form wire:submit.prevent="update">
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <!-- Main Card -->
            <div class="lg:col-span-2">
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-folder text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Dados da Categoria</h3>
                        </div>
                        <div class="space-y-4">
                            <x-input name="title" label="Título" required placeholder="Nome da categoria" wire:model="title" />
                            <x-textarea name="content" label="Descrição" rows="3" placeholder="Descrição da categoria..." wire:model="content" />
                            <x-tags name="tags" label="Tags" value="{{ $tags }}" placeholder="Digite e pressione Enter..." wire:model="tags" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Type -->
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-tag text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Tipo</h3>
                        </div>
                        <select wire:model="type" class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 focus:outline-none transition">
                            <option value="artigo">Artigo</option>
                            <option value="page">Página</option>
                        </select>
                    </div>
                </div>

                <!-- Status -->
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-toggle-on text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Status</h3>
                        </div>
                        <select wire:model="status" class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 focus:outline-none transition">
                            <option value="1">Ativa</option>
                            <option value="0">Inativa</option>
                        </select>
                    </div>
                </div>

                <!-- Meta -->
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm px-6 py-4">
                    <div class="space-y-2 text-xs text-gray-500">
                        <p><strong>Criado:</strong> {{ $category?->created_at?->format('d/m/Y H:i') ?? '-' }}</p>
                        <p><strong>Atualizado:</strong> {{ $category?->updated_at?->format('d/m/Y H:i') ?? '-' }}</p>
                        <p><strong>Slug:</strong> {{ $category?->slug ?? '-' }}</p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-6">
                    <div class="space-y-3">
                        <button
                            type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-lg bg-amber-600 px-4 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed"
                            wire:loading.attr="disabled"
                            wire:target="update"
                        >
                            <span wire:loading.remove wire:target="update">
                                <i class="fa-solid fa-save text-xs"></i>
                                Salvar Alterações
                            </span>
                            <span wire:loading wire:target="update">
                                <i class="fa-solid fa-spinner fa-spin text-xs"></i>
                                Salvando...
                            </span>
                        </button>
                        <a
                            href="{{ route('dashboard.posts.categories') }}"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50"
                        >
                            <i class="fa-solid fa-times text-xs"></i>
                            Cancelar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

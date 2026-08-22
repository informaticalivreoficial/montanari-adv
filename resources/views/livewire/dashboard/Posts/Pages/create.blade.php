<div>
    <!-- Header -->
    <div class="mb-6 flex items-center gap-4">
        <a
            href="{{ route('dashboard.posts.pages') }}"
            class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white p-2 text-gray-600 shadow-sm transition hover:bg-gray-50"
        >
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Nova Página</h1>
            <p class="mt-1 text-sm text-gray-500">Crie uma nova página institucional.</p>
        </div>
    </div>

    <form wire:submit.prevent="store">
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <!-- Main Card -->
            <div class="lg:col-span-2">
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">

                    {{-- Section: Content --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-align-left text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Conteúdo</h3>
                        </div>
                        <div class="space-y-4">
                            <x-input name="title" label="Título" required placeholder="Título da página" wire:model="title" />
                            <x-textarea name="content" label="Conteúdo" rows="12" placeholder="Escreva o conteúdo da página aqui..." wire:model="content" />
                        </div>
                    </div>

                    <div class="border-t border-gray-100"></div>

                    {{-- Section: SEO --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-magnifying-glass text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">SEO</h3>
                        </div>
                        <div class="space-y-4">
                            <x-textarea name="excerpt" label="Resumo" rows="2" placeholder="Breve descrição..." wire:model="excerpt" />
                            <x-input name="metaDescription" label="Meta Descrição" placeholder="Descrição para mecanismos de busca" wire:model="metaDescription" />
                            <x-tags name="tags" label="Tags" placeholder="Digite e pressione Enter..." wire:model="tags" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Category -->
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-folder text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Categoria</h3>
                        </div>
                        <select wire:model="category" class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 focus:outline-none transition">
                            <option value="">Sem categoria</option>
                            @foreach($categories as $id => $title)
                                <option value="{{ $id }}">{{ $title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Settings -->
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-gear text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Configurações</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <label class="text-sm font-medium text-gray-700">Exibir no Menu</label>
                                <button type="button" wire:click="$set('menu', {{ $menu ? 0 : 1 }})" class="relative inline-flex h-6 w-11 items-center rounded-full transition {{ $menu ? 'bg-amber-600' : 'bg-gray-300' }}">
                                    <span class="inline-block h-4 w-4 transform rounded-full bg-white transition {{ $menu ? 'translate-x-6' : 'translate-x-1' }}"></span>
                                </button>
                            </div>
                            <div class="space-y-1">
                                <label class="block text-sm font-medium text-gray-700">Status</label>
                                <select wire:model="status" class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 focus:outline-none transition">
                                    <option value="0">Rascunho</option>
                                    <option value="1">Publicado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-6">
                    <div class="space-y-3">
                        <button
                            type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-lg bg-amber-600 px-4 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed"
                            wire:loading.attr="disabled"
                            wire:target="store"
                        >
                            <span wire:loading.remove wire:target="store">
                                <i class="fa-solid fa-save text-xs"></i>
                                Criar Página
                            </span>
                            <span wire:loading wire:target="store">
                                <i class="fa-solid fa-spinner fa-spin text-xs"></i>
                                Salvando...
                            </span>
                        </button>
                        <a
                            href="{{ route('dashboard.posts.pages') }}"
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

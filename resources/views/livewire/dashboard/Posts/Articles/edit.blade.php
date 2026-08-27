<div>
    <!-- Header -->
    <div class="mb-6 flex items-center gap-4">
        <a
            href="{{ route('dashboard.posts.articles') }}"
            class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white p-2 text-gray-600 shadow-sm transition hover:bg-gray-50"
        >
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Editar Artigo</h1>
            <p class="mt-1 text-sm text-gray-500">Edite as informações do artigo.</p>
        </div>
    </div>

    <form wire:submit.prevent="update">
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <!-- Main Card -->
            <div class="lg:col-span-2 space-y-6">
                {{-- Section: Content --}}
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-align-left text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Conteúdo</h3>
                        </div>
                        <div class="space-y-4">
                            <x-input name="title" label="Título" required placeholder="Título do artigo" wire:model="title" />
                            <x-quill name="content" label="Conteúdo" toolbar="full" height="300" placeholder="Escreva o conteúdo do artigo aqui..." wire:model="content" />
                            <x-textarea name="excerpt" label="Resumo" rows="2" placeholder="Breve descrição do artigo..." wire:model="excerpt" />
                        </div>
                    </div>
                </div>

                {{-- Section: SEO --}}
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-magnifying-glass text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">SEO</h3>
                        </div>
                        <div class="space-y-4">
                            <x-input name="metaDescription" label="Meta Descrição" placeholder="Descrição para mecanismos de busca" wire:model="metaDescription" />
                            <x-tags name="tags" label="Tags" value="{{ $tags }}" placeholder="Digite e pressione Enter..." wire:model="tags" />
                        </div>
                    </div>
                </div>

                {{-- Section: Images --}}
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="px-6 py-5">
                        <x-image-gallery
                            wireModel="newImages"
                            label="Imagens do Artigo"
                            :existingImages="$existingImages"
                            :showUpload="true"
                        />
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
                            <div>
                                <h3 class="text-sm font-semibold text-gray-900">Categoria</h3>
                                <p class="text-xs text-gray-500">Obrigatório</p>
                            </div>
                        </div>
                        <select wire:model="category" required class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 focus:outline-none transition @error('category') border-red-500 @enderror">
                            <option value="">Selecione</option>
                            @foreach($categories as $id => $title)
                                <option value="{{ $id }}">{{ $title }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Publish Settings -->
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-calendar text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Publicação</h3>
                        </div>
                        <div class="space-y-4">
                            <x-date-picker name="publish_at" label="Data de Publicação" placeholder="Selecione a data..." wire:model.live="publish_at" />
                            <x-input name="readingTime" label="Tempo de Leitura" placeholder="Ex: 5 min" wire:model="readingTime" />
                            <div class="flex items-center justify-between">
                                <label class="text-sm font-medium text-gray-700">Destaque</label>
                                <button type="button" wire:click="$set('highlight', {{ $highlight ? 0 : 1 }})" class="relative inline-flex h-6 w-11 items-center rounded-full transition {{ $highlight ? 'bg-amber-600' : 'bg-gray-300' }}">
                                    <span class="inline-block h-4 w-4 transform rounded-full bg-white transition {{ $highlight ? 'translate-x-6' : 'translate-x-1' }}"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Status -->
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-tag text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Status</h3>
                        </div>
                        <select wire:model="status" class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 focus:outline-none transition">
                            <option value="0">Rascunho</option>
                            <option value="1">Publicado</option>
                        </select>
                    </div>
                </div>

                <!-- Meta -->
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm px-6 py-4">
                    <div class="space-y-2 text-xs text-gray-500">
                        <p><strong>Criado:</strong> {{ $post?->created_at?->format('d/m/Y H:i') ?? '-' }}</p>
                        <p><strong>Atualizado:</strong> {{ $post?->updated_at?->format('d/m/Y H:i') ?? '-' }}</p>
                        <p><strong>Slug:</strong> {{ $post?->slug ?? '-' }}</p>
                        <p><strong>Views:</strong> {{ number_format($post?->views ?? 0) }}</p>
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
                            href="{{ route('dashboard.posts.articles') }}"
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

@props([
    'wireModel' => 'images',
    'label' => 'Imagens',
    'existingImages' => [],
    'showUpload' => true,
    'maxFiles' => 10,
    'class' => '',
])

{{--
  ═══════════════════════════════════════════════════════════
  Componente: x-image-gallery
  ═══════════════════════════════════════════════════════════

  Galeria de imagens avançada com:
  - Upload múltiplo com pré-visualização instantânea
  - Reordenamento por drag & drop (SortableJS)
  - Lightbox para visualização em tela cheia (fsLightbox)
  - Marcar/remover capa
  - Excluir imagens existentes
  - Legenda da capa (thumb_caption)

  Props:
    wireModel      → Nome da propriedade Livewire (ex: 'images' ou 'newImages')
    label          → Label da seção
    existingImages → Array de imagens existentes [{id, path, url, cover, thumb_caption}]
    showUpload     → Mostrar área de upload
    maxFiles       → Máximo de arquivos
    class          → Classes CSS adicionais

  Uso:
    <x-image-gallery wireModel="images" />
    <x-image-gallery wireModel="newImages" :existingImages="$existingImages" />
--}}

@php
    // Lê o valor atual da propriedade Livewire para o preview
    $currentFiles = $this->{$wireModel} ?? [];
@endphp

<div class="space-y-4 {{ $class }}">
    <div class="flex items-center gap-3">
        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
            <i class="fa-solid fa-images text-sm"></i>
        </div>
        <div>
            <h3 class="text-sm font-semibold text-gray-900">{{ $label }}</h3>
            <p class="text-xs text-gray-500">Arraste para reordenar. Clique na imagem para ampliar.</p>
        </div>
    </div>

    {{-- ═══════════════════════════════════════════════════════
         Existing Images Grid (Sortable + Lightbox)
         ═══════════════════════════════════════════════════════ --}}
    @if(!empty($existingImages))
        <div
            x-data="{
                sortableInstance: null,
                init() {
                    this.initSortable();
                    this.initLightbox();
                },
                initSortable() {
                    const container = this.$refs.sortableContainer;
                    if (!container || typeof Sortable === 'undefined') return;

                    this.sortableInstance = Sortable.create(container, {
                        animation: 200,
                        ghostClass: 'opacity-40',
                        chosenClass: 'ring-2 ring-amber-500',
                        dragClass: 'shadow-xl',
                        handle: '.gallery-drag-handle',
                        onEnd: (evt) => {
                            const items = container.querySelectorAll('[data-image-id]');
                            const order = Array.from(items).map((item, index) => ({
                                id: parseInt(item.dataset.imageId),
                                order: index,
                            }));
                            // Envia para Livewire via reorderImages
                            @this.reorderImages(order);
                        }
                    });
                },
                initLightbox() {
                    setTimeout(() => {
                        if (typeof refreshFsLightbox === 'function') {
                            refreshFsLightbox();
                        }
                    }, 500);
                },
                openLightbox(index) {
                    if (typeof fsLightbox !== 'undefined') {
                        fsLightbox.open(index);
                    }
                }
            }"
            class="space-y-4"
        >
            <div
                x-ref="sortableContainer"
                class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-4"
            >
                @foreach($existingImages as $index => $img)
                    <div
                        class="relative group rounded-xl overflow-hidden border-2 transition-all {{ $img['cover'] ? 'border-amber-500 shadow-md' : 'border-gray-200 hover:border-gray-300' }}"
                        data-image-id="{{ $img['id'] }}"
                    >
                        {{-- Drag Handle --}}
                        <div class="gallery-drag-handle absolute top-2 left-2 z-20 cursor-grab active:cursor-grabbing rounded-lg bg-black/50 p-1.5 text-white opacity-0 group-hover:opacity-100 transition">
                            <i class="fa-solid fa-grip-vertical text-xs"></i>
                        </div>

                        {{-- Image with Lightbox --}}
                        <a
                            href="{{ $img['url'] ?? \App\Services\Asset::url($img['path']) }}"
                            class="block aspect-square overflow-hidden"
                            data-fslightbox="gallery-{{ $wireModel }}"
                            data-caption="{{ $img['thumb_caption'] ?? '' }}"
                            onclick="event.preventDefault();"
                        >
                            <img
                                src="{{ $img['url'] ?? \App\Services\Asset::url($img['path']) }}"
                                alt="{{ $img['thumb_caption'] ?? '' }}"
                                class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
                                loading="lazy"
                            >
                        </a>

                        {{-- Cover Badge --}}
                        @if($img['cover'])
                            <span class="absolute top-2 right-2 z-10 rounded-full bg-amber-500 px-2.5 py-1 text-xs font-bold text-white shadow-lg">
                                <i class="fa-solid fa-star mr-1"></i> Capa
                            </span>
                        @endif

                        {{-- Overlay Actions --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 z-10">
                            <div class="absolute bottom-0 left-0 right-0 p-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-1.5">
                                        {{-- View Lightbox --}}
                                        <button
                                            type="button"
                                            @click.prevent="openLightbox({{ $index }})"
                                            class="rounded-lg bg-white/90 p-2 text-gray-700 hover:bg-white hover:text-amber-600 transition shadow"
                                            title="Ampliar"
                                        >
                                            <i class="fa-solid fa-expand text-xs"></i>
                                        </button>

                                        {{-- Toggle Cover --}}
                                        @if(!$img['cover'])
                                            <button
                                                type="button"
                                                wire:click="setCover({{ $img['id'] }})"
                                                class="rounded-lg bg-white/90 p-2 text-gray-700 hover:bg-white hover:text-amber-600 transition shadow"
                                                title="Definir como capa"
                                            >
                                                <i class="fa-regular fa-star text-xs"></i>
                                            </button>
                                        @endif

                                        {{-- Delete --}}
                                        <button
                                            type="button"
                                            wire:click="deleteImage({{ $img['id'] }})"
                                            onclick="return confirm('Remover esta imagem?')"
                                            class="rounded-lg bg-white/90 p-2 text-gray-700 hover:bg-white hover:text-red-600 transition shadow"
                                            title="Excluir"
                                        >
                                            <i class="fa-solid fa-trash text-xs"></i>
                                        </button>
                                    </div>

                                    <span class="rounded-full bg-black/60 px-2 py-0.5 text-xs font-medium text-white">
                                        {{ $index + 1 }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Thumb Caption (cover only) --}}
                        @if($img['cover'])
                            <div class="absolute top-2 left-10 z-20">
                                <input
                                    type="text"
                                    wire:model.live.debounce.500ms="thumbCaptions.{{ $img['id'] }}"
                                    placeholder="Legenda da capa..."
                                    class="rounded-lg border-0 bg-black/60 px-3 py-1.5 text-xs text-white placeholder-white/60 shadow-sm focus:bg-black/80 focus:outline-none focus:ring-2 focus:ring-amber-500/40 w-40"
                                >
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            {{-- Cover Caption --}}
            @php $coverImage = collect($existingImages)->firstWhere('cover', true); @endphp
            @if($coverImage)
                <div class="flex items-center gap-3 rounded-lg border border-amber-200 bg-amber-50 px-4 py-3">
                    <i class="fa-solid fa-star text-amber-500"></i>
                    <div class="flex-1">
                        <label class="text-xs font-medium text-amber-800">Legenda da Imagem de Capa</label>
                        <input
                            type="text"
                            wire:model.live.debounce.500ms="thumbCaption"
                            placeholder="Ex: Advocacia Montanari - Escritório"
                            class="mt-1 w-full rounded-lg border border-amber-300 bg-white px-3 py-2 text-sm text-gray-900 placeholder-gray-400 shadow-sm focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20"
                        >
                    </div>
                </div>
            @endif
        </div>
    @endif

    {{-- ═══════════════════════════════════════════════════════
         Upload Area
         ═══════════════════════════════════════════════════════ --}}
    @if($showUpload)
        <div
            x-data="{
                previews: [],
                uploading: false,
                handleFiles(event) {
                    const files = Array.from(event.target.files);
                    if (!files.length) return;

                    this.previews = [];
                    files.forEach(file => {
                        if (!file.type.startsWith('image/')) return;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.previews.push({
                                name: file.name,
                                size: (file.size / 1024).toFixed(1) + ' KB',
                                url: e.target.result
                            });
                        };
                        reader.readAsDataURL(file);
                    });
                },
                clearPreviews() {
                    this.previews = [];
                }
            }"
            class="space-y-3"
        >
            {{-- Hidden file input bound to Livewire --}}
            <input
                type="file"
                wire:model="{{ $wireModel }}"
                multiple
                accept="image/jpeg,image/png,image/gif,image/webp"
                id="{{ $wireModel }}-upload"
                class="hidden"
                @change="handleFiles($event)"
            >

            {{-- Drop Zone --}}
            <label
                for="{{ $wireModel }}-upload"
                class="flex flex-col items-center justify-center rounded-xl border-2 border-dashed border-gray-300 bg-gray-50 px-6 py-8 text-center transition hover:border-amber-400 hover:bg-amber-50 cursor-pointer"
            >
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-amber-100 text-amber-600 mb-3">
                    <i class="fa-solid fa-cloud-arrow-up text-xl"></i>
                </div>
                <p class="text-sm font-semibold text-gray-700">
                    <span class="text-amber-600">Clique para selecionar</span> ou arraste imagens
                </p>
                <p class="mt-1 text-xs text-gray-500">JPEG, PNG, GIF, WebP (máx. 5MB cada, até {{ $maxFiles }} imagens)</p>
            </label>

            {{-- Upload Progress Indicator --}}
            @if($wireModel === 'images' || $wireModel === 'newImages')
                <div wire:loading wire:target="{{ $wireModel }}" class="flex items-center gap-2 rounded-lg border border-blue-200 bg-blue-50 px-4 py-3">
                    <i class="fa-solid fa-spinner fa-spin text-blue-500"></i>
                    <p class="text-sm text-blue-700">Processando imagens...</p>
                </div>
            @endif

            {{-- Validation Error --}}
            @error($wireModel)
                <div class="flex items-center gap-2 rounded-lg border border-red-200 bg-red-50 px-4 py-3">
                    <i class="fa-solid fa-circle-exclamation text-red-500"></i>
                    <p class="text-sm text-red-700">{{ $message }}</p>
                </div>
            @enderror
            @error("{$wireModel}.*")
                <div class="flex items-center gap-2 rounded-lg border border-red-200 bg-red-50 px-4 py-3">
                    <i class="fa-solid fa-circle-exclamation text-red-500"></i>
                    <p class="text-sm text-red-700">{{ $message }}</p>
                </div>
            @enderror

            {{-- Client-side Previews (immediate) --}}
            <div x-show="previews.length > 0" class="space-y-2">
                <div class="flex items-center justify-between">
                    <p class="text-xs font-medium text-gray-500">
                        <span x-text="previews.length"></span> imagem(ns) selecionada(s)
                    </p>
                    <button
                        type="button"
                        @click="clearPreviews(); $refs.uploadInput.value = ''"
                        class="text-xs text-red-500 hover:text-red-700 font-medium"
                    >
                        Limpar seleção
                    </button>
                </div>
                <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-4">
                    <template x-for="(preview, index) in previews" :key="index">
                        <div class="relative group rounded-xl overflow-hidden border border-gray-200 bg-white shadow-sm">
                            <div class="aspect-square">
                                <img :src="preview.url" :alt="preview.name" class="h-full w-full object-cover">
                            </div>
                            <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                <span class="rounded-lg bg-white/90 px-3 py-1.5 text-xs font-medium text-gray-700">
                                    <i class="fa-solid fa-check-circle mr-1 text-green-500"></i> Pronto
                                </span>
                            </div>
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-2">
                                <p class="text-xs text-white font-medium truncate" x-text="preview.name"></p>
                                <p class="text-xs text-white/70" x-text="preview.size"></p>
                            </div>
                            <span class="absolute top-2 right-2 rounded-full bg-blue-500 px-2 py-0.5 text-xs font-bold text-white shadow">
                                <span x-text="index + 1"></span>
                            </span>
                        </div>
                    </template>
                </div>
            </div>

            {{-- Livewire Temporary Upload Previews --}}
            @if(!empty($currentFiles))
                <div class="space-y-2">
                    <p class="text-xs font-medium text-gray-500">
                        {{ count($currentFiles) }} imagem(ns) pronta(s) para salvar
                    </p>
                    <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 lg:grid-cols-4">
                        @foreach($currentFiles as $index => $file)
                            <div class="relative group rounded-xl overflow-200 shadow-sm">
                                <div class="aspect-square">
                                    @if(is_object($file) && method_exists($file, 'temporaryUrl'))
                                        <img src="{{ $file->temporaryUrl() }}" alt="" class="h-full w-full object-cover">
                                    @elseif(is_string($file))
                                        <img src="{{ \App\Services\Asset::url($file) }}" alt="" class="h-full w-full object-cover">
                                    @endif
                                </div>
                                <div class="absolute inset-0 bg-green-500/20 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                                    <span class="rounded-lg bg-white/90 px-3 py-1.5 text-xs font-medium text-green-700">
                                        <i class="fa-solid fa-check mr-1"></i> Válido
                                    </span>
                                </div>
                                <span class="absolute top-2 right-2 rounded-full bg-green-500 px-2 py-0.5 text-xs font-bold text-white shadow">
                                    {{ $index + 1 }}
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    @endif

    {{-- ═══════════════════════════════════════════════════════
         Empty State
         ═══════════════════════════════════════════════════════ --}}
    @if(empty($existingImages) && empty($currentFiles) && !$showUpload)
        <div class="flex flex-col items-center justify-center rounded-xl border border-gray-200 bg-gray-50 px-6 py-12 text-center">
            <div class="flex h-14 w-14 items-center justify-center rounded-full bg-gray-100 mb-3">
                <i class="fa-solid fa-images text-2xl text-gray-400"></i>
            </div>
            <p class="text-sm text-gray-500">Nenhuma imagem adicionada.</p>
        </div>
    @endif
</div>

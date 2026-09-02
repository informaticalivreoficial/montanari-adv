<div>
    <!-- Header -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Documentos</h1>
            <p class="mt-1 text-sm text-gray-500">Gerencie os documentos do escritório.</p>
        </div>
        <button
            wire:click="$set('showUploadModal', true)"
            class="inline-flex items-center gap-2 rounded-lg bg-amber-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700"
        >
            <i class="fa-solid fa-upload text-xs"></i>
            Enviar Documento
        </button>
    </div>

    <!-- Filters -->
    <div class="mb-6 rounded-xl border border-gray-200 bg-white shadow-sm p-4">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-4">
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Buscar</label>
                <div class="relative">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <input
                        type="text"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Nome do documento..."
                        class="w-full rounded-lg border border-gray-300 bg-white pl-10 pr-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20"
                    >
                </div>
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Categoria</label>
                <select wire:model.live="filterCategory" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
                    <option value="">Todas</option>
                    <option value="contract">Contrato</option>
                    <option value="petition">Petição</option>
                    <option value="ruling">Decisão/Julgamento</option>
                    <option value="evidence">Prova</option>
                    <option value="correspondence">Correspondência</option>
                    <option value="other">Outro</option>
                </select>
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Processo</label>
                <div class="relative">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <input
                        type="text"
                        wire:model.live.debounce.300ms="filterProcess"
                        placeholder="Nº do processo..."
                        class="w-full rounded-lg border border-gray-300 bg-white pl-10 pr-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20"
                    >
                </div>
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Cliente</label>
                <select wire:model.live="filterClient" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
                    <option value="">Todos</option>
                    @foreach($clientsList as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <!-- Documents Grid -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @forelse($documents as $document)
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-5 hover:shadow-md transition">
                <div class="flex items-start gap-4">
                    {{-- File icon --}}
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                        <i class="fa-solid {{ $document->category_icon }} text-lg"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="text-sm font-semibold text-gray-900 truncate" title="{{ $document->title }}">
                            {{ $document->title }}
                        </h3>
                        <p class="text-xs text-gray-500 mt-0.5">
                            {{ $document->original_name }}
                        </p>
                    </div>
                </div>

                <div class="mt-4 space-y-2">
                    <div class="flex items-center justify-between text-xs">
                        <span class="inline-flex items-center rounded-full bg-gray-100 px-2 py-0.5 font-medium text-gray-600">
                            {{ $document->category_label }}
                        </span>
                        <span class="text-gray-500">
                            {{ $document->file_size_formatted }}
                        </span>
                    </div>

                    @if($document->process)
                        <p class="text-xs text-gray-500">
                            <i class="fa-solid fa-folder mr-1"></i>
                            {{ $document->process->process_number }}
                        </p>
                    @endif

                    <p class="text-xs text-gray-400">
                        Enviado por {{ $document->uploader?->name ?? '-' }} em {{ $document->created_at->format('d/m/Y') }}
                    </p>
                </div>

                <div class="mt-4 flex items-center gap-2 border-t border-gray-100 pt-3">
                    <a
                        href="{{ route('documents.view', $document) }}"
                        target="_blank"
                        class="flex-1 inline-flex items-center justify-center gap-1.5 rounded-lg border border-gray-300 bg-white px-3 py-2 text-xs font-medium text-gray-700 hover:bg-gray-50 transition"
                    >
                        <i class="fa-solid fa-eye"></i>
                        Ver
                    </a>
                    <a
                        href="{{ route('documents.download', $document) }}"
                        class="flex-1 inline-flex items-center justify-center gap-1.5 rounded-lg border border-gray-300 bg-white px-3 py-2 text-xs font-medium text-gray-700 hover:bg-gray-50 transition"
                    >
                        <i class="fa-solid fa-download"></i>
                        Baixar
                    </a>
                    <button
                        x-on:click="
                            MontanariAlert.confirm({
                                title: 'Excluir documento?',
                                text: 'Tem certeza que deseja excluir este documento? Esta ação não pode ser desfeita.',
                                confirmButtonText: 'Sim, excluir',
                                cancelButtonText: 'Cancelar'
                            }).then(r => {
                                if (r.isConfirmed) $wire.delete({{ $document->id }})
                            })
                        "
                        class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white p-2 text-gray-400 hover:bg-red-50 hover:text-red-600 transition"
                    >
                        <i class="fa-solid fa-trash text-xs"></i>
                    </button>
                </div>
            </div>
        @empty
            <div class="col-span-full rounded-xl border border-gray-200 bg-white shadow-sm px-6 py-12 text-center">
                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-gray-100 mx-auto mb-4">
                    <i class="fa-solid fa-file-circle-plus text-2xl text-gray-400"></i>
                </div>
                <p class="text-gray-500">Nenhum documento encontrado.</p>
                <button wire:click="$set('showUploadModal', true)" class="mt-4 inline-flex items-center gap-2 text-amber-600 hover:text-amber-700 font-medium text-sm">
                    <i class="fa-solid fa-upload"></i> Enviar primeiro documento
                </button>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $documents->links() }}
    </div>

    {{-- ═══════════════════════════════════════════════════════
         Hidden file input — SEMPRE no DOM (nunca dentro de @if)
         ═══════════════════════════════════════════════════════ --}}
    <input
        type="file"
        wire:model="uploadFile"
        accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
        id="doc-upload"
        class="hidden"
    >

    <!-- Upload Modal -->
    @if($showUploadModal)
        <div
            x-data
            x-on:keydown.escape.window="$wire.closeModal()"
            class="fixed inset-0 z-50 overflow-y-auto"
        >
            <div class="fixed inset-0 bg-gray-500/75 backdrop-blur-sm" wire:click="closeModal"></div>

            <div class="flex min-h-full items-center justify-center p-4">
                <div class="relative w-full max-w-lg transform overflow-hidden rounded-2xl bg-white shadow-2xl transition-all">
                    <div class="flex items-center justify-between border-b border-gray-100 px-6 py-4">
                        <h3 class="text-lg font-semibold text-gray-900">Enviar Documento</h3>
                        <button wire:click="closeModal" class="rounded-lg p-1.5 text-gray-400 hover:bg-gray-100 transition">
                            <i class="fa-solid fa-times"></i>
                        </button>
                    </div>

                    <form wire:submit.prevent="saveDocument" x-data="{
                        search: '',
                        processId: @js($uploadProcessId),
                        processLabel: @js($uploadProcessLabel),
                        results: [],
                        showDropdown: false,
                        loading: false,

                        async doSearch() {
                            if (this.search.length < 2) { this.results = []; this.showDropdown = false; return; }
                            this.loading = true; this.showDropdown = true;
                            try {
                                const res = await fetch('{{ route('dashboard.legal.processes.search') }}?q=' + encodeURIComponent(this.search), {
                                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
                                });
                                this.results = await res.json();
                            } catch (e) { this.results = []; }
                            this.loading = false;
                        },

                        selectProcess(id, label) {
                            this.processId = id;
                            this.processLabel = label;
                            this.search = '';
                            this.results = [];
                            this.showDropdown = false;
                            @this.set('uploadProcessId', id);
                            @this.set('uploadProcessLabel', label);
                        },

                        removeProcess() {
                            this.processId = '';
                            this.processLabel = '';
                            @this.set('uploadProcessId', '');
                            @this.set('uploadProcessLabel', '');
                        }
                    }" x-on:click.away="showDropdown = false" class="px-6 py-4 space-y-4">
                        {{-- Drop Zone (estilo x-image-gallery) --}}
                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Arquivo <span class="text-red-500">*</span></label>
                            <label
                                for="doc-upload"
                                class="flex flex-col items-center justify-center rounded-xl border-2 border-dashed border-gray-300 bg-gray-50 px-6 py-6 text-center transition hover:border-amber-400 hover:bg-amber-50 cursor-pointer"
                            >
                                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-amber-100 text-amber-600 mb-2">
                                    <i class="fa-solid fa-file-arrow-up text-lg"></i>
                                </div>
                                <p class="text-sm font-semibold text-gray-700">
                                    <span class="text-amber-600">Clique para selecionar</span>
                                </p>
                                <p class="mt-1 text-xs text-gray-500">PDF, Word, Imagem. Máximo 20MB.</p>
                            </label>
                            <div wire:loading wire:target="uploadFile" class="flex items-center gap-2 text-xs text-amber-600 mt-1">
                                <i class="fa-solid fa-spinner fa-spin"></i> Processando arquivo...
                            </div>
                            @if($uploadFile)
                                <div class="flex items-center gap-2 rounded-lg border border-green-200 bg-green-50 px-3 py-2">
                                    <i class="fa-solid fa-check-circle text-green-500"></i>
                                    <span class="text-sm text-green-700">{{ is_object($uploadFile) ? $uploadFile->getClientOriginalName() : 'Arquivo carregado' }}</span>
                                </div>
                            @endif
                            @error('uploadFile')
                                <p class="text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <x-input name="uploadTitle" label="Título" required placeholder="Nome do documento" wire:model.defer="uploadTitle" />

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Categoria</label>
                            <select wire:model.defer="uploadCategory" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
                                <option value="contract">Contrato</option>
                                <option value="petition">Petição</option>
                                <option value="ruling">Decisão/Julgamento</option>
                                <option value="evidence">Prova</option>
                                <option value="correspondence">Correspondência</option>
                                <option value="other">Outro</option>
                            </select>
                        </div>

                        {{-- Processo (Autocomplete) --}}
                        <div class="space-y-1" wire:ignore.self>
                            <label class="block text-sm font-medium text-gray-700">Processo</label>

                            {{-- Processo selecionado --}}
                            <div x-show="processId" class="flex items-center gap-2 rounded-lg border border-amber-200 bg-amber-50 px-3 py-2.5">
                                <i class="fa-solid fa-folder-open text-amber-600 text-sm"></i>
                                <span class="flex-1 text-sm font-medium text-amber-900" x-text="processLabel"></span>
                                <button type="button" x-on:click="removeProcess()" class="text-amber-600 hover:text-red-600 transition" title="Remover">
                                    <i class="fa-solid fa-xmark text-sm"></i>
                                </button>
                            </div>

                            {{-- Input de busca --}}
                            <div x-show="!processId" class="relative">
                                <input
                                    type="text"
                                    x-model="search"
                                    x-on:input.debounce.300ms="doSearch()"
                                    x-on:focus="if (results.length) showDropdown = true"
                                    placeholder="Buscar por número do processo ou nome do cliente..."
                                    class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 pr-10 text-sm text-gray-900 placeholder-gray-400 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20"
                                />
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <i class="fa-solid fa-magnifying-glass text-gray-400 text-sm"></i>
                                </div>

                                {{-- Loading --}}
                                <div x-show="loading" class="absolute inset-y-0 right-0 flex items-center pr-3">
                                    <i class="fa-solid fa-spinner fa-spin text-amber-500 text-sm"></i>
                                </div>

                                {{-- Dropdown --}}
                                <div
                                    x-show="showDropdown && results.length > 0"
                                    x-transition:enter="transition ease-out duration-150"
                                    x-transition:enter-start="opacity-0 translate-y-1"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-100"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    class="absolute z-50 mt-1 w-full rounded-lg border border-gray-200 bg-white shadow-lg overflow-hidden"
                                >
                                    <div class="max-h-64 overflow-y-auto divide-y divide-gray-100">
                                        <template x-for="item in results" :key="item.id">
                                            <button
                                                type="button"
                                                x-on:click="selectProcess(item.id, item.label)"
                                                class="w-full flex items-center gap-3 px-4 py-3 text-left hover:bg-amber-50 transition"
                                            >
                                                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-blue-600 shrink-0">
                                                    <i class="fa-solid fa-folder-open text-xs"></i>
                                                </div>
                                                <div class="min-w-0 flex-1">
                                                    <p class="text-sm font-medium text-gray-900 truncate" x-text="item.number"></p>
                                                    <p class="text-xs text-gray-500 truncate">
                                                        <span x-text="item.client"></span>
                                                        <template x-if="item.court">
                                                            <span> · <span x-text="item.court"></span></span>
                                                        </template>
                                                    </p>
                                                </div>
                                            </button>
                                        </template>
                                    </div>
                                </div>

                                {{-- Sem resultados --}}
                                <div
                                    x-show="showDropdown && results.length === 0 && !loading && search.length >= 2"
                                    class="absolute z-50 mt-1 w-full rounded-lg border border-gray-200 bg-white shadow-lg p-4 text-center"
                                >
                                    <p class="text-sm text-gray-500">Nenhum processo encontrado</p>
                                </div>
                            </div>
                        </div>

                        <x-textarea name="uploadDescription" label="Descrição" rows="2" placeholder="Descreva o documento..." wire:model.defer="uploadDescription" />

                        <div class="flex items-center justify-end gap-3 border-t border-gray-100 pt-4">
                            <button type="button" wire:click="closeModal" class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 transition">
                                Cancelar
                            </button>
                            <button
                                type="submit"
                                class="rounded-lg bg-amber-600 px-4 py-2 text-sm font-semibold text-white hover:bg-amber-700 transition disabled:opacity-50"
                                wire:loading.attr="disabled"
                                wire:target="saveDocument"
                            >
                                <span wire:loading.remove wire:target="saveDocument">
                                    <i class="fa-solid fa-upload mr-1"></i> Enviar
                                </span>
                                <span wire:loading wire:target="saveDocument">
                                    <i class="fa-solid fa-spinner fa-spin"></i> Enviando...
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>

<div>
    <!-- Header -->
    <div class="mb-6 flex items-center gap-4">
        <a
            href="{{ route('dashboard.legal.tasks') }}"
            class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white p-2 text-gray-600 shadow-sm transition hover:bg-gray-50"
        >
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Nova Tarefa</h1>
            <p class="mt-1 text-sm text-gray-500">Crie uma nova tarefa para o escritório.</p>
        </div>
    </div>

    <form wire:submit.prevent="store" x-data="{
        submitting: false,
        search: '',
        processId: @js($process_id),
        processLabel: @js($processLabel),
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
            @this.set('process_id', id);
            @this.set('processLabel', label);
        },

        removeProcess() {
            this.processId = '';
            this.processLabel = '';
            @this.set('process_id', '');
            @this.set('processLabel', '');
        }
    }" x-init="
        new MutationObserver(() => {
            if (!submitting) return;
            const el = document.querySelector('.text-red-500');
            if (el) { submitting = false; el.scrollIntoView({ behavior: 'smooth', block: 'center' }); }
        }).observe($el, { childList: true, subtree: true });
    " x-on:submit="submitting = true" x-on:click.away="showDropdown = false">
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <!-- Main Card -->
            <div class="lg:col-span-2">
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">

                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-list-check text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Dados da Tarefa</h3>
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div class="sm:col-span-2">
                                <x-input name="title" label="Título" placeholder="Ex: Preparar petição inicial" wire:model="title" />
                            </div>
                            <x-input name="due_date" label="Data de Vencimento" type="date" wire:model="due_date" />
                            <x-input name="due_time" label="Horário" type="time" wire:model="due_time" />
                        </div>
                    </div>

                    <div class="border-t border-gray-100"></div>

                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-align-left text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Descrição</h3>
                        </div>
                        <x-textarea name="description" label="Descrição" rows="3" placeholder="Detalhes da tarefa..." wire:model="description" />
                    </div>

                    <div class="border-t border-gray-100"></div>

                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-sticky-note text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Observações</h3>
                        </div>
                        <x-textarea name="notes" rows="3" placeholder="Anotações sobre esta tarefa..." wire:model="notes" />
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                {{-- Processo (Autocomplete) --}}
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm px-6 py-5" wire:ignore.self>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                            <i class="fa-solid fa-folder text-sm"></i>
                        </div>
                        <h3 class="text-sm font-semibold text-gray-900">Processo</h3>
                    </div>

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

                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-user-tie text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Responsável</h3>
                        </div>
                        <select wire:model="responsible_id" class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 focus:outline-none transition">
                            <option value="">Selecione</option>
                            @foreach($team as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-flag text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Prioridade</h3>
                        </div>
                        <div class="space-y-2">
                            @foreach(['low' => 'Baixa', 'normal' => 'Normal', 'high' => 'Alta', 'urgent' => 'Urgente'] as $value => $label)
                                <label class="flex items-center gap-3 rounded-lg border border-gray-200 p-3 cursor-pointer hover:bg-gray-50 {{ $priority === $value ? 'border-amber-500 bg-amber-50' : '' }}">
                                    <input type="radio" wire:model="priority" value="{{ $value }}" class="accent-amber-600">
                                    <span class="text-sm text-gray-700">{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>

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
                                Criar Tarefa
                            </span>
                            <span wire:loading wire:target="store">
                                <i class="fa-solid fa-spinner fa-spin text-xs"></i>
                                Salvando...
                            </span>
                        </button>
                        <a
                            href="{{ route('dashboard.legal.tasks') }}"
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

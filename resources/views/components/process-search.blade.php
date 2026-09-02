@props([
    'processId' => '',
    'processLabel' => '',
])

<div
    x-data="{
        search: '',
        processId: @js($processId),
        processLabel: @js($processLabel),
        results: [],
        showDropdown: false,

        async doSearch() {
            if (this.search.length < 2) {
                this.results = [];
                this.showDropdown = false;
                return;
            }
            this.loading = true;
            this.showDropdown = true;
            try {
                const res = await fetch('{{ route("dashboard.legal.processes.search") }}?q=' + encodeURIComponent(this.search), {
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                });
                this.results = await res.json();
            } catch (e) {
                this.results = [];
            }
            this.loading = false;
        },

        selectProcess(id, label) {
            this.processId = id;
            this.processLabel = label;
            this.search = '';
            this.results = [];
            this.showDropdown = false;
            this.$dispatch('process-selected', { id: id });
        },

        removeProcess() {
            this.processId = '';
            this.processLabel = '';
            this.$dispatch('process-selected', { id: '' });
        }
    }"
    x-on:click.away="showDropdown = false"
    class="space-y-1"
>
    <label class="block text-sm font-medium text-gray-700">Processo</label>

    {{-- Processo selecionado --}}
    <div x-show="processId" class="flex items-center gap-2 rounded-lg border border-amber-200 bg-amber-50 px-3 py-2.5">
        <i class="fa-solid fa-folder-open text-amber-600 text-sm"></i>
        <span class="flex-1 text-sm font-medium text-amber-900" x-text="processLabel"></span>
        <button
            type="button"
            x-on:click="removeProcess()"
            class="text-amber-600 hover:text-red-600 transition"
            title="Remover"
        >
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
            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 pr-10 text-sm text-gray-900 placeholder-gray-400 shadow-sm transition
                   focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20"
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
                                    <span> · <span x-text="item.court"></span></template>
                                </span>
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
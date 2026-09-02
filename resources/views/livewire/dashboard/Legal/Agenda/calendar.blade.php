<div>
    <!-- Header -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Agenda</h1>
            <p class="mt-1 text-sm text-gray-500">Calendário de audiências, reuniões e eventos.</p>
        </div>
        <button
            wire:click="$set('showModal', true); $set('editingId', null);"
            class="inline-flex items-center gap-2 rounded-lg bg-amber-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700"
        >
            <i class="fa-solid fa-plus text-xs"></i>
            Novo Evento
        </button>
    </div>

    <!-- Calendar -->
    <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-6">
        <div
            id="fullcalendar"
            wire:ignore
            x-data
            x-init="
                $nextTick(() => {
                    const container = document.getElementById('fullcalendar');
                    const eventsEl = document.getElementById('calendar-events');
                    if (container && eventsEl) {
                        const events = JSON.parse(eventsEl.textContent || '[]');
                        initFullCalendar(container, { events });
                    }
                });

                Livewire.on('refreshCalendar', () => {
                    const container = document.getElementById('fullcalendar');
                    const eventsEl = document.getElementById('calendar-events');
                    if (container && eventsEl) {
                        const events = JSON.parse(eventsEl.textContent || '[]');
                        updateFullCalendarEvents(container, events);
                    }
                });
            "
            style="min-height: 600px;"
        ></div>

        {{-- Eventos em JSON isolado (evita quebrar o atributo x-init com aspas do @json) --}}
        <script type="application/json" id="calendar-events">@json($events)</script>
    </div>

    <!-- Event Type Legend -->
    <div class="mt-4 flex flex-wrap gap-4 text-xs text-gray-600">
        <div class="flex items-center gap-2">
            <span class="h-3 w-3 rounded-full" style="background-color: #dc2626;"></span> Audiência
        </div>
        <div class="flex items-center gap-2">
            <span class="h-3 w-3 rounded-full" style="background-color: #2563eb;"></span> Reunião
        </div>
        <div class="flex items-center gap-2">
            <span class="h-3 w-3 rounded-full" style="background-color: #f59e0b;"></span> Prazo
        </div>
        <div class="flex items-center gap-2">
            <span class="h-3 w-3 rounded-full" style="background-color: #10b981;"></span> Tarefa
        </div>
        <div class="flex items-center gap-2">
            <span class="h-3 w-3 rounded-full" style="background-color: #6b7280;"></span> Outro
        </div>
    </div>

    <!-- Event Actions Popup -->
    @if($showEventActions)
        <div
            x-data="{ popupX: {{ $actionsPopupX }}, popupY: {{ $actionsPopupY }} }"
            x-init="$nextTick(() => { if (popupX + 200 > window.innerWidth) popupX = window.innerWidth - 210; })"
            x-on:click.away="$wire.closeEventActions()"
            x-on:keydown.escape.window="$wire.closeEventActions()"
            class="fixed z-50"
            :style="`top: ${popupY}px; left: ${popupX}px;`"
        >
            <div class="rounded-xl border border-gray-200 bg-white shadow-xl py-1 min-w-[180px]">
                <div class="px-4 py-2 border-b border-gray-100">
                    <p class="text-xs font-semibold text-gray-900 truncate">{{ $actionsEventTitle }}</p>
                </div>
                <button
                    x-on:click="$wire.editFromActions()"
                    class="w-full flex items-center gap-2 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition"
                >
                    <i class="fa-solid fa-pen-to-square text-xs text-amber-500"></i> Editar
                </button>
                @unless(auth()->user()->hasRole('employee'))
                <button
                    x-on:click="
                        MontanariAlert.confirm({
                            title: 'Excluir evento?',
                            text: 'Tem certeza que deseja excluir este evento?',
                            confirmButtonText: 'Sim, excluir',
                            cancelButtonText: 'Cancelar'
                        }).then(r => {
                            if (r.isConfirmed) $wire.deleteFromActions()
                        })
                    "
                    class="w-full flex items-center gap-2 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition"
                >
                    <i class="fa-solid fa-trash text-xs"></i> Excluir
                </button>
                @endunless
            </div>
        </div>
    @endif

    <!-- Create/Edit Modal -->
    @if($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto" x-data>
            <!-- Backdrop -->
            <div class="fixed inset-0 bg-gray-500/75 backdrop-blur-sm" wire:click="closeModal"></div>

            <div class="flex min-h-full items-center justify-center p-4">
                <div class="relative w-full max-w-lg transform overflow-hidden rounded-2xl bg-white shadow-2xl transition-all">
                    <!-- Header -->
                    <div class="flex items-center justify-between border-b border-gray-100 px-6 py-4">
                        <h3 class="text-lg font-semibold text-gray-900">
                            {{ $editingId ? 'Editar Evento' : 'Novo Evento' }}
                        </h3>
                        <button wire:click="closeModal" class="rounded-lg p-1.5 text-gray-400 hover:bg-gray-100 transition">
                            <i class="fa-solid fa-times"></i>
                        </button>
                    </div>

                    <!-- Body -->
                    <form wire:submit.prevent="save" x-data="{
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
                    }" x-on:click.away="showDropdown = false" class="px-6 py-4 space-y-4 max-h-[70vh] overflow-y-auto">
                        <x-input name="title" label="Título" required placeholder="Ex: Audiência - Processo X" wire:model="title" />

                        <div class="flex items-center gap-2">
                            <input type="checkbox" wire:model="all_day" id="all_day" class="accent-amber-600">
                            <label for="all_day" class="text-sm text-gray-700">Dia inteiro</label>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <x-input name="start_date" label="Início" type="date" required wire:model="start_date" />
                            @if(!$all_day)
                                <x-input name="start_time" label="Hora Início" type="time" wire:model="start_time" />
                            @endif
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <x-input name="end_date" label="Fim" type="date" wire:model="end_date" />
                            @if(!$all_day)
                                <x-input name="end_time" label="Hora Fim" type="time" wire:model="end_time" />
                            @endif
                        </div>

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Tipo de Evento <span class="text-red-500">*</span></label>
                            <select wire:model="event_type" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
                                <option value="hearing">Audiência</option>
                                <option value="meeting">Reunião</option>
                                <option value="deadline">Prazo</option>
                                <option value="task">Tarefa</option>
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

                        <x-input name="location" label="Local" placeholder="Ex: Fórum Central - Sala 12" wire:model="location" />

                        <x-textarea name="description" label="Descrição" rows="2" placeholder="Detalhes do evento..." wire:model="description" />

                        <!-- Actions -->
                        <div class="flex items-center justify-between border-t border-gray-100 pt-4">
                            @if($editingId)
                                @unless(auth()->user()->hasRole('employee'))
                                <button
                                    type="button"
                                    x-on:click="
                                        MontanariAlert.confirm({
                                            title: 'Excluir evento?',
                                            text: 'Tem certeza que deseja excluir este evento? Esta ação não pode ser desfeita.',
                                            confirmButtonText: 'Sim, excluir',
                                            cancelButtonText: 'Cancelar'
                                        }).then(r => {
                                            if (r.isConfirmed) $wire.deleteEvent()
                                        })
                                    "
                                    class="text-sm text-red-600 hover:text-red-700 font-medium"
                                >
                                    <i class="fa-solid fa-trash mr-1"></i> Excluir
                                </button>
                                @endunless
                            @else
                                <div></div>
                            @endif
                            <div class="flex items-center gap-3">
                                <button type="button" wire:click="closeModal" class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 transition">
                                    Cancelar
                                </button>
                                <button
                                    type="submit"
                                    class="rounded-lg bg-amber-600 px-4 py-2 text-sm font-semibold text-white hover:bg-amber-700 transition disabled:opacity-50"
                                    wire:loading.attr="disabled"
                                    wire:target="save"
                                >
                                    <span wire:loading.remove wire:target="save">{{ $editingId ? 'Salvar' : 'Criar' }}</span>
                                    <span wire:loading wire:target="save"><i class="fa-solid fa-spinner fa-spin"></i></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>

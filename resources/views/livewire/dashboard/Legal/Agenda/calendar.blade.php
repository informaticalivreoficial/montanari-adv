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
                    if (container) {
                        initFullCalendar(container, {
                            events: @json($events)
                        });
                    }
                });

                Livewire.on('loadEvents', (events) => {
                    const container = document.getElementById('fullcalendar');
                    if (container && container._fullCalendarInstance) {
                        updateFullCalendarEvents(container, events[0]);
                    }
                });
            "
            style="min-height: 600px;"
        ></div>
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
                    <form wire:submit.prevent="save" class="px-6 py-4 space-y-4 max-h-[70vh] overflow-y-auto">
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

                        <div class="space-y-1">
                            <label class="block text-sm font-medium text-gray-700">Processo</label>
                            <select wire:model="process_id" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
                                <option value="">Nenhum</option>
                                @foreach($processes as $id => $number)
                                    <option value="{{ $id }}">{{ $number }}</option>
                                @endforeach
                            </select>
                        </div>

                        <x-input name="location" label="Local" placeholder="Ex: Fórum Central - Sala 12" wire:model="location" />

                        <x-textarea name="description" label="Descrição" rows="2" placeholder="Detalhes do evento..." wire:model="description" />

                        <!-- Actions -->
                        <div class="flex items-center justify-between border-t border-gray-100 pt-4">
                            @if($editingId)
                                <button type="button" wire:click="deleteEvent" onclick="return confirm('Excluir este evento?')" class="text-sm text-red-600 hover:text-red-700 font-medium">
                                    <i class="fa-solid fa-trash mr-1"></i> Excluir
                                </button>
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

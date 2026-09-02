<div>
    <!-- Header -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Prazos</h1>
            <p class="mt-1 text-sm text-gray-500">Acompanhe todos os prazos processuais.</p>
        </div>
        @unless(auth()->user()->hasRole('employee'))
        <a
            href="{{ route('dashboard.legal.deadlines.create') }}"
            class="inline-flex items-center gap-2 rounded-lg bg-amber-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700"
        >
            <i class="fa-solid fa-plus text-xs"></i>
            Novo Prazo
        </a>
        @endunless
    </div>

    <!-- Filters -->
    <div class="mb-6 rounded-xl border border-gray-200 bg-white shadow-sm p-4">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Buscar</label>
                <div class="relative">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <input
                        type="text"
                        wire:model.live.debounce.300ms="search"
                        placeholder="Título do prazo..."
                        class="w-full rounded-lg border border-gray-300 bg-white pl-10 pr-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20"
                    >
                </div>
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <select wire:model.live="filterStatus" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
                    <option value="">Todos</option>
                    <option value="pending">Pendente</option>
                    <option value="completed">Concluído</option>
                    <option value="expired">Expirado</option>
                </select>
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Prioridade</label>
                <select wire:model.live="filterPriority" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
                    <option value="">Todas</option>
                    <option value="low">Baixa</option>
                    <option value="normal">Normal</option>
                    <option value="high">Alta</option>
                    <option value="urgent">Urgente</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Deadlines List -->
    <div class="space-y-3">
        @forelse($deadlines as $deadline)
            <div class="rounded-xl border {{ $deadline->is_overdue ? 'border-red-300 bg-red-50' : 'border-gray-200 bg-white' }} shadow-sm p-4">
                <div class="flex items-start justify-between gap-4">
                    <div class="flex items-start gap-4 flex-1">
                        {{-- Priority indicator --}}
                        <div class="mt-1">
                            @if($deadline->priority === 'urgent')
                                <span class="flex h-3 w-3 rounded-full bg-red-500 animate-pulse"></span>
                            @elseif($deadline->priority === 'high')
                                <span class="flex h-3 w-3 rounded-full bg-orange-500"></span>
                            @elseif($deadline->priority === 'normal')
                                <span class="flex h-3 w-3 rounded-full bg-blue-500"></span>
                            @else
                                <span class="flex h-3 w-3 rounded-full bg-gray-400"></span>
                            @endif
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-1">
                                <h3 class="text-sm font-semibold text-gray-900 {{ $deadline->status === 'completed' ? 'line-through text-gray-400' : '' }}">
                                    {{ $deadline->title }}
                                </h3>
                                @if($deadline->is_overdue)
                                    <span class="inline-flex items-center rounded-full bg-red-100 px-2 py-0.5 text-xs font-medium text-red-700">
                                        Atrasado
                                    </span>
                                @endif
                                <span class="inline-flex items-center rounded-full bg-{{ $deadline->priority_color }}-100 px-2 py-0.5 text-xs font-medium text-{{ $deadline->priority_color }}-700">
                                    {{ $deadline->priority_label }}
                                </span>
                            </div>
                            @if($deadline->description)
                                <p class="text-xs text-gray-500 mb-1">{{ $deadline->description }}</p>
                            @endif
                            <div class="flex items-center gap-4 text-xs text-gray-500">
                                <span>
                                    <i class="fa-solid fa-calendar mr-1"></i>
                                    {{ $deadline->due_date->format('d/m/Y H:i') }}
                                </span>
                                @if($deadline->process)
                                    <span>
                                        <i class="fa-solid fa-folder mr-1"></i>
                                        {{ $deadline->process->process_number }}
                                    </span>
                                @endif
                                @if($deadline->responsible)
                                    <span>
                                        <i class="fa-solid fa-user mr-1"></i>
                                        {{ $deadline->responsible->name }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        @if($deadline->status === 'pending')
                            <button
                                wire:click="complete({{ $deadline->id }})"
                                class="rounded-lg p-2 text-gray-400 hover:bg-green-50 hover:text-green-600 transition"
                                title="Marcar como concluído"
                            >
                                <i class="fa-solid fa-check text-sm"></i>
                            </button>
                        @endif
                        @unless(auth()->user()->hasRole('employee'))
                        <button
                            x-on:click="
                                MontanariAlert.confirm({
                                    title: 'Excluir prazo?',
                                    text: 'Tem certeza que deseja excluir este prazo? Esta ação não pode ser desfeita.',
                                    confirmButtonText: 'Sim, excluir',
                                    cancelButtonText: 'Cancelar'
                                }).then(r => {
                                    if (r.isConfirmed) $wire.delete({{ $deadline->id }})
                                })
                            "
                            class="rounded-lg p-2 text-gray-400 hover:bg-red-50 hover:text-red-600 transition"
                            title="Excluir"
                        >
                            <i class="fa-solid fa-trash text-sm"></i>
                        </button>
                        @endunless
                    </div>
                </div>
            </div>
        @empty
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm px-6 py-12 text-center">
                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-gray-100 mx-auto mb-4">
                    <i class="fa-solid fa-clock text-2xl text-gray-400"></i>
                </div>
                <p class="text-gray-500">Nenhum prazo encontrado.</p>
                @unless(auth()->user()->hasRole('employee'))
                <a href="{{ route('dashboard.legal.deadlines.create') }}" class="mt-4 inline-flex items-center gap-2 text-amber-600 hover:text-amber-700 font-medium text-sm">
                    <i class="fa-solid fa-plus"></i> Criar primeiro prazo
                </a>
                @endunless
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $deadlines->links() }}
    </div>
</div>

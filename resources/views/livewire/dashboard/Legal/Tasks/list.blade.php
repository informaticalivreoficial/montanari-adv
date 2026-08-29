<div>
    <!-- Header -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Tarefas</h1>
            <p class="mt-1 text-sm text-gray-500">Gerencie as tarefas do escritório.</p>
        </div>
        <a
            href="{{ route('dashboard.legal.tasks.create') }}"
            class="inline-flex items-center gap-2 rounded-lg bg-amber-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700"
        >
            <i class="fa-solid fa-plus text-xs"></i>
            Nova Tarefa
        </a>
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
                        placeholder="Título da tarefa..."
                        class="w-full rounded-lg border border-gray-300 bg-white pl-10 pr-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20"
                    >
                </div>
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <select wire:model.live="filterStatus" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
                    <option value="">Todos</option>
                    <option value="pending">Pendente</option>
                    <option value="in_progress">Em Andamento</option>
                    <option value="completed">Concluído</option>
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

    <!-- Tasks List -->
    <div class="space-y-3">
        @forelse($tasks as $task)
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-4">
                <div class="flex items-start justify-between gap-4">
                    <div class="flex items-start gap-4 flex-1">
                        {{-- Checkbox --}}
                        <button
                            wire:click="toggleStatus({{ $task->id }})"
                            class="mt-1 flex h-5 w-5 items-center justify-center rounded border-2 {{ $task->status === 'completed' ? 'border-green-500 bg-green-500' : 'border-gray-300 hover:border-amber-500' }} transition"
                        >
                            @if($task->status === 'completed')
                                <i class="fa-solid fa-check text-xs text-white"></i>
                            @endif
                        </button>

                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-1">
                                <h3 class="text-sm font-semibold text-gray-900 {{ $task->status === 'completed' ? 'line-through text-gray-400' : '' }}">
                                    {{ $task->title }}
                                </h3>
                                @if($task->status === 'in_progress')
                                    <span class="inline-flex items-center rounded-full bg-blue-100 px-2 py-0.5 text-xs font-medium text-blue-700">
                                        Em Andamento
                                    </span>
                                @endif
                                <span class="inline-flex items-center rounded-full bg-{{ $task->priority_color }}-100 px-2 py-0.5 text-xs font-medium text-{{ $task->priority_color }}-700">
                                    {{ $task->priority_label }}
                                </span>
                            </div>
                            @if($task->description)
                                <p class="text-xs text-gray-500 mb-1">{{ $task->description }}</p>
                            @endif
                            <div class="flex items-center gap-4 text-xs text-gray-500">
                                @if($task->due_date)
                                    <span class="{{ $task->due_date < now() && $task->status !== 'completed' ? 'text-red-600 font-medium' : '' }}">
                                        <i class="fa-solid fa-calendar mr-1"></i>
                                        {{ $task->due_date->format('d/m/Y H:i') }}
                                    </span>
                                @endif
                                @if($task->process)
                                    <span>
                                        <i class="fa-solid fa-folder mr-1"></i>
                                        {{ $task->process->process_number }}
                                    </span>
                                @endif
                                @if($task->responsible)
                                    <span>
                                        <i class="fa-solid fa-user mr-1"></i>
                                        {{ $task->responsible->name }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        @if($task->status === 'pending')
                            <button
                                wire:click="startProgress({{ $task->id }})"
                                class="rounded-lg p-2 text-gray-400 hover:bg-blue-50 hover:text-blue-600 transition"
                                title="Iniciar"
                            >
                                <i class="fa-solid fa-play text-sm"></i>
                            </button>
                        @endif
                        @if($task->status !== 'completed')
                            <button
                                wire:click="toggleStatus({{ $task->id }})"
                                class="rounded-lg p-2 text-gray-400 hover:bg-green-50 hover:text-green-600 transition"
                                title="Concluir"
                            >
                                <i class="fa-solid fa-check text-sm"></i>
                            </button>
                        @endif
                        <button
                            x-on:click="
                                MontanariAlert.confirm({
                                    title: 'Excluir tarefa?',
                                    text: 'Tem certeza que deseja excluir esta tarefa? Esta ação não pode ser desfeita.',
                                    confirmButtonText: 'Sim, excluir',
                                    cancelButtonText: 'Cancelar'
                                }).then(r => {
                                    if (r.isConfirmed) $wire.delete({{ $task->id }})
                                })
                            "
                            class="rounded-lg p-2 text-gray-400 hover:bg-red-50 hover:text-red-600 transition"
                            title="Excluir"
                        >
                            <i class="fa-solid fa-trash text-sm"></i>
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm px-6 py-12 text-center">
                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-gray-100 mx-auto mb-4">
                    <i class="fa-solid fa-list-check text-2xl text-gray-400"></i>
                </div>
                <p class="text-gray-500">Nenhuma tarefa encontrada.</p>
                <a href="{{ route('dashboard.legal.tasks.create') }}" class="mt-4 inline-flex items-center gap-2 text-amber-600 hover:text-amber-700 font-medium text-sm">
                    <i class="fa-solid fa-plus"></i> Criar primeira tarefa
                </a>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $tasks->links() }}
    </div>
</div>

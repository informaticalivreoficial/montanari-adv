<div>
    <!-- Header -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Processos</h1>
            <p class="mt-1 text-sm text-gray-500">Gerencie todos os processos jurídicos.</p>
        </div>
        <a
            href="{{ route('dashboard.legal.processes.create') }}"
            class="inline-flex items-center gap-2 rounded-lg bg-amber-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700"
        >
            <i class="fa-solid fa-plus text-xs"></i>
            Novo Processo
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
                        placeholder="Número, tribunal, parte..."
                        class="w-full rounded-lg border border-gray-300 bg-white pl-10 pr-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20"
                    >
                </div>
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <select wire:model.live="filterStatus" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
                    <option value="">Todos</option>
                    <option value="active">Ativo</option>
                    <option value="suspended">Suspenso</option>
                    <option value="archived">Arquivado</option>
                    <option value="closed">Encerrado</option>
                </select>
            </div>
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Tipo</label>
                <select wire:model.live="filterType" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
                    <option value="">Todos</option>
                    <option value="civil">Cível</option>
                    <option value="criminal">Criminal</option>
                    <option value="family">Família</option>
                    <option value="labor">Trabalhista</option>
                    <option value="administrative">Administrativo</option>
                    <option value="tax">Tributário</option>
                    <option value="consumer">Consumidor</option>
                    <option value="other">Outro</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Processes Table -->
    <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
        @if($processes->isEmpty())
            <div class="px-6 py-12 text-center">
                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-gray-100 mx-auto mb-4">
                    <i class="fa-solid fa-folder-open text-2xl text-gray-400"></i>
                </div>
                <p class="text-gray-500">Nenhum processo encontrado.</p>
                <a href="{{ route('dashboard.legal.processes.create') }}" class="mt-4 inline-flex items-center gap-2 text-amber-600 hover:text-amber-700 font-medium text-sm">
                    <i class="fa-solid fa-plus"></i> Criar primeiro processo
                </a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Processo</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Cliente</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Tipo</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Tribunal</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Responsável</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($processes as $process)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">{{ $process->process_number }}</p>
                                        @if($process->opposing_party)
                                            <p class="text-xs text-gray-500">vs. {{ $process->opposing_party }}</p>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $process->client?->name ?? '-' }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center rounded-full bg-blue-50 px-2.5 py-0.5 text-xs font-medium text-blue-700">
                                        {{ $process->case_type_label }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $process->court_name ?? '-' }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700">
                                    {{ $process->responsible?->name ?? '-' }}
                                </td>
                                <td class="px-6 py-4">
                                    @php $statusColor = $process->status_color; @endphp
                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-{{ $statusColor }}-100 px-2.5 py-0.5 text-xs font-medium text-{{ $statusColor }}-800">
                                        <span class="h-1.5 w-1.5 rounded-full bg-{{ $statusColor }}-500"></span>
                                        {{ $process->status_label }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('dashboard.legal.processes.edit', $process->id) }}" class="rounded-lg p-2 text-gray-400 hover:bg-gray-100 hover:text-amber-600 transition">
                                            <i class="fa-solid fa-pen-to-square text-sm"></i>
                                        </a>
                                        @if($process->source_provider === 'datajud')
                                            <button
                                                wire:click="resync({{ $process->id }})"
                                                onclick="return confirm('Re-sincronizar este processo com o Datajud?')"
                                                class="rounded-lg p-2 text-gray-400 hover:bg-amber-50 hover:text-amber-600 transition"
                                                title="Re-sincronizar com o Datajud"
                                            >
                                                <i class="fa-solid fa-rotate text-sm"></i>
                                            </button>
                                        @endif
                                        <button
                                            x-on:click="
                                                MontanariAlert.confirm({
                                                    title: 'Excluir processo?',
                                                    text: 'Tem certeza que deseja excluir este processo? Esta ação não pode ser desfeita.',
                                                    confirmButtonText: 'Sim, excluir',
                                                    cancelButtonText: 'Cancelar'
                                                }).then(r => {
                                                    if (r.isConfirmed) $wire.delete({{ $process->id }})
                                                })
                                            "
                                            class="rounded-lg p-2 text-gray-400 hover:bg-red-50 hover:text-red-600 transition"
                                        >
                                            <i class="fa-solid fa-trash text-sm"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="border-t border-gray-100 px-6 py-4">
                {{ $processes->links() }}
            </div>
        @endif
    </div>
</div>

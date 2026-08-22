<div>
    {{-- Filters --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-6">
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="flex-1">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i class="fa-solid fa-search"></i>
                    </span>
                    <input type="text" wire:model="search" placeholder="Buscar por número, vara ou parte..."
                           class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none text-sm">
                </div>
            </div>
            <div>
                <select wire:model="statusFilter" 
                        class="px-4 py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none bg-white">
                    <option value="">Todos os status</option>
                    <option value="active">Em Andamento</option>
                    <option value="suspended">Suspenso</option>
                    <option value="archived">Arquivado</option>
                    <option value="closed">Encerrado</option>
                </select>
            </div>
        </div>
    </div>

    {{-- Processes List --}}
    <div class="space-y-3">
        @forelse($processes as $process)
            <a href="{{ route('client.process.show', $process->id) }}" 
               class="block bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md hover:border-blue-200 transition">
                <div class="flex items-start justify-between">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <h3 class="font-bold text-gray-800 text-lg">{{ $process->process_number }}</h3>
                            @php
                                $statusConfig = [
                                    'active' => ['bg-green-100 text-green-700', 'Em Andamento'],
                                    'suspended' => ['bg-yellow-100 text-yellow-700', 'Suspenso'],
                                    'archived' => ['bg-gray-100 text-gray-600', 'Arquivado'],
                                    'closed' => ['bg-red-100 text-red-700', 'Encerrado'],
                                ];
                                $config = $statusConfig[$process->status] ?? ['bg-gray-100 text-gray-600', $process->status];
                            @endphp
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-medium {{ $config[0] }}">
                                {{ $config[1] }}
                            </span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-sm">
                            <div>
                                <p class="text-gray-400 text-xs uppercase tracking-wider">Vara</p>
                                <p class="text-gray-700">{{ $process->court_name ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="text-gray-400 text-xs uppercase tracking-wider">Tipo</p>
                                <p class="text-gray-700">{{ $process->case_type_label }}</p>
                            </div>
                            <div>
                                <p class="text-gray-400 text-xs uppercase tracking-wider">Advogado Responsável</p>
                                <p class="text-gray-700">{{ $process->responsible->name ?? '-' }}</p>
                            </div>
                        </div>

                        @if($process->opposing_party)
                            <p class="text-sm text-gray-500 mt-2">
                                <i class="fa-solid fa-user-minus mr-1"></i> Parte contrária: {{ $process->opposing_party }}
                            </p>
                        @endif
                    </div>

                    <div class="ml-4 flex flex-col items-end gap-2">
                        <div class="flex items-center gap-2 text-xs text-gray-400">
                            <span class="flex items-center gap-1">
                                <i class="fa-solid fa-file-lines"></i> {{ $process->documents->count() }}
                            </span>
                            <span class="flex items-center gap-1">
                                <i class="fa-solid fa-clock"></i> {{ $process->deadlines->where('status', 'pending')->count() }} prazos
                            </span>
                        </div>
                        <i class="fa-solid fa-chevron-right text-gray-300 mt-2"></i>
                    </div>
                </div>
            </a>
        @empty
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-12 text-center">
                <i class="fa-solid fa-folder-open text-5xl text-gray-200 mb-4"></i>
                <p class="text-gray-500 text-lg">Nenhum processo encontrado</p>
                <p class="text-gray-400 text-sm mt-1">Quando seu caso for aberto, ele aparecerá aqui.</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    @if($processes->hasPages())
        <div class="mt-6">
            {{ $processes->links() }}
        </div>
    @endif
</div>

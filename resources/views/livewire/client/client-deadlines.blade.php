<div>
    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Prazos</h1>
        <p class="text-gray-500 mt-1">Acompanhe os prazos dos seus processos.</p>
    </div>

    {{-- Filters --}}
    <div class="flex gap-2 mb-6">
        <button wire:click="setFilter('upcoming')" 
                class="px-4 py-2 rounded-lg text-sm font-medium transition {{ $filter === 'upcoming' ? 'bg-blue-600 text-white' : 'bg-white text-gray-600 border border-gray-200 hover:bg-gray-50' }}">
            <i class="fa-solid fa-clock mr-1"></i> Próximos
        </button>
        <button wire:click="setFilter('overdue')" 
                class="px-4 py-2 rounded-lg text-sm font-medium transition {{ $filter === 'overdue' ? 'bg-red-600 text-white' : 'bg-white text-gray-600 border border-gray-200 hover:bg-gray-50' }}">
            <i class="fa-solid fa-exclamation-triangle mr-1"></i> Vencidos
        </button>
        <button wire:click="setFilter('completed')" 
                class="px-4 py-2 rounded-lg text-sm font-medium transition {{ $filter === 'completed' ? 'bg-green-600 text-white' : 'bg-white text-gray-600 border border-gray-200 hover:bg-gray-50' }}">
            <i class="fa-solid fa-check-circle mr-1"></i> Concluídos
        </button>
    </div>

    {{-- Deadlines List --}}
    @if(count($deadlines) > 0)
        <div class="space-y-3">
            @foreach($deadlines as $deadline)
                @php
                    $isOverdue = \Carbon\Carbon::parse($deadline['due_date'])->isPast() && $deadline['status'] === 'pending';
                    $daysUntil = now()->diffInDays(\Carbon\Carbon::parse($deadline['due_date']), false);
                    $priorityConfig = [
                        'urgent' => ['bg-red-50 border-red-200', 'red', 'Urgente'],
                        'high' => ['bg-orange-50 border-orange-200', 'orange', 'Alta'],
                        'normal' => ['bg-blue-50 border-blue-200', 'blue', 'Normal'],
                        'low' => ['bg-gray-50 border-gray-200', 'gray', 'Baixa'],
                    ];
                    $config = $priorityConfig[$deadline['priority']] ?? $priorityConfig['normal'];
                @endphp
                <div class="bg-white rounded-xl shadow-sm border {{ $config[0] }} p-5">
                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-1">
                                <h3 class="font-semibold text-gray-800">{{ $deadline['title'] }}</h3>
                                @if($deadline['status'] === 'completed')
                                    <span class="px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">Concluído</span>
                                @elseif($isOverdue)
                                    <span class="px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-700">Vencido</span>
                                @endif
                            </div>
                            @if($deadline['description'])
                                <p class="text-sm text-gray-500 mt-1">{{ $deadline['description'] }}</p>
                            @endif
                            <div class="flex items-center gap-4 mt-2 text-sm">
                                <span class="flex items-center gap-1 {{ $isOverdue ? 'text-red-600 font-semibold' : 'text-gray-500' }}">
                                    <i class="fa-solid fa-calendar"></i>
                                    {{ \Carbon\Carbon::parse($deadline['due_date'])->format('d/m/Y') }}
                                </span>
                                @if($deadline['process'] ?? false)
                                    <a href="{{ route('client.process.show', $deadline['process_id']) }}" 
                                       class="flex items-center gap-1 text-blue-500 hover:underline">
                                        <i class="fa-solid fa-scale-balanced"></i>
                                        {{ $deadline['process']['process_number'] ?? '' }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        @if($deadline['status'] !== 'completed' && !$isOverdue)
                            <div class="text-right ml-4">
                                <p class="text-xs text-gray-400">Faltam</p>
                                <p class="text-lg font-bold text-{{ $config[1] }}-600">
                                    {{ abs(round($daysUntil)) }}
                                </p>
                                <p class="text-xs text-gray-400">{{ abs(round($daysUntil)) === 1 ? 'dia' : 'dias' }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-12 text-center">
            <i class="fa-solid fa-calendar-check text-5xl text-gray-200 mb-4"></i>
            <p class="text-gray-500 text-lg">
                @if($filter === 'upcoming')
                    Nenhum prazo próximo.
                @elseif($filter === 'overdue')
                    Nenhum prazo vencido. 🎉
                @else
                    Nenhum prazo concluído ainda.
                @endif
            </p>
        </div>
    @endif
</div>

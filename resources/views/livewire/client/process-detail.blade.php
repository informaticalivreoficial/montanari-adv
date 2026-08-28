<div>
    {{-- Header --}}
    <div class="mb-6">
        <a href="{{ route('client.processes') }}" class="text-sm text-blue-600 hover:underline mb-2 inline-block">
            <i class="fa-solid fa-arrow-left mr-1"></i> Voltar
        </a>
        <div class="flex items-start justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">{{ $process->process_number }}</h1>
                <p class="text-gray-500 mt-1">{{ $process->court_name }} - {{ $process->case_type_label }}</p>
            </div>
            @php
                $statusConfig = [
                    'active' => ['bg-green-100 text-green-700 border-green-200', 'Em Andamento'],
                    'suspended' => ['bg-yellow-100 text-yellow-700 border-yellow-200', 'Suspenso'],
                    'archived' => ['bg-gray-100 text-gray-600 border-gray-200', 'Arquivado'],
                    'closed' => ['bg-red-100 text-red-700 border-red-200', 'Encerrado'],
                ];
                $config = $statusConfig[$process->status] ?? ['bg-gray-100 text-gray-600 border-gray-200', $process->status];
            @endphp
            <span class="px-3 py-1 rounded-full text-sm font-medium border {{ $config[0] }}">
                {{ $config[1] }}
            </span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Main Content --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- Process Info --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h3 class="font-semibold text-gray-800 mb-4">
                    <i class="fa-solid fa-info-circle mr-2 text-blue-600"></i> Informações do Processo
                </h3>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-gray-400 text-xs uppercase tracking-wider mb-1">Número</p>
                        <p class="text-gray-800 font-medium">{{ $process->process_number }}</p>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs uppercase tracking-wider mb-1">Vara</p>
                        <p class="text-gray-800">{{ $process->court_name ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs uppercase tracking-wider mb-1">Tipo</p>
                        <p class="text-gray-800">{{ $process->case_type_label }}</p>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs uppercase tracking-wider mb-1">Área</p>
                        <p class="text-gray-800">{{ $process->case_area ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs uppercase tracking-wider mb-1">Parte Contrária</p>
                        <p class="text-gray-800">{{ $process->opposing_party ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-gray-400 text-xs uppercase tracking-wider mb-1">Advogado da Parte Contrária</p>
                        <p class="text-gray-800">{{ $process->opposing_lawyer ?? '-' }}</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-gray-400 text-xs uppercase tracking-wider mb-1">Descrição</p>
                        <p class="text-gray-700">{{ $process->description ?? 'Sem descrição' }}</p>
                    </div>
                </div>
            </div>

            {{-- Timeline --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h3 class="font-semibold text-gray-800 mb-6">
                    <i class="fa-solid fa-timeline mr-2 text-purple-600"></i> Timeline de Andamento
                </h3>

                @if(count($timeline) > 0)
                    <div class="relative">
                        {{-- Timeline Line --}}
                        <div class="absolute left-4 top-0 bottom-0 w-0.5 bg-gray-200"></div>

                        <div class="space-y-6">
                            @foreach($timeline as $index => $event)
                                <div class="relative pl-10">
                                    {{-- Dot --}}
                                    @php
                                        $dotColors = [
                                            'blue' => 'bg-blue-500',
                                            'green' => 'bg-green-500',
                                            'orange' => 'bg-orange-500',
                                            'red' => 'bg-red-500',
                                            'purple' => 'bg-purple-500',
                                            'gray' => 'bg-gray-400',
                                        ];
                                    @endphp
                                    <div class="absolute left-2.5 top-1 w-3 h-3 rounded-full {{ $dotColors[$event['color']] ?? 'bg-gray-400' }} ring-4 ring-white"></div>

                                    <div class="flex items-start justify-between">
                                        <div>
                                            <p class="font-medium text-gray-800">
                                                <i class="fa-solid {{ $event['icon'] }} mr-1 text-{{ $event['color'] }}-500"></i>
                                                {{ $event['title'] }}
                                            </p>
                                            <p class="text-sm text-gray-500 mt-0.5">{{ $event['description'] }}</p>
                                        </div>
                                        <span class="text-xs text-gray-400 whitespace-nowrap ml-4">
                                            {{ \Carbon\Carbon::parse($event['date'])->format('d/m/Y H:i') }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <p class="text-center text-gray-400 py-8">Nenhum evento registrado ainda.</p>
                @endif
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="space-y-6">
            {{-- Responsible --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <h3 class="font-semibold text-gray-800 mb-3">
                    <i class="fa-solid fa-user-tie mr-2 text-blue-600"></i> Advogado Responsável
                </h3>
                @if($process->responsible)
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                            <span class="text-blue-600 font-semibold text-sm">
                                {{ strtoupper(substr($process->responsible->name, 0, 1)) }}
                            </span>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">{{ $process->responsible->name }}</p>
                            <p class="text-xs text-gray-500">{{ $process->responsible->email }}</p>
                        </div>
                    </div>
                @else
                    <p class="text-sm text-gray-400">Não atribuído</p>
                @endif
            </div>

            {{-- Deadlines --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <h3 class="font-semibold text-gray-800 mb-3">
                    <i class="fa-solid fa-clock mr-2 text-orange-500"></i> Prazos
                </h3>
                @if(count($deadlines) > 0)
                    <div class="space-y-3">
                        @foreach($deadlines as $deadline)
                            @php
                                $isOverdue = \Carbon\Carbon::parse($deadline['due_date'])->isPast() && $deadline['status'] === 'pending';
                                $priorityColors = [
                                    'urgent' => 'border-red-300 bg-red-50',
                                    'high' => 'border-orange-300 bg-orange-50',
                                    'normal' => 'border-blue-300 bg-blue-50',
                                    'low' => 'border-gray-200 bg-gray-50',
                                ];
                            @endphp
                            <div class="border-l-4 {{ $priorityColors[$deadline['priority']] ?? 'border-gray-200 bg-gray-50' }} p-3 rounded-r-lg">
                                <p class="text-sm font-medium text-gray-800">{{ $deadline['title'] }}</p>
                                <p class="text-xs {{ $isOverdue ? 'text-red-600 font-semibold' : 'text-gray-500' }} mt-0.5">
                                    @if($isOverdue)
                                        <i class="fa-solid fa-exclamation-triangle mr-1"></i>
                                    @endif
                                    {{ \Carbon\Carbon::parse($deadline['due_date'])->format('d/m/Y') }}
                                    @if($deadline['status'] === 'completed')
                                        <span class="text-green-600 ml-1">✓ Concluído</span>
                                    @endif
                                </p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-400">Nenhum prazo registrado.</p>
                @endif
            </div>

            {{-- Documents --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <h3 class="font-semibold text-gray-800 mb-3">
                    <i class="fa-solid fa-file-lines mr-2 text-green-600"></i> Documentos
                </h3>
                @if(count($documents) > 0)
                    <div class="space-y-2">
                        @foreach($documents as $doc)
                            <a href="{{ route('documents.view', $doc['id']) }}" target="_blank"
                               class="flex items-center gap-2 p-2 rounded-lg hover:bg-gray-50 transition text-sm">
                                <i class="fa-solid {{ match($doc['category']) { 'contract' => 'fa-file-contract', 'petition' => 'fa-file-pen', default => 'fa-file' } }} text-gray-400"></i>
                                <div class="flex-1 min-w-0">
                                    <p class="text-gray-700 truncate">{{ $doc['title'] }}</p>
                                    <p class="text-xs text-gray-400">{{ $doc['original_name'] }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-400">Nenhum documento.</p>
                @endif
            </div>
        </div>
    </div>
</div>

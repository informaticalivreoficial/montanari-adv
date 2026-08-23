<div>
    {{-- Welcome --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Olá, {{ explode(' ', $user->name)[0] }}! 👋
        </h1>
        <p class="text-gray-500 mt-1">Bem-vindo à sua área. Aqui você acompanha tudo.</p>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        {{-- Total Processos --}}
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total de Processos</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $stats['total'] }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                    <i class="fa-solid fa-scale-balanced text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>

        {{-- Ativos --}}
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Em Andamento</p>
                    <p class="text-2xl font-bold text-green-600 mt-1">{{ $stats['active'] }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">
                    <i class="fa-solid fa-spinner text-green-600 text-xl"></i>
                </div>
            </div>
        </div>

        {{-- Suspensos --}}
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Suspensos</p>
                    <p class="text-2xl font-bold text-yellow-600 mt-1">{{ $stats['suspended'] }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-yellow-50 flex items-center justify-center">
                    <i class="fa-solid fa-pause text-yellow-600 text-xl"></i>
                </div>
            </div>
        </div>

        {{-- Encerrados --}}
        <div class="bg-white rounded-xl shadow-sm p-5 border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Encerrados</p>
                    <p class="text-2xl font-bold text-gray-500 mt-1">{{ $stats['closed'] }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-gray-50 flex items-center justify-center">
                    <i class="fa-solid fa-check-circle text-gray-400 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Main: Processes --}}
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="font-semibold text-gray-800">
                        <i class="fa-solid fa-scale-balanced mr-2 text-blue-600"></i> Meus Processos
                    </h3>
                    <a href="{{ route('client.processes') }}" class="text-sm text-blue-600 hover:underline">
                        Ver todos →
                    </a>
                </div>
                <div class="divide-y divide-gray-50">
                    @forelse($processes as $process)
                        <a href="{{ route('client.process.show', $process['id']) }}" 
                           class="block px-6 py-4 hover:bg-gray-50 transition">
                            <div class="flex items-center justify-between">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="font-semibold text-gray-800">{{ $process['process_number'] }}</span>
                                        @php
                                            $statusColors = [
                                                'active' => 'bg-green-100 text-green-700',
                                                'suspended' => 'bg-yellow-100 text-yellow-700',
                                                'archived' => 'bg-gray-100 text-gray-600',
                                                'closed' => 'bg-red-100 text-red-700',
                                            ];
                                            $statusLabels = [
                                                'active' => 'Ativo',
                                                'suspended' => 'Suspenso',
                                                'archived' => 'Arquivado',
                                                'closed' => 'Encerrado',
                                            ];
                                        @endphp
                                        <span class="px-2 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$process['status']] ?? 'bg-gray-100 text-gray-600' }}">
                                            {{ $statusLabels[$process['status']] ?? $process['status'] }}
                                        </span>
                                    </div>
                                    <p class="text-sm text-gray-500">{{ $process['court_name'] ?? 'Vara não informada' }}</p>
                                    @if($process['case_type'])
                                        <span class="text-xs text-gray-400 mt-1 inline-block">
                                            {{ match($process['case_type']) {
                                                'civil' => 'Cível',
                                                'criminal' => 'Criminal',
                                                'family' => 'Família',
                                                'labor' => 'Trabalhista',
                                                default => ucfirst($process['case_type']),
                                            } }}
                                        </span>
                                    @endif
                                </div>
                                <i class="fa-solid fa-chevron-right text-gray-300"></i>
                            </div>
                        </a>
                    @empty
                        <div class="px-6 py-12 text-center text-gray-400">
                            <i class="fa-solid fa-folder-open text-4xl mb-3"></i>
                            <p>Nenhum processo encontrado.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Sidebar: Deadlines --}}
        <div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="font-semibold text-gray-800">
                        <i class="fa-solid fa-clock mr-2 text-orange-500"></i> Próximos Prazos
                    </h3>
                    <a href="{{ route('client.deadlines') }}" class="text-sm text-blue-600 hover:underline">Ver todos →</a>
                </div>
                <div class="divide-y divide-gray-50">
                    @forelse($upcomingDeadlines as $deadline)
                        <div class="px-6 py-3">
                            <div class="flex items-start gap-3">
                                <div class="w-2 h-2 rounded-full bg-orange-400 mt-2 flex-shrink-0"></div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">{{ $deadline['title'] }}</p>
                                    <p class="text-xs text-gray-500 mt-0.5">
                                        {{ \Carbon\Carbon::parse($deadline['due_date'])->format('d/m/Y') }}
                                    </p>
                                    @if($deadline['process'])
                                        <p class="text-xs text-blue-500 mt-0.5">
                                            {{ $deadline['process']['process_number'] ?? '' }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="px-6 py-8 text-center text-gray-400 text-sm">
                            Nenhum prazo próximo.
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- Recent Messages --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 mt-4">
                <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="font-semibold text-gray-800">
                        <i class="fa-solid fa-comments mr-2 text-green-600"></i> Mensagens
                        @if($unreadCount > 0)
                            <span class="ml-1 px-2 py-0.5 rounded-full bg-red-100 text-red-600 text-xs font-semibold">{{ $unreadCount }}</span>
                        @endif
                    </h3>
                    <a href="{{ route('client.messages') }}" class="text-sm text-blue-600 hover:underline">Ver todas →</a>
                </div>
                <div class="divide-y divide-gray-50">
                    @forelse($recentMessages as $msg)
                        @php
                            $isUnread = !$msg['is_read'] && $msg['recipient_id'] == $user->id;
                        @endphp
                        <a href="{{ route('client.messages') }}" class="block px-6 py-3 hover:bg-gray-50 transition {{ $isUnread ? 'bg-blue-50/50' : '' }}">
                            <div class="flex items-center justify-between gap-2">
                                <p class="text-sm font-medium text-gray-800 truncate {{ $isUnread ? 'font-semibold' : '' }}">
                                    {{ $msg['subject'] ?? 'Sem assunto' }}
                                </p>
                                @if($isUnread)
                                    <span class="w-2 h-2 bg-blue-500 rounded-full flex-shrink-0"></span>
                                @endif
                            </div>
                            <p class="text-xs text-gray-500 mt-0.5 truncate">{{ \Illuminate\Support\Str::limit($msg['body'], 60) }}</p>
                        </a>
                    @empty
                        <div class="px-6 py-6 text-center text-gray-400 text-sm">
                            Nenhuma mensagem ainda.
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 mt-4">
                <div class="px-6 py-4 border-b border-gray-100">
                    <h3 class="font-semibold text-gray-800">
                        <i class="fa-solid fa-bolt mr-2 text-yellow-500"></i> Ações Rápidas
                    </h3>
                </div>
                <div class="p-4 space-y-2">
                    <a href="{{ route('client.documents') }}" 
                       class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition text-sm">
                        <div class="w-9 h-9 rounded-lg bg-blue-50 flex items-center justify-center">
                            <i class="fa-solid fa-file-arrow-up text-blue-600"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Enviar Documento</p>
                            <p class="text-xs text-gray-500">Envie documentos solicitados</p>
                        </div>
                    </a>
                    <a href="{{ route('client.messages') }}" 
                       class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-50 transition text-sm">
                        <div class="w-9 h-9 rounded-lg bg-green-50 flex items-center justify-center">
                            <i class="fa-solid fa-comments text-green-600"></i>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Enviar Mensagem</p>
                            <p class="text-xs text-gray-500">Comunique-se com o escritório</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

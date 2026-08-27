<div>
    {{-- Header --}}
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Notificações</h1>
            <p class="text-sm text-gray-500 mt-1">
                @if($unreadCount > 0)
                    Você tem {{ $unreadCount }} não lida{{ $unreadCount > 1 ? 's' : '' }}
                @else
                    Todas as notificações foram lidas
                @endif
            </p>
        </div>

        @if($unreadCount > 0)
            <button
                wire:click="markAllAsRead"
                class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50"
            >
                <i class="fa-solid fa-check-double text-xs"></i>
                Marcar todas como lidas
            </button>
        @endif
    </div>

    {{-- Filters --}}
    <div class="mb-4 flex items-center gap-2">
        <button
            wire:click="$set('filter', 'all')"
            class="rounded-lg px-3 py-1.5 text-sm font-medium transition
                   {{ $filter === 'all' ? 'bg-amber-100 text-amber-700' : 'text-gray-600 hover:bg-gray-100' }}"
        >
            Todas
        </button>
        <button
            wire:click="$set('filter', 'unread')"
            class="rounded-lg px-3 py-1.5 text-sm font-medium transition
                   {{ $filter === 'unread' ? 'bg-amber-100 text-amber-700' : 'text-gray-600 hover:bg-gray-100' }}"
        >
            Não lidas
        </button>
        <button
            wire:click="$set('filter', 'read')"
            class="rounded-lg px-3 py-1.5 text-sm font-medium transition
                   {{ $filter === 'read' ? 'bg-amber-100 text-amber-700' : 'text-gray-600 hover:bg-gray-100' }}"
        >
            Lidas
        </button>
    </div>

    {{-- List --}}
    <div class="rounded-xl border border-gray-200 bg-white shadow-sm overflow-hidden">
        @forelse($notifications as $notification)
            @php
                $data = $notification->data;
                $isRead = !is_null($notification->read_at);
            @endphp
            <div
                class="flex items-start gap-4 px-5 py-4 border-b border-gray-100 transition hover:bg-gray-50
                       {{ $isRead ? '' : 'bg-amber-50/30' }}"
            >
                {{-- Icon --}}
                <div class="shrink-0 mt-0.5">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full
                                {{ match($data['type'] ?? 'info') {
                                    'success' => 'bg-green-100 text-green-600',
                                    'warning' => 'bg-amber-100 text-amber-600',
                                    'error'   => 'bg-red-100 text-red-600',
                                    default   => 'bg-blue-100 text-blue-600',
                                } }}">
                        <i class="{{ $data['icon'] ?? 'fa-solid fa-bell' }} text-sm"></i>
                    </div>
                </div>

                {{-- Content --}}
                <div class="min-w-0 flex-1">
                    <div class="flex items-start justify-between gap-2">
                        <p class="text-sm font-semibold text-gray-900 {{ $isRead ? 'font-normal text-gray-600' : '' }}">
                            {{ $data['title'] ?? 'Notificação' }}
                            @if(!$isRead)
                                <span class="ml-1 inline-block h-2 w-2 rounded-full bg-amber-500"></span>
                            @endif
                        </p>
                        <p class="shrink-0 text-xs text-gray-400">
                            {{ $notification->created_at->diffForHumans() }}
                        </p>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">
                        {{ $data['message'] ?? '' }}
                    </p>
                    @if(!empty($data['url']))
                        <a href="{{ $data['url'] }}" class="inline-block mt-1.5 text-xs font-medium text-amber-600 hover:text-amber-700 transition">
                            <i class="fa-solid fa-arrow-right mr-1"></i> Ver detalhes
                        </a>
                    @endif
                </div>

                {{-- Actions --}}
                <div class="shrink-0 flex items-center gap-1">
                    @if(!$isRead)
                        <button
                            wire:click="markAsRead('{{ $notification->id }}')"
                            class="p-2 text-gray-400 hover:text-green-600 hover:bg-green-50 rounded-lg transition"
                            title="Marcar como lida"
                        >
                            <i class="fa-solid fa-check text-sm"></i>
                        </button>
                    @endif
                    <button
                        wire:click="delete('{{ $notification->id }}')"
                        onclick="return confirm('Tem certeza que deseja excluir esta notificação?')"
                        class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition"
                        title="Excluir"
                    >
                        <i class="fa-solid fa-trash text-sm"></i>
                    </button>
                </div>
            </div>
        @empty
            <div class="px-6 py-16 text-center">
                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-gray-100 mx-auto mb-4">
                    <i class="fa-solid fa-bell-slash text-2xl text-gray-400"></i>
                </div>
                <p class="text-sm font-medium text-gray-900 mb-1">Nenhuma notificação</p>
                <p class="text-xs text-gray-500">Quando houver novidades, elas aparecerão aqui.</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    @if($notifications->hasPages())
        <div class="mt-4">
            {{ $notifications->links() }}
        </div>
    @endif
</div>

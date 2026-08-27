<div class="relative" x-data="{ open: false }" @click.outside="open = false; $wire.close()">
    {{-- Bell Button --}}
    <button
        @click="$wire.toggle(); open = !open"
        class="relative p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg transition"
        title="Notificações"
    >
        <i class="fa-solid fa-bell text-lg"></i>

        {{-- Badge --}}
        @if($unreadCount > 0)
            <span class="absolute -top-0.5 -right-0.5 flex h-5 w-5 items-center justify-center rounded-full bg-red-500 text-[10px] font-bold text-white ring-2 ring-white">
                {{ $unreadCount > 9 ? '9+' : $unreadCount }}
            </span>
        @endif
    </button>

    {{-- Dropdown --}}
    @if($isOpen)
        <div
            x-show="open"
            x-cloak
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute right-0 mt-2 w-80 sm:w-96 bg-white rounded-xl shadow-lg border border-gray-100 z-50 overflow-hidden"
        >
            {{-- Header --}}
            <div class="flex items-center justify-between px-4 py-3 border-b border-gray-100">
                <h3 class="text-sm font-semibold text-gray-800">Notificações</h3>
                @if($unreadCount > 0)
                    <button
                        wire:click="markAllAsRead"
                        class="text-xs text-amber-600 hover:text-amber-700 font-medium transition"
                    >
                        Marcar todas como lidas
                    </button>
                @endif
            </div>

            {{-- List --}}
            <div class="max-h-80 overflow-y-auto">
                @forelse($notifications as $notification)
                    @php
                        $data = $notification->data;
                        $isRead = !is_null($notification->read_at);
                    @endphp
                    <div
                        class="flex items-start gap-3 px-4 py-3 border-b border-gray-50 transition hover:bg-gray-50
                               {{ $isRead ? '' : 'bg-amber-50/30' }}"
                    >
                        {{-- Icon --}}
                        <div class="shrink-0 mt-0.5">
                            <div class="flex h-8 w-8 items-center justify-center rounded-full
                                        {{ match($data['type'] ?? 'info') {
                                            'success' => 'bg-green-100 text-green-600',
                                            'warning' => 'bg-amber-100 text-amber-600',
                                            'error'   => 'bg-red-100 text-red-600',
                                            default   => 'bg-blue-100 text-blue-600',
                                        } }}">
                                <i class="{{ $data['icon'] ?? 'fa-solid fa-bell' }} text-xs"></i>
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="min-w-0 flex-1">
                            <p class="text-sm font-medium text-gray-800 {{ $isRead ? 'font-normal text-gray-600' : '' }}">
                                {{ $data['title'] ?? 'Notificação' }}
                            </p>
                            <p class="text-xs text-gray-500 mt-0.5 line-clamp-2">
                                {{ $data['message'] ?? '' }}
                            </p>
                            <p class="text-[11px] text-gray-400 mt-1">
                                {{ $notification->created_at->diffForHumans() }}
                            </p>
                        </div>

                        {{-- Actions --}}
                        <div class="shrink-0 flex items-center gap-1">
                            @if(!$isRead)
                                <button
                                    wire:click="markAsRead('{{ $notification->id }}')"
                                    class="p-1 text-gray-400 hover:text-green-600 rounded transition"
                                    title="Marcar como lida"
                                >
                                    <i class="fa-solid fa-check text-xs"></i>
                                </button>
                            @endif
                            <button
                                wire:click="delete('{{ $notification->id }}')"
                                class="p-1 text-gray-400 hover:text-red-600 rounded transition"
                                title="Excluir"
                            >
                                <i class="fa-solid fa-xmark text-xs"></i>
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="px-4 py-8 text-center">
                        <div class="flex h-12 w-12 items-center justify-center rounded-full bg-gray-100 mx-auto mb-3">
                            <i class="fa-solid fa-bell-slash text-gray-400"></i>
                        </div>
                        <p class="text-sm text-gray-500">Nenhuma notificação</p>
                    </div>
                @endforelse
            </div>

            {{-- Footer --}}
            @if($notifications->count() > 0)
                <div class="border-t border-gray-100 px-4 py-2.5 text-center">
                    <a
                        href="{{ route('dashboard.notifications') }}"
                        class="text-xs font-medium text-amber-600 hover:text-amber-700 transition"
                    >
                        Ver todas as notificações
                    </a>
                </div>
            @endif
        </div>
    @endif
</div>

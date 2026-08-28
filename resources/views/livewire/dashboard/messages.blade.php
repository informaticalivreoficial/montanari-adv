<div wire:poll.5s="poll" class="space-y-4">

    {{-- Cabeçalho --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-bold text-gray-900">Mensagens</h1>
            <p class="text-sm text-gray-500">Comunicação com os clientes</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

        {{-- ========== LISTA DE THREADS (por cliente) ========== --}}
        <div class="lg:col-span-1">
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm overflow-hidden">
                <div class="px-4 py-3 border-b border-gray-100">
                    <h3 class="text-sm font-semibold text-gray-800">
                        <i class="fa-solid fa-inbox mr-2 text-[#23406C]"></i> Caixa de entrada
                    </h3>
                </div>

                <div class="divide-y divide-gray-50 max-h-[70vh] overflow-y-auto">
                    @forelse($threads as $thread)
                        <button type="button" wire:click="openThread({{ $thread['client_id'] }})"
                            wire:key="thread-{{ $thread['client_id'] }}"
                            class="w-full text-left px-4 py-3 flex items-start gap-3 transition hover:bg-gray-50
                                   {{ $selectedClientId == $thread['client_id'] ? 'bg-[#23406C]/5' : '' }}">
                            {{-- Avatar --}}
                            <div class="shrink-0">
                                @if($thread['client_avatar'])
                                    <img src="{{ \App\Services\Asset::url($thread['client_avatar']) }}" alt="{{ $thread['client_name'] }}"
                                         class="h-9 w-9 rounded-full object-cover">
                                @else
                                    <div class="h-9 w-9 rounded-full bg-[#23406C]/10 flex items-center justify-center">
                                        <span class="text-[#23406C] font-semibold text-sm">
                                            {{ strtoupper(substr($thread['client_name'] ?? 'C', 0, 1)) }}
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <div class="min-w-0 flex-1">
                                <div class="flex items-center justify-between gap-2">
                                    <p class="text-sm font-semibold text-gray-800 truncate">{{ $thread['client_name'] }}</p>
                                    @if($thread['unread'] > 0)
                                        <span class="shrink-0 px-2 py-0.5 rounded-full bg-red-500 text-white text-[10px] font-bold">
                                            {{ $thread['unread'] }}
                                        </span>
                                    @endif
                                </div>
                                <p class="text-xs text-gray-500 truncate mt-0.5">{{ Str::limit($thread['last_body'], 60) }}</p>
                                <div class="flex items-center justify-between mt-1">
                                    <span class="text-[11px] text-gray-400">
                                        {{ \Carbon\Carbon::parse($thread['last_at'])->diffForHumans() }}
                                    </span>
                                    @if($thread['assigned_to'])
                                        <span class="text-[11px] text-[#23406C] truncate max-w-[50%]">
                                            <i class="fa-solid fa-user-tie mr-1"></i>{{ $thread['assigned_to'] }}
                                        </span>
                                    @else
                                        <span class="text-[11px] text-gray-400">Não atribuída</span>
                                    @endif
                                </div>
                            </div>
                        </button>
                    @empty
                        <div class="px-4 py-10 text-center text-gray-400 text-sm">
                            <i class="fa-solid fa-inbox text-3xl mb-2"></i>
                            <p>Nenhuma mensagem ainda.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- ========== CONVERSA ========== --}}
        <div class="lg:col-span-2">
            @if($selectedClientId)
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm flex flex-col h-[70vh]">
                    {{-- Header da conversa --}}
                    <div class="px-5 py-3 border-b border-gray-100 flex items-center justify-between gap-3">
                        <div class="flex items-center gap-3 min-w-0">
                            @php
                                $active = collect($threads)->firstWhere('client_id', $selectedClientId);
                            @endphp
                            @if($active && $active['client_avatar'])
                                <img src="{{ \App\Services\Asset::url($active['client_avatar']) }}" alt="{{ $active['client_name'] }}"
                                     class="h-9 w-9 rounded-full object-cover">
                            @else
                                <div class="h-9 w-9 rounded-full bg-[#23406C]/10 flex items-center justify-center">
                                    <span class="text-[#23406C] font-semibold text-sm">
                                        {{ strtoupper(substr($active['client_name'] ?? 'C', 0, 1)) }}
                                    </span>
                                </div>
                            @endif
                            <div class="min-w-0">
                                <p class="text-sm font-semibold text-gray-800 truncate">{{ $active['client_name'] ?? '' }}</p>
                                <p class="text-[11px] text-gray-400">Conversa com o cliente</p>
                            </div>
                        </div>

                        {{-- Atribuição --}}
                        <div class="flex items-center gap-2 shrink-0">
                            <label class="text-xs text-gray-500 hidden sm:inline">Advogado:</label>
                            <select wire:model.live="assignedTo"
                                class="rounded-lg border border-gray-300 px-2 py-1.5 text-xs text-gray-700 shadow-sm
                                       focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20 focus:outline-none">
                                <option value="">Não atribuída</option>
                                @foreach($team as $member)
                                    <option value="{{ $member['id'] }}">{{ $member['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Mensagens --}}
                    <div class="flex-1 overflow-y-auto px-5 py-4 space-y-3 bg-gray-50/50"
                         x-init="$nextTick(() => { $el.scrollTop = $el.scrollHeight })"
                         x-on:conversation-updated.window="$nextTick(() => { $el.scrollTop = $el.scrollHeight })">
                        @forelse($conversation as $msg)
                            @php
                                $isMine = ($msg['sender_id'] == auth()->id());
                            @endphp
                            <div wire:key="amsg-{{ $msg['id'] }}" class="flex {{ $isMine ? 'justify-end' : 'justify-start' }}">
                                <div class="max-w-[80%]">
                                    <div class="px-4 py-2.5 rounded-2xl text-sm shadow-sm
                                        {{ $isMine
                                            ? 'bg-[#23406C] text-white rounded-br-sm'
                                            : 'bg-white text-gray-800 border border-gray-200 rounded-bl-sm' }}">
                                        @if($msg['subject'])
                                            <p class="font-semibold mb-1 text-xs opacity-80">{{ $msg['subject'] }}</p>
                                        @endif
                                        <p class="whitespace-pre-wrap">{!! nl2br(e($msg['body'])) !!}</p>
                                    </div>
                                    <p class="text-[10px] text-gray-400 mt-1 {{ $isMine ? 'text-right' : 'text-left' }}">
                                        {{ \Carbon\Carbon::parse($msg['created_at'])->format('d/m/Y H:i') }}
                                        @if(!$isMine && !empty($msg['sender']['name']))
                                            · {{ $msg['sender']['name'] }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center text-gray-400 text-sm py-10">Nenhuma mensagem nesta conversa.</div>
                        @endforelse
                    </div>

                    {{-- Resposta --}}
                    <div class="border-t border-gray-100 p-3">
                        <form wire:submit.prevent="reply" class="flex items-end gap-2">
                            <textarea wire:model="replyBody" rows="2" placeholder="Escreva sua resposta..."
                                class="flex-1 rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-800 shadow-sm
                                       focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20 focus:outline-none
                                       resize-none @error('replyBody') border-red-500 @enderror"></textarea>
                            <button type="submit"
                                class="inline-flex items-center justify-center rounded-lg bg-[#23406C] px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-[#112240] focus:outline-none focus:ring-2 focus:ring-[#23406C] focus:ring-offset-2"
                                wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-not-allowed" wire:target="reply">
                                <i class="fa-solid fa-paper-plane text-xs"></i>
                                <span class="ml-2 hidden sm:inline" wire:loading.remove wire:target="reply">Enviar</span>
                                <span class="ml-2 hidden sm:inline" wire:loading wire:target="reply">Enviando...</span>
                            </button>
                        </form>
                        @error('replyBody') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>
                </div>
            @else
                <div class="rounded-xl border border-dashed border-gray-200 bg-white shadow-sm h-[70vh] flex items-center justify-center">
                    <div class="text-center text-gray-400">
                        <i class="fa-solid fa-comments text-4xl mb-3"></i>
                        <p class="text-sm">Selecione uma conversa ao lado para visualizar e responder.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

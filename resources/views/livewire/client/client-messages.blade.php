<div class="space-y-4" wire:poll.5s="pollConversation">

    {{-- Header --}}
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-xl font-bold text-gray-900">
                Mensagens
                @if($unreadCount > 0)
                    <span class="ml-2 px-2.5 py-0.5 bg-red-100 text-red-600 text-sm rounded-full font-medium">
                        {{ $unreadCount }} não lidas
                    </span>
                @endif
            </h1>
            <p class="text-sm text-gray-500 mt-0.5">Converse diretamente com o escritório.</p>
        </div>
        <button wire:click="toggleNewMessage"
                class="px-4 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-sm font-medium shrink-0">
            <i class="fa-solid fa-pen mr-2"></i> Nova Mensagem
        </button>
    </div>

    {{-- Formulário de nova mensagem (assunto + processo) --}}
    @if($showNewMessage)
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
            <h3 class="font-semibold text-gray-800 mb-4">
                <i class="fa-solid fa-paper-plane mr-2 text-blue-600"></i> Nova Mensagem
            </h3>

            <form wire:submit.prevent="sendMessage">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Processo (opcional)</label>
                        <select wire:model="selectedProcess"
                                class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                            <option value="">Mensagem geral</option>
                            @foreach($processes as $process)
                                <option value="{{ $process->id }}">{{ $process->process_number }} - {{ $process->court_name ?? '' }}</option>
                            @endforeach
                        </select>
                        @error('selectedProcess') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Assunto <span class="text-red-500">*</span></label>
                        <input type="text" wire:model="newSubject" placeholder="Ex: Dúvida sobre prazo..."
                               class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        @error('newSubject') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mensagem <span class="text-red-500">*</span></label>
                        <textarea wire:model="newBody" rows="4" placeholder="Escreva sua mensagem aqui..."
                                  class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none resize-none"></textarea>
                        @error('newBody') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="flex items-center gap-3 mt-4">
                    <button type="submit" wire:loading.attr="disabled" wire:loading.class="opacity-70" wire:target="sendMessage"
                            class="px-5 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition text-sm font-medium">
                        <span wire:loading.remove wire:target="sendMessage"><i class="fa-solid fa-paper-plane mr-2"></i> Enviar</span>
                        <span wire:loading wire:target="sendMessage"><i class="fa-solid fa-spinner fa-spin mr-2"></i> Enviando...</span>
                    </button>
                    <button type="button" wire:click="$set('showNewMessage', false)"
                            class="px-5 py-2.5 bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 transition text-sm font-medium">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    @endif

    {{-- Conversa --}}
    <div class="rounded-xl shadow-sm border border-gray-100 bg-white flex flex-col h-[68vh]">
        <div class="flex-1 overflow-y-auto px-5 py-4 space-y-3 bg-gray-50/50"
             x-init="$nextTick(() => { $el.scrollTop = $el.scrollHeight })"
             x-on:conversation-updated.window="$nextTick(() => { $el.scrollTop = $el.scrollHeight })">
            @forelse(($conversation ?? []) as $msg)
                @php
                    $isOwn = $msg['sender_id'] == auth()->id();
                @endphp
                <div wire:key="msg-{{ $msg['id'] }}" class="flex {{ $isOwn ? 'justify-end' : 'justify-start' }}">
                    <div class="max-w-[80%]">
                        <div class="px-4 py-2.5 rounded-2xl text-sm shadow-sm
                            {{ $isOwn
                                ? 'bg-green-600 text-white rounded-br-sm'
                                : 'bg-white text-gray-800 border border-gray-200 rounded-bl-sm' }}">
                            @if($msg['subject'])
                                <p class="font-semibold mb-1 text-xs opacity-80">{{ $msg['subject'] }}</p>
                            @endif
                            <p class="whitespace-pre-wrap">{!! nl2br(e($msg['body'])) !!}</p>
                        </div>
                        <p class="text-[10px] text-gray-400 mt-1 {{ $isOwn ? 'text-right' : 'text-left' }}">
                            {{ \Carbon\Carbon::parse($msg['created_at'])->format('d/m/Y H:i') }}
                            @if(!$isOwn && !empty($msg['sender']['name']))
                                · {{ $msg['sender']['name'] }}
                            @endif
                        </p>
                    </div>
                </div>
            @empty
                <div class="h-full flex flex-col items-center justify-center text-center text-gray-400">
                    <i class="fa-solid fa-comments text-4xl mb-3"></i>
                    <p class="text-sm">Nenhuma mensagem ainda.</p>
                    <p class="text-xs mt-1">Use "Nova Mensagem" para iniciar uma conversa.</p>
                </div>
            @endforelse
        </div>

        {{-- Caixa de resposta --}}
        <div class="border-t border-gray-100 p-3">
            <form wire:submit.prevent="reply" class="flex items-end gap-2">
                <textarea wire:model="replyBody" rows="2" placeholder="Escreva sua resposta..."
                          class="flex-1 rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-800 shadow-sm
                                 focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 focus:outline-none resize-none
                                 @error('replyBody') border-red-500 @enderror"></textarea>
                <button type="submit"
                        class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        wire:loading.attr="disabled" wire:loading.class="opacity-50 cursor-not-allowed" wire:target="reply">
                    <i class="fa-solid fa-paper-plane text-xs"></i>
                    <span class="ml-2 hidden sm:inline" wire:loading.remove wire:target="reply">Enviar</span>
                    <span class="ml-2 hidden sm:inline" wire:loading wire:target="reply">Enviando...</span>
                </button>
            </form>
            @error('replyBody') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
        </div>
    </div>
</div>

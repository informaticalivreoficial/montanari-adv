<div>
    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Mensagens
                @if($unreadCount > 0)
                    <span class="ml-2 px-2.5 py-0.5 bg-red-100 text-red-600 text-sm rounded-full font-medium">
                        {{ $unreadCount }} não lidas
                    </span>
                @endif
            </h1>
            <p class="text-gray-500 mt-1">Comunique-se diretamente com o escritório.</p>
        </div>
        <button wire:click="toggleNewMessage" 
                class="px-4 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-sm font-medium">
            <i class="fa-solid fa-pen mr-2"></i> Nova Mensagem
        </button>
    </div>

    {{-- New Message Form --}}
    @if($showNewMessage)
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
            <h3 class="font-semibold text-gray-800 mb-4">
                <i class="fa-solid fa-paper-plane mr-2 text-blue-600"></i> Nova Mensagem
            </h3>

            <form wire:submit.prevent="sendMessage">
                <div class="space-y-4">
                    {{-- Process --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Processo (opcional)</label>
                        <select wire:model="selectedProcess"
                                class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                            <option value="">Mensagem geral</option>
                            @foreach($processes as $process)
                                <option value="{{ $process->id }}">{{ $process->process_number }} - {{ $process->court_name ?? '' }}</option>
                            @endforeach
                        </select>
                        @error('selectedProcess')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Subject --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Assunto <span class="text-red-500">*</span>
                        </label>
                        <input type="text" wire:model="newSubject" placeholder="Ex: Dúvida sobre prazo..."
                               class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        @error('newSubject')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Body --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Mensagem <span class="text-red-500">*</span>
                        </label>
                        <textarea wire:model="newBody" rows="5" placeholder="Escreva sua mensagem aqui..."
                                  class="w-full px-3 py-2.5 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none resize-none"></textarea>
                        @error('newBody')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Actions --}}
                <div class="flex items-center gap-3 mt-4">
                    <button type="submit" 
                            wire:loading.attr="disabled" wire:loading.class="opacity-70"
                            class="px-5 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition text-sm font-medium">
                        <span wire:loading.remove wire:target="sendMessage">
                            <i class="fa-solid fa-paper-plane mr-2"></i> Enviar
                        </span>
                        <span wire:loading wire:target="sendMessage">
                            <i class="fa-solid fa-spinner fa-spin mr-2"></i> Enviando...
                        </span>
                    </button>
                    <button type="button" wire:click="$set('showNewMessage', false)"
                            class="px-5 py-2.5 bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 transition text-sm font-medium">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    @endif

    {{-- Messages List --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        @if(count($chatMessages) > 0)
            <div class="divide-y divide-gray-50">
                @foreach($chatMessages as $message)
                    @php
                        $isOwn = $message['sender_id'] == Auth::id();
                        $isUnread = !$message['is_read'] && !$isOwn;
                    @endphp
                    <div wire:click="markAsRead({{ $message['id'] }})" 
                         class="px-6 py-4 hover:bg-gray-50 transition cursor-pointer {{ $isUnread ? 'bg-blue-50/50' : '' }}">
                        <div class="flex items-start gap-4">
                            {{-- Avatar --}}
                            <div class="w-10 h-10 rounded-full flex-shrink-0 flex items-center justify-center {{ $isOwn ? 'bg-green-100' : 'bg-blue-100' }}">
                                <span class="font-semibold text-sm {{ $isOwn ? 'text-green-600' : 'text-blue-600' }}">
                                    {{ strtoupper(substr($isOwn ? ($message['recipient']['name'] ?? 'E') : ($message['sender']['name'] ?? 'E'), 0, 1)) }}
                                </span>
                            </div>

                            <div class="flex-1 min-w-0">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <p class="font-semibold text-gray-800 text-sm {{ $isUnread ? 'font-bold' : '' }}">
                                            {{ $isOwn ? ($message['recipient']['name'] ?? 'Escritório') : ($message['sender']['name'] ?? 'Você') }}
                                        </p>
                                        @if($isUnread)
                                            <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                                        @endif
                                    </div>
                                    <span class="text-xs text-gray-400">
                                        {{ \Carbon\Carbon::parse($message['created_at'])->format('d/m/Y H:i') }}
                                    </span>
                                </div>
                                <p class="text-sm font-medium text-gray-700 {{ $isUnread ? 'font-semibold' : '' }}">
                                    {{ $message['subject'] ?? 'Sem assunto' }}
                                </p>
                                <p class="text-sm text-gray-500 truncate mt-0.5">{{ \Illuminate\Support\Str::limit($message['body'], 100) }}</p>
                                @if($message['process'] ?? false)
                                    <span class="inline-flex items-center text-xs text-blue-500 mt-1">
                                        <i class="fa-solid fa-scale-balanced mr-1"></i>
                                        {{ $message['process']['process_number'] ?? '' }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="px-6 py-12 text-center">
                <i class="fa-solid fa-comments text-5xl text-gray-200 mb-4"></i>
                <p class="text-gray-500 text-lg">Nenhuma mensagem ainda</p>
                <p class="text-gray-400 text-sm mt-1">Clique em "Nova Mensagem" para iniciar uma conversa.</p>
            </div>
        @endif
    </div>
</div>

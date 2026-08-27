<div>
    @if($sent)
        {{-- Success Message --}}
        <div class="text-center py-12">
            <i class="fas fa-check-circle text-6xl text-green-500 mb-6 block"></i>
            <h3 class="font-heading text-2xl font-bold text-navy-800 mb-3">Mensagem Enviada!</h3>
            <p class="text-gray-500 mb-6">
                Obrigado! Sua mensagem foi enviada com sucesso.<br>
                Entraremos em contato em breve.
            </p>
            <button wire:click="$set('sent', false)"
                    class="inline-flex items-center gap-2 px-6 py-3 bg-navy-700 text-white font-semibold rounded-lg hover:bg-navy-800 transition">
                Enviar outra mensagem
            </button>
        </div>
    @else
        {{-- Contact Form --}}
        <h3 class="font-heading text-2xl font-bold text-navy-800 mb-2">Envie sua Mensagem</h3>
        <p class="text-gray-400 text-sm mb-8">Preencha os campos abaixo e entraremos em contato.</p>

        {{-- Honeypot fields (hidden) --}}
        <div style="display: none;">
            <input type="text" wire:model="bairro" tabindex="-1" autocomplete="off">
            <input type="text" wire:model="cidade" tabindex="-1" autocomplete="off">
        </div>

        <form wire:submit.prevent="send" class="space-y-5">
            {{-- Nome --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nome <span class="text-red-500">*</span>
                </label>
                <input type="text" wire:model="nome" placeholder="Seu nome completo"
                       class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm text-gray-900 placeholder-gray-400 shadow-sm transition
                              focus:border-gold-500 focus:outline-none focus:ring-2 focus:ring-gold-500/20
                              @error('nome') border-red-500 focus:border-red-500 focus:ring-red-500/20 @enderror">
                @error('nome')
                    <p class="flex items-center gap-1 text-xs text-red-500 mt-1">
                        <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    E-mail <span class="text-red-500">*</span>
                </label>
                <input type="email" wire:model="email" placeholder="seu@email.com"
                       class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm text-gray-900 placeholder-gray-400 shadow-sm transition
                              focus:border-gold-500 focus:outline-none focus:ring-2 focus:ring-gold-500/20
                              @error('email') border-red-500 focus:border-red-500 focus:ring-red-500/20 @enderror">
                @error('email')
                    <p class="flex items-center gap-1 text-xs text-red-500 mt-1">
                        <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Mensagem --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Mensagem <span class="text-red-500">*</span>
                </label>
                <textarea wire:model="mensagem" placeholder="Descreva sua necessidade aqui..."
                          rows="5"
                          class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm text-gray-900 placeholder-gray-400 shadow-sm transition resize-y
                                 focus:border-gold-500 focus:outline-none focus:ring-2 focus:ring-gold-500/20
                                 @error('mensagem') border-red-500 focus:border-red-500 focus:ring-red-500/20 @enderror"></textarea>
                @error('mensagem')
                    <p class="flex items-center gap-1 text-xs text-red-500 mt-1">
                        <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Submit --}}
            <button type="submit"
                    wire:loading.attr="disabled"
                    class="w-full inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-gold-500 to-gold-600 text-white font-semibold rounded-lg
                           hover:from-gold-600 hover:to-gold-700 transition-all duration-300 shadow-lg shadow-gold-500/25
                           disabled:opacity-50 disabled:cursor-not-allowed">
                <span wire:loading.remove wire:target="send">
                    <i class="fas fa-paper-plane text-xs"></i> Enviar Mensagem
                </span>
                <span wire:loading wire:target="send">
                    <i class="fas fa-spinner fa-spin text-xs"></i> Enviando...
                </span>
            </button>
        </form>
    @endif
</div>

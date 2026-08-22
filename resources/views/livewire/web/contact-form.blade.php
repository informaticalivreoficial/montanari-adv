<div>
    @if($sent)
        {{-- Success Message --}}
        <div class="quote-box">
            <div class="sec-title">
                <div style="text-align:center; padding: 40px 20px;">
                    <i class="fas fa-check-circle" style="font-size: 4rem; color: #6ebf58; margin-bottom: 20px; display: block;"></i>
                    <h3 style="color: #23406C; margin-bottom: 15px;">Mensagem Enviada!</h3>
                    <p style="color: #666; font-size: 1.1rem;">
                        Obrigado! Sua mensagem foi enviada com sucesso.<br>
                        Entraremos em contato em breve.
                    </p>
                    <button wire:click="$set('sent', false)" class="btn-1" style="margin-top: 20px;">
                        Enviar outra mensagem
                    </button>
                </div>
            </div>
        </div>
    @else
        {{-- Contact Form --}}
        <div class="quote-box">
            <div class="sec-title">
                <h3>Preencha o Formulário</h3>
            </div>

            {{-- Honeypot fields (hidden) --}}
            <div style="display: none;">
                <input type="text" wire:model="bairro" tabindex="-1" autocomplete="off">
                <input type="text" wire:model="cidade" tabindex="-1" autocomplete="off">
            </div>

            <form wire:submit.prevent="send">
                <div class="row">
                    <div class="col-md-12">
                        <div class="quote-item" style="margin-bottom: 15px;">
                            <label style="font-weight: 600; color: #333; margin-bottom: 5px; display: block;">
                                Nome <span style="color: red;">*</span>
                            </label>
                            <input type="text" wire:model="nome" placeholder="Seu nome completo"
                                   style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem;">
                            @error('nome')
                                <span style="color: #dc3545; font-size: 0.85rem; margin-top: 5px; display: block;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="quote-item" style="margin-bottom: 15px;">
                            <label style="font-weight: 600; color: #333; margin-bottom: 5px; display: block;">
                                E-mail <span style="color: red;">*</span>
                            </label>
                            <input type="email" wire:model="email" placeholder="seu@email.com"
                                   style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem;">
                            @error('email')
                                <span style="color: #dc3545; font-size: 0.85rem; margin-top: 5px; display: block;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="quote-item" style="margin-bottom: 15px;">
                            <label style="font-weight: 600; color: #333; margin-bottom: 5px; display: block;">
                                Telefone
                            </label>
                            <input type="text" wire:model="telefone" placeholder="(00) 00000-0000"
                                   style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem;">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="quote-item" style="margin-bottom: 15px;">
                            <label style="font-weight: 600; color: #333; margin-bottom: 5px; display: block;">
                                Assunto
                            </label>
                            <select wire:model="assunto"
                                    style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; background: #fff;">
                                <option value="">Selecione o assunto</option>
                                <option value="Consulta">Consulta</option>
                                <option value="Novo caso">Novo caso</option>
                                <option value="Andamento de processo">Andamento de processo</option>
                                <option value="Documentação">Documentação</option>
                                <option value="Outro">Outro</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="quote-item" style="margin-bottom: 15px;">
                            <label style="font-weight: 600; color: #333; margin-bottom: 5px; display: block;">
                                Mensagem <span style="color: red;">*</span>
                            </label>
                            <textarea wire:model="mensagem" placeholder="Descreva sua necessidade aqui..."
                                      rows="6"
                                      style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 1rem; resize: vertical;"></textarea>
                            @error('mensagem')
                                <span style="color: #dc3545; font-size: 0.85rem; margin-top: 5px; display: block;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="quote-item">
                            <button type="submit" class="btn-1"
                                    wire:loading.attr="disabled"
                                    wire:loading.class="opacity-50"
                                    style="min-width: 200px;">
                                <span wire:loading.remove wire:target="send">Enviar Mensagem</span>
                                <span wire:loading wire:target="send">
                                    <i class="fas fa-spinner fa-spin"></i> Enviando...
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endif
</div>

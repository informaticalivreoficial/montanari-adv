<footer class="bg-navy-950 text-white">
    {{-- Main Footer --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10">

            {{-- Brand --}}
            <div class="lg:col-span-4">
                @if(!empty($configuracoes->getlogo()))
                    <img src="{{ $configuracoes->getlogo() }}" alt="{{ $configuracoes->app_name }}" class="h-10 w-auto mb-4 brightness-0 invert">
                @else
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-9 h-9 bg-navy-700 rounded-lg flex items-center justify-center">
                            <i class="fas fa-balance-scale text-gold-500 text-sm"></i>
                        </div>
                        <span class="font-heading text-base font-bold text-white">{{ $configuracoes->app_name }}</span>
                    </div>
                @endif
                <p class="text-white/40 text-xs leading-relaxed mb-4">{{ $configuracoes->information }}</p>

                {{-- Social --}}
                <div class="flex items-center gap-2">
                    @if(!empty($configuracoes->facebook))
                        <a href="{{ $configuracoes->facebook }}" target="_blank"
                            class="w-8 h-8 rounded-lg bg-white/5 hover:bg-gold-500 flex items-center justify-center transition-all duration-300 text-white/50 hover:text-white">
                            <i class="fab fa-facebook-f text-xs"></i>
                        </a>
                    @endif
                    @if(!empty($configuracoes->instagram))
                        <a href="{{ $configuracoes->instagram }}" target="_blank"
                            class="w-8 h-8 rounded-lg bg-white/5 hover:bg-gold-500 flex items-center justify-center transition-all duration-300 text-white/50 hover:text-white">
                            <i class="fab fa-instagram text-xs"></i>
                        </a>
                    @endif
                    @if(!empty($configuracoes->linkedin))
                        <a href="{{ $configuracoes->linkedin }}" target="_blank"
                            class="w-8 h-8 rounded-lg bg-white/5 hover:bg-gold-500 flex items-center justify-center transition-all duration-300 text-white/50 hover:text-white">
                            <i class="fab fa-linkedin-in text-xs"></i>
                        </a>
                    @endif
                    @if(!empty($configuracoes->youtube))
                        <a href="{{ $configuracoes->youtube }}" target="_blank"
                            class="w-8 h-8 rounded-lg bg-white/5 hover:bg-gold-500 flex items-center justify-center transition-all duration-300 text-white/50 hover:text-white">
                            <i class="fab fa-youtube text-xs"></i>
                        </a>
                    @endif
                </div>
            </div>

            {{-- Links Rápidos --}}
            <div class="lg:col-span-2">
                <h4 class="font-heading text-sm font-bold mb-4 relative">
                    Links Rápidos
                    <span class="block w-6 h-0.5 bg-gold-500 mt-2"></span>
                </h4>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('web.home') }}" class="text-white/40 hover:text-gold-400 transition-colors text-xs flex items-center gap-2">
                            <i class="fas fa-chevron-right text-[8px] text-gold-500/30"></i> Início
                        </a>
                    </li>                    

                    {{-- Páginas dinâmicas do menu (mesmo do header) --}}
                    @foreach($menuPages as $page)
                        <li>
                            <a href="{{ url('/pagina/') }}/{{ $page->slug }}" class="text-white/40 hover:text-gold-400 transition-colors text-xs flex items-center gap-2">
                                <i class="fas fa-chevron-right text-[8px] text-gold-500/30"></i> {{ $page->title }}
                            </a>
                        </li>
                    @endforeach

                    <li>
                        <a href="{{ route('web.blog.artigos') }}" class="text-white/40 hover:text-gold-400 transition-colors text-xs flex items-center gap-2">
                            <i class="fas fa-chevron-right text-[8px] text-gold-500/30"></i> Blog
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('web.atendimento') }}" class="text-white/40 hover:text-gold-400 transition-colors text-xs flex items-center gap-2">
                            <i class="fas fa-chevron-right text-[8px] text-gold-500/30"></i> Atendimento
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('web.politica-de-privacidade') }}" class="text-white/40 hover:text-gold-400 transition-colors text-xs flex items-center gap-2">
                            <i class="fas fa-chevron-right text-[8px] text-gold-500/30"></i> Política de Privacidade
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('web.terms') }}" class="text-white/40 hover:text-gold-400 transition-colors text-xs flex items-center gap-2">
                            <i class="fas fa-chevron-right text-[8px] text-gold-500/30"></i> Termos e Condições
                        </a>
                    </li>
                    <li>
                        <a @click="openModal()" class="text-white/40 hover:text-gold-400 transition-colors text-xs flex items-center gap-2 cursor-pointer">
                            <i class="fas fa-chevron-right text-[8px] text-gold-500/30"></i> Preferências de Cookies
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Área do Cliente --}}
            <div class="lg:col-span-2">
                <h4 class="font-heading text-sm font-bold mb-4 relative">
                    Área do Cliente
                    <span class="block w-6 h-0.5 bg-gold-500 mt-2"></span>
                </h4>
                <ul class="space-y-2">
                    <li>
                        <a href="/cliente" class="text-white/40 hover:text-gold-400 transition-colors text-xs flex items-center gap-2">
                            <i class="fas fa-chevron-right text-[8px] text-gold-500/30"></i> Minha Conta
                        </a>
                    </li>
                    <li>
                        <a href="/cliente/processos" class="text-white/40 hover:text-gold-400 transition-colors text-xs flex items-center gap-2">
                            <i class="fas fa-chevron-right text-[8px] text-gold-500/30"></i> Acompanhar Processos
                        </a>
                    </li>
                    <li>
                        <a href="/cliente/documentos" class="text-white/40 hover:text-gold-400 transition-colors text-xs flex items-center gap-2">
                            <i class="fas fa-chevron-right text-[8px] text-gold-500/30"></i> Enviar Documentos
                        </a>
                    </li>
                    <li>
                        <a href="/cliente/mensagens" class="text-white/40 hover:text-gold-400 transition-colors text-xs flex items-center gap-2">
                            <i class="fas fa-chevron-right text-[8px] text-gold-500/30"></i> Mensagens
                        </a>
                    </li>
                </ul>
            </div>

            {{-- Contato --}}
            <div class="lg:col-span-4 min-w-0">
                <h4 class="font-heading text-sm font-bold mb-4 relative">
                    Contato
                    <span class="block w-6 h-0.5 bg-gold-500 mt-2"></span>
                </h4>
                <ul class="space-y-3">
                    @if(!empty($configuracoes->phone))
                        <li class="flex items-start gap-2.5">
                            <div class="w-7 h-7 rounded bg-gold-500/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-phone text-gold-500 text-[10px]"></i>
                            </div>
                            <div class="min-w-0 flex-1">
                                    <p class="text-white/30 text-[10px] uppercase tracking-wider mb-0.5">Telefone</p>
                                    <a href="tel:{{ $configuracoes->phone }}" class="text-white/60 hover:text-white transition-colors text-xs">
                                    {{ \Illuminate\Support\Str::of($configuracoes->phone)->length === 11
                                        ? '(' . substr($configuracoes->phone, 0, 2) . ') ' . substr($configuracoes->phone, 2, 5) . '-' . substr($configuracoes->phone, 7)
                                        : '(' . substr($configuracoes->phone, 0, 2) . ') ' . substr($configuracoes->phone, 2, 4) . '-' . substr($configuracoes->phone, 6) }}
                                </a>
                            </div>
                        </li>
                    @endif
                    @if(!empty($configuracoes->whatsapp))
                        <li class="flex items-start gap-2.5">
                            <div class="w-7 h-7 rounded bg-green-500/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fab fa-whatsapp text-green-400 text-xs"></i>
                            </div>
                            <div class="min-w-0 flex-1">
                                    <p class="text-white/30 text-[10px] uppercase tracking-wider mb-0.5">WhatsApp</p>
                                    <a href="{{ getNumZap($configuracoes->whatsapp, 'Atendimento ' . $configuracoes->app_name) }}" target="_blank" data-whatsapp
                                        class="text-white/60 hover:text-green-400 transition-colors text-xs">
                                    {{ \Illuminate\Support\Str::of($configuracoes->whatsapp)->length === 11
                                        ? '(' . substr($configuracoes->whatsapp, 0, 2) . ') ' . substr($configuracoes->whatsapp, 2, 5) . '-' . substr($configuracoes->whatsapp, 7)
                                        : '(' . substr($configuracoes->whatsapp, 0, 2) . ') ' . substr($configuracoes->whatsapp, 2, 4) . '-' . substr($configuracoes->whatsapp, 6) }}
                                </a>
                            </div>
                        </li>
                    @endif
                    @if(!empty($configuracoes->email))
                        <li class="flex items-start gap-2.5">
                            <div class="w-7 h-7 rounded bg-gold-500/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-envelope text-gold-500 text-[10px]"></i>
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-white/30 text-[10px] uppercase tracking-wider mb-0.5">E-mail</p>
                                <a href="mailto:{{ $configuracoes->email }}" class="text-white/60 hover:text-white transition-colors text-xs break-all">{{ $configuracoes->email }}</a>
                            </div>
                        </li>
                    @endif
                    @if(!empty($configuracoes->street))
                        <li class="flex items-start gap-2.5">
                            <div class="w-7 h-7 rounded bg-gold-500/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-map-marker-alt text-gold-500 text-[10px]"></i>
                            </div>
                            <div>
                                <p class="text-white/30 text-[10px] uppercase tracking-wider mb-0.5">Endereço</p>
                                <p class="text-white/60 text-xs leading-relaxed">
                                    {{ $configuracoes->street }}{{ !empty($configuracoes->number) ? ', ' . $configuracoes->number : '' }}{{ !empty($configuracoes->neighborhood) ? ' - ' . $configuracoes->neighborhood : '' }}
                                </p>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    {{-- Bottom Bar --}}
    <div class="border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex flex-col md:flex-row items-center justify-between gap-3">
                <p class="text-white/25 text-xs">
                    &copy; {{ $configuracoes->init_date }} {{ $configuracoes->app_name }} — Todos os direitos reservados.
                </p>
                <div class="flex items-center gap-4">
                    <span class="text-white/10">|</span>
                    <span class="text-white/15 text-xs">
                        Feito com <i class="fas fa-heart text-red-400/50 text-[10px]"></i> por
                        <a href="{{ config('app.desenvolvedor_url') }}" target="_blank" class="hover:text-gold-400 transition-colors">{{ config('app.desenvolvedor') }}</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</footer>
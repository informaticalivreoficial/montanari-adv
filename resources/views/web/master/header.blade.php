<header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
        x-data="{
            scrolled: false,
            searchOpen: false,
            init() {
                window.addEventListener('scroll', () => {
                    this.scrolled = window.scrollY > 50;
                });
            }
        }"
        :class="scrolled ? 'bg-white/95 backdrop-blur-md shadow-lg shadow-navy-900/5' : 'bg-transparent'"
        @scroll.window="scrolled = window.scrollY > 50">

    {{-- Top Bar --}}
    <div class="transition-all duration-300"
            :class="scrolled ? 'h-0 overflow-hidden opacity-0' : 'h-auto opacity-100'"
            x-show="!scrolled" x-transition>
        <div class="bg-navy-900 text-white/80 text-sm overflow-x-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-8">
                    <div class="flex items-center gap-6 min-w-0">
                        @if(!empty($configuracoes->email))
                            <a href="mailto:{{ $configuracoes->email }}" class="hidden sm:flex items-center gap-2 hover:text-gold-400 transition-colors">
                                <i class="fas fa-envelope text-gold-500 text-xs"></i>
                                <span>{{ $configuracoes->email }}</span>
                            </a>
                        @endif
                        @if(!empty($configuracoes->phone))
                            <a href="tel:{{ $configuracoes->phone }}" class="flex items-center gap-2 hover:text-gold-400 transition-colors">
                                <i class="fas fa-phone text-gold-500 text-xs"></i>
                                <span>{{ \Illuminate\Support\Str::of($configuracoes->phone)->length === 11
                                    ? '(' . substr($configuracoes->phone, 0, 2) . ') ' . substr($configuracoes->phone, 2, 5) . '-' . substr($configuracoes->phone, 7)
                                    : '(' . substr($configuracoes->phone, 0, 2) . ') ' . substr($configuracoes->phone, 2, 4) . '-' . substr($configuracoes->phone, 6) }}</span>
                            </a>
                        @endif
                    </div>
                    <div class="hidden md:flex items-center gap-4">
                        @if(!empty($configuracoes->facebook))
                            <a href="{{ $configuracoes->facebook }}" target="_blank" class="hover:text-gold-400 transition-colors"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if(!empty($configuracoes->instagram))
                            <a href="{{ $configuracoes->instagram }}" target="_blank" class="hover:text-gold-400 transition-colors"><i class="fab fa-instagram"></i></a>
                        @endif
                        @if(!empty($configuracoes->linkedin))
                            <a href="{{ $configuracoes->linkedin }}" target="_blank" class="hover:text-gold-400 transition-colors"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                        @if(!empty($configuracoes->youtube))
                            <a href="{{ $configuracoes->youtube }}" target="_blank" class="hover:text-gold-400 transition-colors"><i class="fab fa-youtube"></i></a>
                        @endif
                        @if(!empty($configuracoes->whatsapp))
                            <a href="{{ getNumZap($configuracoes->whatsapp, 'Atendimento ' . $configuracoes->app_name) }}" target="_blank" data-whatsapp class="hover:text-green-400 transition-colors"><i class="fab fa-whatsapp"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Navigation --}}
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            {{-- Logo --}}
            <a href="{{ route('web.home') }}" class="flex-shrink-0">
                @if(!empty($configuracoes->getlogofooter()))
                    <img :src="scrolled ? '{{ $configuracoes->getlogo() }}' : '{{ $configuracoes->getlogofooter() }}'"
                         alt="{{ $configuracoes->app_name }}" class="h-10 w-auto transition-all duration-300">
                @else
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-navy-700 rounded flex items-center justify-center">
                            <i class="fas fa-balance-scale text-gold-500 text-lg"></i>
                        </div>
                        <div>
                            <span class="font-heading text-xl font-bold" :class="scrolled ? 'text-navy-800' : 'text-white'">
                                {{ $configuracoes->app_name }}
                            </span>
                        </div>
                    </div>
                @endif
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden lg:flex items-center gap-1">                    

                {{-- Páginas dinâmicas do menu --}}
                @foreach($menuPages as $page)
                    <a href="{{ url('/pagina/') }}/{{ $page->slug }}"
                        class="px-4 py-2 text-sm font-medium rounded transition-all duration-200 {{ request()->url() === url('/pagina/'.$page->slug) ? 'text-gold-500' : '' }}"
                        :class="scrolled ? 'text-navy-700 hover:text-gold-600 hover:bg-gold-50' : 'text-white/90 hover:text-white hover:bg-white/10'">
                        {{ $page->title }}
                    </a>
                @endforeach

                <a href="{{ route('web.blog.artigos') }}"
                    class="px-4 py-2 text-sm font-medium rounded transition-all duration-200 {{ request()->routeIs('web.blog.*') ? 'text-gold-500' : '' }}"
                    :class="scrolled ? 'text-navy-700 hover:text-gold-600 hover:bg-gold-50' : 'text-white/90 hover:text-white hover:bg-white/10'">
                    Blog
                </a>
                <a href="{{ route('web.atendimento') }}"
                    class="px-4 py-2 text-sm font-medium rounded transition-all duration-200 {{ request()->routeIs('web.atendimento') ? 'text-gold-500' : '' }}"
                    :class="scrolled ? 'text-navy-700 hover:text-gold-600 hover:bg-gold-50' : 'text-white/90 hover:text-white hover:bg-white/10'">
                    Atendimento
                </a>

                <div class="w-px h-6 mx-2" :class="scrolled ? 'bg-navy-200' : 'bg-white/20'"></div>

                {{-- Client Portal --}}
                <a href="/cliente" class="px-4 py-2 text-sm font-medium rounded transition-all duration-200"
                    :class="scrolled ? 'text-navy-600 hover:text-gold-600 hover:bg-gold-50' : 'text-white/80 hover:text-white hover:bg-white/10'">
                    <i class="fas fa-user-lock mr-1 text-xs"></i> Área do Cliente
                </a>

                {{-- CTA --}}
                <a href="{{ route('web.atendimento') }}" class="ml-2 inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-gold-500 to-gold-600 text-white text-sm font-semibold rounded hover:from-gold-600 hover:to-gold-700 transition-all duration-300 shadow-lg shadow-gold-500/25 hover:shadow-gold-500/40 hover:-translate-y-0.5">
                    <i class="fas fa-headset text-xs"></i>
                    Consulta
                </a>
            </div>

            {{-- Mobile Toggle --}}
            <div class="lg:hidden flex items-center gap-3">
                <button @click="searchOpen = !searchOpen" class="p-2 rounded-lg transition-colors"
                        :class="scrolled ? 'text-navy-700 hover:bg-navy-50' : 'text-white hover:bg-white/10'">
                    <i class="fas fa-search"></i>
                </button>
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 rounded-lg transition-colors"
                        :class="scrolled ? 'text-navy-700 hover:bg-navy-50' : 'text-white hover:bg-white/10'">
                    <i class="fas" :class="mobileMenuOpen ? 'fa-times text-xl' : 'fa-bars text-lg'"></i>
                </button>
            </div>
        </div>
    </nav>

    {{-- Mobile Menu --}}
    <div class="lg:hidden" x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            @click.away="mobileMenuOpen = false"
            x-effect="document.body.classList.toggle('overflow-hidden', mobileMenuOpen)">
        <div class="fixed inset-0 overflow-y-auto overscroll-contain bg-navy-900/95 backdrop-blur-md z-40 flex flex-col pt-24 pb-8 px-6">
            <button @click="mobileMenuOpen = false" class="absolute top-6 right-6 text-white/80 hover:text-white text-2xl">
                <i class="fas fa-times"></i>
            </button>

            <div class="flex flex-col gap-2">
                <a href="{{ route('web.home') }}#about-us" @click="mobileMenuOpen = false"
                    class="py-4 px-4 text-lg font-medium text-white/90 hover:text-gold-400 border-b border-white/10 transition-colors">
                    <i class="fas fa-building w-6 text-gold-500/60"></i> Escritório
                </a>
                <a href="{{ route('web.servicos') }}" @click="mobileMenuOpen = false"
                    class="py-4 px-4 text-lg font-medium text-white/90 hover:text-gold-400 border-b border-white/10 transition-colors">
                    <i class="fas fa-gavel w-6 text-gold-500/60"></i> Áreas de Atuação
                </a>

                {{-- Páginas dinâmicas do menu --}}
                @foreach($menuPages as $page)
                    <a href="{{ url('/pagina/') }}/{{ $page->slug }}" @click="mobileMenuOpen = false"
                        class="py-4 px-4 text-lg font-medium text-white/90 hover:text-gold-400 border-b border-white/10 transition-colors">
                        <i class="fas fa-file w-6 text-gold-500/60"></i> {{ $page->title }}
                    </a>
                @endforeach

                <a href="{{ route('web.blog.artigos') }}" @click="mobileMenuOpen = false"
                    class="py-4 px-4 text-lg font-medium text-white/90 hover:text-gold-400 border-b border-white/10 transition-colors">
                    <i class="fas fa-newspaper w-6 text-gold-500/60"></i> Blog
                </a>
                <a href="{{ route('web.atendimento') }}" @click="mobileMenuOpen = false"
                    class="py-4 px-4 text-lg font-medium text-white/90 hover:text-gold-400 border-b border-white/10 transition-colors">
                    <i class="fas fa-envelope w-6 text-gold-500/60"></i> Atendimento
                </a>
                <a href="/cliente" @click="mobileMenuOpen = false"
                    class="py-4 px-4 text-lg font-medium text-white/90 hover:text-gold-400 border-b border-white/10 transition-colors">
                    <i class="fas fa-user-lock w-6 text-gold-500/60"></i> Área do Cliente
                </a>
            </div>

            <div class="mt-auto">
                @if(!empty($configuracoes->phone))
                    <a href="tel:{{ $configuracoes->phone }}" class="flex items-center gap-3 text-white/70 hover:text-white py-2">
                        <i class="fas fa-phone text-gold-500"></i> {{ $configuracoes->phone }}
                    </a>
                @endif
                @if(!empty($configuracoes->whatsapp))
                    <a href="{{ getNumZap($configuracoes->whatsapp, 'Atendimento ' . $configuracoes->app_name) }}" target="_blank" data-whatsapp
                        class="flex items-center gap-3 text-white/70 hover:text-green-400 py-2">
                        <i class="fab fa-whatsapp text-green-500 text-lg"></i> WhatsApp
                    </a>
                @endif

                <a href="{{ route('web.atendimento') }}" class="mt-4 flex items-center justify-center gap-2 w-full py-3 bg-gradient-to-r from-gold-500 to-gold-600 text-white font-semibold rounded-lg">
                    <i class="fas fa-headset"></i> Agendar Consulta
                </a>
            </div>
        </div>
    </div>

    {{-- Mobile Search --}}
    <div class="lg:hidden" x-show="searchOpen" x-transition
            @click.away="searchOpen = false">
        <div class="absolute top-full left-0 right-0 bg-white shadow-xl border-t border-gray-100 p-4">
            <form action="{{ route('web.pesquisa') }}" method="POST" class="flex gap-2">
                @csrf
                <input type="search" name="search" placeholder="Pesquisar no site..."
                        class="flex-1 px-4 py-3 border border-gray-200 rounded-lg text-sm focus:border-navy-500 focus:ring-2 focus:ring-navy-500/20">
                <button type="submit" class="px-6 py-3 bg-navy-700 text-white rounded-lg hover:bg-navy-800 transition-colors">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>
</header>
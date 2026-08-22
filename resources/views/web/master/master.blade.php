<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="language" content="{{ str_replace('_', '-', app()->getLocale()) }}">

    <meta name="author" content="{{ $configuracoes->app_name }}">
    <meta name="copyright" content="{{ $configuracoes->init_date }} {{ $configuracoes->app_name }}">
    <meta name="description" content="{{ $configuracoes->information }}">
    <meta name="url" content="{{ $configuracoes->domain }}">
    <meta name="title" content="{{ $configuracoes->app_name }}">
    <meta name="keywords" content="{{ $configuracoes->metatags }}">

    {!! $head ?? '' !!}

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ $configuracoes->getfaveicon() }}">
    <link rel="apple-touch-icon" href="{{ $configuracoes->getfaveicon() }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Vite CSS -->
    @vite('resources/css/frontend.css')

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('css')
        @yield('css')
    @endif
</head>

<body class="antialiased" x-data="{ mobileMenuOpen: false }">

    {{-- ============================== --}}
    {{-- HEADER / NAVIGATION            --}}
    {{-- ============================== --}}
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
            <div class="bg-navy-900 text-white/80 text-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-10">
                        <div class="flex items-center gap-6">
                            @if(!empty($configuracoes->email))
                                <a href="mailto:{{ $configuracoes->email }}" class="flex items-center gap-2 hover:text-gold-400 transition-colors">
                                    <i class="fas fa-envelope text-gold-500 text-xs"></i>
                                    <span>{{ $configuracoes->email }}</span>
                                </a>
                            @endif
                            @if(!empty($configuracoes->phone))
                                <a href="tel:{{ $configuracoes->phone }}" class="flex items-center gap-2 hover:text-gold-400 transition-colors">
                                    <i class="fas fa-phone text-gold-500 text-xs"></i>
                                    <span>{{ $configuracoes->phone }}</span>
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
                                <a href="{{ getNumZap($configuracoes->whatsapp, 'Atendimento ' . $configuracoes->app_name) }}" target="_blank" class="hover:text-green-400 transition-colors"><i class="fab fa-whatsapp"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Navigation --}}
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                {{-- Logo --}}
                <a href="{{ route('web.home') }}" class="flex-shrink-0">
                    @if(!empty($configuracoes->getlogo()))
                        <img src="{{ $configuracoes->getlogo() }}" alt="{{ $configuracoes->app_name }}" class="h-12 w-auto">
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
                    <a href="{{ route('web.home') }}#about-us"
                       class="px-4 py-2 text-sm font-medium rounded transition-all duration-200 {{ request()->routeIs('web.home') ? 'text-gold-500' : '' }}"
                       :class="scrolled ? 'text-navy-700 hover:text-gold-600 hover:bg-gold-50' : 'text-white/90 hover:text-white hover:bg-white/10'">
                        Escritório
                    </a>
                    <a href="{{ route('web.servicos') }}"
                       class="px-4 py-2 text-sm font-medium rounded transition-all duration-200 {{ request()->routeIs('web.servico*') ? 'text-gold-500' : '' }}"
                       :class="scrolled ? 'text-navy-700 hover:text-gold-600 hover:bg-gold-50' : 'text-white/90 hover:text-white hover:bg-white/10'">
                        Áreas de Atuação
                    </a>
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
             @click.away="mobileMenuOpen = false">
            <div class="fixed inset-0 bg-navy-900/95 backdrop-blur-md z-40 flex flex-col pt-24 pb-8 px-6">
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
                        <a href="{{ getNumZap($configuracoes->whatsapp, 'Atendimento ' . $configuracoes->app_name) }}" target="_blank"
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

    {{-- ============================== --}}
    {{-- MAIN CONTENT                   --}}
    {{-- ============================== --}}
    <main>
        @yield('content')
    </main>

    {{-- ============================== --}}
    {{-- FOOTER                         --}}
    {{-- ============================== --}}
    <footer class="bg-navy-950 text-white">
        {{-- Main Footer --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">

                {{-- Brand --}}
                <div class="lg:col-span-1">
                    @if(!empty($configuracoes->getlogo()))
                        <img src="{{ $configuracoes->getlogo() }}" alt="{{ $configuracoes->app_name }}" class="h-14 w-auto mb-6 brightness-0 invert">
                    @else
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 bg-navy-700 rounded-lg flex items-center justify-center">
                                <i class="fas fa-balance-scale text-gold-500 text-xl"></i>
                            </div>
                            <span class="font-heading text-xl font-bold text-white">{{ $configuracoes->app_name }}</span>
                        </div>
                    @endif
                    <p class="text-white/50 text-sm leading-relaxed mb-6">{{ $configuracoes->information }}</p>

                    {{-- Social --}}
                    <div class="flex items-center gap-3">
                        @if(!empty($configuracoes->facebook))
                            <a href="{{ $configuracoes->facebook }}" target="_blank"
                               class="w-10 h-10 rounded-lg bg-white/5 hover:bg-gold-500 flex items-center justify-center transition-all duration-300 text-white/60 hover:text-white">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif
                        @if(!empty($configuracoes->instagram))
                            <a href="{{ $configuracoes->instagram }}" target="_blank"
                               class="w-10 h-10 rounded-lg bg-white/5 hover:bg-gold-500 flex items-center justify-center transition-all duration-300 text-white/60 hover:text-white">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif
                        @if(!empty($configuracoes->linkedin))
                            <a href="{{ $configuracoes->linkedin }}" target="_blank"
                               class="w-10 h-10 rounded-lg bg-white/5 hover:bg-gold-500 flex items-center justify-center transition-all duration-300 text-white/60 hover:text-white">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        @endif
                        @if(!empty($configuracoes->youtube))
                            <a href="{{ $configuracoes->youtube }}" target="_blank"
                               class="w-10 h-10 rounded-lg bg-white/5 hover:bg-gold-500 flex items-center justify-center transition-all duration-300 text-white/60 hover:text-white">
                                <i class="fab fa-youtube"></i>
                            </a>
                        @endif
                    </div>
                </div>

                {{-- Links Rápidos --}}
                <div>
                    <h4 class="font-heading text-lg font-bold mb-6 relative">
                        Links Rápidos
                        <span class="block w-8 h-0.5 bg-gold-500 mt-3"></span>
                    </h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('web.home') }}" class="text-white/50 hover:text-gold-400 transition-colors text-sm flex items-center gap-2">
                                <i class="fas fa-chevron-right text-[10px] text-gold-500/40"></i> Início
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('web.home') }}#about-us" class="text-white/50 hover:text-gold-400 transition-colors text-sm flex items-center gap-2">
                                <i class="fas fa-chevron-right text-[10px] text-gold-500/40"></i> Escritório
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('web.servicos') }}" class="text-white/50 hover:text-gold-400 transition-colors text-sm flex items-center gap-2">
                                <i class="fas fa-chevron-right text-[10px] text-gold-500/40"></i> Áreas de Atuação
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('web.blog.artigos') }}" class="text-white/50 hover:text-gold-400 transition-colors text-sm flex items-center gap-2">
                                <i class="fas fa-chevron-right text-[10px] text-gold-500/40"></i> Blog
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('web.atendimento') }}" class="text-white/50 hover:text-gold-400 transition-colors text-sm flex items-center gap-2">
                                <i class="fas fa-chevron-right text-[10px] text-gold-500/40"></i> Atendimento
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Área do Cliente --}}
                <div>
                    <h4 class="font-heading text-lg font-bold mb-6 relative">
                        Área do Cliente
                        <span class="block w-8 h-0.5 bg-gold-500 mt-3"></span>
                    </h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="/cliente" class="text-white/50 hover:text-gold-400 transition-colors text-sm flex items-center gap-2">
                                <i class="fas fa-chevron-right text-[10px] text-gold-500/40"></i> Minha Conta
                            </a>
                        </li>
                        <li>
                            <a href="/cliente/processos" class="text-white/50 hover:text-gold-400 transition-colors text-sm flex items-center gap-2">
                                <i class="fas fa-chevron-right text-[10px] text-gold-500/40"></i> Acompanhar Processos
                            </a>
                        </li>
                        <li>
                            <a href="/cliente/documentos" class="text-white/50 hover:text-gold-400 transition-colors text-sm flex items-center gap-2">
                                <i class="fas fa-chevron-right text-[10px] text-gold-500/40"></i> Enviar Documentos
                            </a>
                        </li>
                        <li>
                            <a href="/cliente/mensagens" class="text-white/50 hover:text-gold-400 transition-colors text-sm flex items-center gap-2">
                                <i class="fas fa-chevron-right text-[10px] text-gold-500/40"></i> Mensagens
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- Contato --}}
                <div>
                    <h4 class="font-heading text-lg font-bold mb-6 relative">
                        Contato
                        <span class="block w-8 h-0.5 bg-gold-500 mt-3"></span>
                    </h4>
                    <ul class="space-y-4">
                        @if(!empty($configuracoes->phone))
                            <li class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded bg-gold-500/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <i class="fas fa-phone text-gold-500 text-xs"></i>
                                </div>
                                <div>
                                    <p class="text-white/40 text-xs uppercase tracking-wider mb-1">Telefone</p>
                                    <a href="tel:{{ $configuracoes->phone }}" class="text-white/70 hover:text-white transition-colors text-sm">{{ $configuracoes->phone }}</a>
                                </div>
                            </li>
                        @endif
                        @if(!empty($configuracoes->whatsapp))
                            <li class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded bg-green-500/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <i class="fab fa-whatsapp text-green-400 text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-white/40 text-xs uppercase tracking-wider mb-1">WhatsApp</p>
                                    <a href="{{ getNumZap($configuracoes->whatsapp, 'Atendimento ' . $configuracoes->app_name) }}" target="_blank"
                                       class="text-white/70 hover:text-green-400 transition-colors text-sm">{{ $configuracoes->whatsapp }}</a>
                                </div>
                            </li>
                        @endif
                        @if(!empty($configuracoes->email))
                            <li class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded bg-gold-500/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <i class="fas fa-envelope text-gold-500 text-xs"></i>
                                </div>
                                <div>
                                    <p class="text-white/40 text-xs uppercase tracking-wider mb-1">E-mail</p>
                                    <a href="mailto:{{ $configuracoes->email }}" class="text-white/70 hover:text-white transition-colors text-sm break-all">{{ $configuracoes->email }}</a>
                                </div>
                            </li>
                        @endif
                        @if(!empty($configuracoes->street))
                            <li class="flex items-start gap-3">
                                <div class="w-8 h-8 rounded bg-gold-500/10 flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <i class="fas fa-map-marker-alt text-gold-500 text-xs"></i>
                                </div>
                                <div>
                                    <p class="text-white/40 text-xs uppercase tracking-wider mb-1">Endereço</p>
                                    <p class="text-white/70 text-sm leading-relaxed">
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
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <p class="text-white/30 text-sm">
                        &copy; {{ $configuracoes->init_date }} {{ $configuracoes->app_name }} — Todos os direitos reservados.
                    </p>
                    <div class="flex items-center gap-6">
                        <a href="{{ route('web.politica-de-privacidade') }}" class="text-white/30 hover:text-white/60 text-sm transition-colors">
                            Política de Privacidade
                        </a>
                        <span class="text-white/10">|</span>
                        <span class="text-white/20 text-sm">
                            Feito com <i class="fas fa-heart text-red-400/60 text-xs"></i> por
                            <a href="https://informaticalivre.com" target="_blank" class="hover:text-gold-400 transition-colors">Informática Livre</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    {{-- Scroll to Top --}}
    <button x-data="{ show: false }"
            @scroll.window="show = window.scrollY > 400"
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-4"
            @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
            class="fixed bottom-8 right-8 z-50 w-12 h-12 bg-navy-700 hover:bg-navy-800 text-white rounded-full shadow-xl shadow-navy-900/30 flex items-center justify-center transition-all duration-300 hover:-translate-y-1"
            aria-label="Voltar ao topo">
        <i class="fas fa-arrow-up"></i>
    </button>

    {{-- WhatsApp Float --}}
    @if(!empty($configuracoes->whatsapp))
        <a href="{{ getNumZap($configuracoes->whatsapp, 'Atendimento ' . $configuracoes->app_name) }}"
           target="_blank"
           class="fixed bottom-8 left-8 z-50 w-14 h-14 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-xl shadow-green-500/30 flex items-center justify-center transition-all duration-300 hover:scale-110 animate-float"
           aria-label="WhatsApp">
            <i class="fab fa-whatsapp text-2xl"></i>
        </a>
    @endif

    {{-- Scripts --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @hasSection('js')
        @yield('js')
    @endif

    {{-- Scroll Reveal --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const reveals = document.querySelectorAll('.reveal');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                    }
                });
            }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

            reveals.forEach(el => observer.observe(el));
        });
    </script>

    {{-- Google Analytics --}}
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-G390M0E6LG"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-G390M0E6LG');
    </script>
</body>
</html>

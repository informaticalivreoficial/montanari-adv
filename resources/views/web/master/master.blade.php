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
    @include('web.master.header')

    {{-- ============================== --}}
    {{-- MAIN CONTENT                   --}}
    {{-- ============================== --}}
    <main>
        @yield('content')
    </main>

    {{-- ============================== --}}
    {{-- FOOTER                         --}}
    {{-- ============================== --}}
    @include('web.master.footer')

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
           target="_blank" data-whatsapp
           class="fixed bottom-8 left-8 z-50 w-14 h-14 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-xl shadow-green-500/30 flex items-center justify-center transition-all duration-300 hover:scale-110 animate-float"
           aria-label="WhatsApp">
            <i class="fab fa-whatsapp text-2xl"></i>
        </a>
    @endif

    {{-- Scripts --}}
    @vite(['resources/js/frontend.js'])

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

<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? 'Área do Cliente' }} - Montanari Advocacia</title>

        @vite(['resources/js/app.js'])
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <style>
            body { font-family: 'Inter', system-ui, -apple-system, sans-serif; }
        </style>
    </head>
    <body class="bg-gray-50 min-h-screen">
        <div x-data="{ sidebarOpen: false }" class="flex min-h-screen">

            {{-- Overlay mobile --}}
            <div
                x-show="sidebarOpen"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                x-on:click="sidebarOpen = false"
                class="fixed inset-0 z-40 bg-gray-900/50 backdrop-blur-sm lg:hidden"
            ></div>

            {{-- Sidebar --}}
            <aside
                x-show="sidebarOpen"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="-translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="-translate-x-full"
                x-cloak
                class="fixed inset-y-0 left-0 z-50 w-72 bg-white shadow-xl flex flex-col border-r border-gray-200
                       lg:static lg:translate-x-0 lg:shadow-md"
            >
                {{-- Logo --}}
                <div class="px-6 py-5 border-b border-gray-200 flex items-center justify-between">
                    <a href="{{ route('client.dashboard') }}" class="block">
                        <img
                            src="{{ $configuracoes->getlogo() }}"
                            alt="Montanari Advocacia"
                            class="h-10 w-auto"
                        >
                    </a>
                    <button
                        x-on:click="sidebarOpen = false"
                        class="lg:hidden p-1.5 rounded-lg text-gray-400 hover:bg-gray-100 hover:text-gray-600 transition"
                    >
                        <i class="fa-solid fa-times text-lg"></i>
                    </button>
                </div>

                {{-- User Info --}}
                <div class="px-6 py-4 border-b border-gray-100">
                    <a href="{{ route('client.profile') }}" class="flex items-center gap-3 group">
                        @if(auth()->user()->avatar)
                            <img
                                src="{{ Storage::url(auth()->user()->avatar) }}"
                                alt="{{ auth()->user()->name }}"
                                class="w-10 h-10 rounded-full object-cover ring-2 ring-gray-200 group-hover:ring-blue-300 transition"
                            >
                        @else
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center group-hover:bg-blue-200 transition">
                                <span class="text-blue-600 font-semibold text-sm">
                                    {{ strtoupper(substr(auth()->user()->name ?? 'C', 0, 1)) }}
                                </span>
                            </div>
                        @endif
                        <div>
                            <p class="text-sm font-semibold text-gray-800 group-hover:text-blue-600 transition">{{ auth()->user()->name ?? '' }}</p>
                            <p class="text-xs text-gray-500">{{ auth()->user()->email ?? '' }}</p>
                        </div>
                    </a>
                </div>

                {{-- Navigation --}}
                <nav class="flex-1 px-3 py-4 space-y-1 text-sm overflow-y-auto">
                    <a href="{{ route('client.dashboard') }}"
                       x-on:click="sidebarOpen = false"
                       class="flex items-center px-3 py-2.5 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('client.dashboard') ? 'bg-blue-50 text-blue-600 font-semibold' : '' }}">
                        <i class="fa-solid fa-gauge mr-3 w-5 text-center"></i> Dashboard
                    </a>

                    <a href="{{ route('client.processes') }}"
                       x-on:click="sidebarOpen = false"
                       class="flex items-center px-3 py-2.5 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('client.processes*') ? 'bg-blue-50 text-blue-600 font-semibold' : '' }}">
                        <i class="fa-solid fa-scale-balanced mr-3 w-5 text-center"></i> Meus Processos
                    </a>

                    <a href="{{ route('client.deadlines') }}"
                       x-on:click="sidebarOpen = false"
                       class="flex items-center px-3 py-2.5 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('client.deadlines') ? 'bg-blue-50 text-blue-600 font-semibold' : '' }}">
                        <i class="fa-solid fa-clock mr-3 w-5 text-center"></i> Prazos
                    </a>

                    <a href="{{ route('client.documents') }}"
                       x-on:click="sidebarOpen = false"
                       class="flex items-center px-3 py-2.5 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('client.documents*') ? 'bg-blue-50 text-blue-600 font-semibold' : '' }}">
                        <i class="fa-solid fa-file-arrow-up mr-3 w-5 text-center"></i> Documentos
                    </a>

                    <a href="{{ route('client.messages') }}"
                       x-on:click="sidebarOpen = false"
                       class="flex items-center px-3 py-2.5 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('client.messages') ? 'bg-blue-50 text-blue-600 font-semibold' : '' }}">
                        <i class="fa-solid fa-comments mr-3 w-5 text-center"></i> Mensagens
                    </a>

                    <div class="my-2 border-t border-gray-100"></div>

                    <a href="{{ route('client.profile') }}"
                       x-on:click="sidebarOpen = false"
                       class="flex items-center px-3 py-2.5 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('client.profile*') ? 'bg-blue-50 text-blue-600 font-semibold' : '' }}">
                        <i class="fa-solid fa-user-pen mr-3 w-5 text-center"></i> Meu Perfil
                    </a>
                </nav>

                {{-- Footer --}}
                <div class="px-3 py-4 border-t border-gray-200 space-y-1">
                    <a href="/" x-on:click="sidebarOpen = false" class="flex items-center px-3 py-2 rounded-lg text-gray-600 hover:bg-gray-100 transition text-sm">
                        <i class="fa-solid fa-arrow-left mr-3 w-5 text-center"></i> Voltar ao Site
                    </a>
                    <form method="POST" action="{{ route('client.logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center px-3 py-2 w-full text-left rounded-lg text-red-600 hover:bg-red-50 transition text-sm">
                            <i class="fa-solid fa-right-from-bracket mr-3 w-5 text-center"></i> Sair
                        </button>
                    </form>
                </div>
            </aside>

            {{-- Main Content --}}
            <div class="flex-1 flex flex-col min-w-0">
                {{-- Header --}}
                <header class="bg-white shadow-sm px-4 sm:px-6 py-3 sm:py-4 flex items-center justify-between border-b border-gray-200 sticky top-0 z-30">
                    <div class="flex items-center gap-3">
                        {{-- Hamburger mobile --}}
                        <button
                            x-on:click="sidebarOpen = true"
                            class="lg:hidden p-2 rounded-lg text-gray-500 hover:bg-gray-100 hover:text-gray-700 transition"
                        >
                            <i class="fa-solid fa-bars text-lg"></i>
                        </button>
                        <h2 class="text-lg sm:text-xl font-semibold text-gray-800">{{ $title ?? 'Dashboard' }}</h2>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="text-sm text-gray-500 hidden sm:inline">{{ now()->format('d/m/Y') }}</span>
                        <a href="{{ route('client.profile') }}">
                            @if(auth()->user()->avatar)
                                <img
                                    src="{{ Storage::url(auth()->user()->avatar) }}"
                                    alt="{{ auth()->user()->name }}"
                                    class="w-8 h-8 rounded-full object-cover ring-2 ring-gray-200 hover:ring-blue-300 transition"
                                >
                            @else
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center hover:bg-blue-200 transition">
                                    <span class="text-blue-600 font-semibold text-xs">
                                        {{ strtoupper(substr(auth()->user()->name ?? 'C', 0, 1)) }}
                                    </span>
                                </div>
                            @endif
                        </a>
                    </div>
                </header>

                {{-- Content --}}
                <main class="flex-1 p-4 sm:p-6 overflow-y-auto">
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">
                            <i class="fa-solid fa-check-circle mr-2"></i>{{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm">
                            <i class="fa-solid fa-exclamation-circle mr-2"></i>{{ session('error') }}
                        </div>
                    @endif

                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>

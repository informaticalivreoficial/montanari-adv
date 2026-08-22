<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Montanari Adv - Painel</title>

        @vite(['resources/js/app.js'])
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body class="bg-gray-100">
        <div class="flex min-h-screen">
            <!-- Sidebar -->
            <aside class="w-64 bg-white shadow-md flex flex-col">
                <div class="px-6 py-5 border-b border-gray-200">
                    <h1 class="text-lg font-bold text-gray-800">Montanari Adv</h1>
                    <p class="text-xs text-gray-500">Painel Administrativo</p>
                </div>
                <nav class="flex-1 px-3 py-4 space-y-1 text-sm">
                    <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 rounded text-gray-700 hover:bg-gray-100 {{ request()->routeIs('dashboard') ? 'bg-gray-100 font-semibold' : '' }}">
                        <i class="fa-solid fa-gauge mr-2"></i> Dashboard
                    </a>

                    <div class="pt-3 pb-1 px-3">
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Conta</p>
                    </div>

                    <a href="{{ route('dashboard.profile') }}" class="flex items-center px-3 py-2 rounded text-gray-700 hover:bg-gray-100 {{ request()->routeIs('dashboard.profile') ? 'bg-gray-100 font-semibold' : '' }}">
                        <i class="fa-solid fa-user-circle mr-2"></i> Meu Perfil
                    </a>

                    <div class="pt-3 pb-1 px-3">
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Gestão</p>
                    </div>

                    <a href="{{ route('dashboard.users') }}" class="flex items-center px-3 py-2 rounded text-gray-700 hover:bg-gray-100 {{ request()->routeIs('dashboard.users*') ? 'bg-gray-100 font-semibold' : '' }}">
                        <i class="fa-solid fa-users mr-2"></i> Usuários
                    </a>

                    <div class="pt-3 pb-1 px-3">
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Jurídico</p>
                    </div>

                    <a href="{{ route('dashboard.legal.processes') }}" class="flex items-center px-3 py-2 rounded text-gray-700 hover:bg-gray-100 {{ request()->routeIs('dashboard.legal.processes*') ? 'bg-gray-100 font-semibold' : '' }}">
                        <i class="fa-solid fa-scale-balanced mr-2"></i> Processos
                    </a>
                    <a href="{{ route('dashboard.legal.deadlines') }}" class="flex items-center px-3 py-2 rounded text-gray-700 hover:bg-gray-100 {{ request()->routeIs('dashboard.legal.deadlines*') ? 'bg-gray-100 font-semibold' : '' }}">
                        <i class="fa-solid fa-clock mr-2"></i> Prazos
                    </a>
                    <a href="{{ route('dashboard.legal.tasks') }}" class="flex items-center px-3 py-2 rounded text-gray-700 hover:bg-gray-100 {{ request()->routeIs('dashboard.legal.tasks*') ? 'bg-gray-100 font-semibold' : '' }}">
                        <i class="fa-solid fa-list-check mr-2"></i> Tarefas
                    </a>
                    <a href="{{ route('dashboard.legal.agenda') }}" class="flex items-center px-3 py-2 rounded text-gray-700 hover:bg-gray-100 {{ request()->routeIs('dashboard.legal.agenda') ? 'bg-gray-100 font-semibold' : '' }}">
                        <i class="fa-solid fa-calendar-days mr-2"></i> Agenda
                    </a>
                    <a href="{{ route('dashboard.legal.documents') }}" class="flex items-center px-3 py-2 rounded text-gray-700 hover:bg-gray-100 {{ request()->routeIs('dashboard.legal.documents') ? 'bg-gray-100 font-semibold' : '' }}">
                        <i class="fa-solid fa-file-lines mr-2"></i> Documentos
                    </a>

                    <div class="pt-3 pb-1 px-3">
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Conteúdo</p>
                    </div>

                    <a href="{{ route('dashboard.posts.articles') }}" class="flex items-center px-3 py-2 rounded text-gray-700 hover:bg-gray-100 {{ request()->routeIs('dashboard.posts.articles*') ? 'bg-gray-100 font-semibold' : '' }}">
                        <i class="fa-solid fa-newspaper mr-2"></i> Artigos
                    </a>
                    <a href="{{ route('dashboard.posts.pages') }}" class="flex items-center px-3 py-2 rounded text-gray-700 hover:bg-gray-100 {{ request()->routeIs('dashboard.posts.pages*') ? 'bg-gray-100 font-semibold' : '' }}">
                        <i class="fa-solid fa-file-lines mr-2"></i> Páginas
                    </a>
                    <a href="{{ route('dashboard.posts.categories') }}" class="flex items-center px-3 py-2 rounded text-gray-700 hover:bg-gray-100 {{ request()->routeIs('dashboard.posts.categories*') ? 'bg-gray-100 font-semibold' : '' }}">
                        <i class="fa-solid fa-folder mr-2"></i> Categorias
                    </a>

                    <div class="pt-3 pb-1 px-3">
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Sistema</p>
                    </div>

                    <a href="{{ route('dashboard.config') }}" class="flex items-center px-3 py-2 rounded text-gray-700 hover:bg-gray-100 {{ request()->routeIs('dashboard.config') ? 'bg-gray-100 font-semibold' : '' }}">
                        <i class="fa-solid fa-gear mr-2"></i> Configurações
                    </a>
                    <a href="{{ route('dashboard.permissions') }}" class="flex items-center px-3 py-2 rounded text-gray-700 hover:bg-gray-100 {{ request()->routeIs('dashboard.permissions') ? 'bg-gray-100 font-semibold' : '' }}">
                        <i class="fa-solid fa-shield-halved mr-2"></i> Permissões
                    </a>
                    <a href="{{ route('dashboard.analytics') }}" class="flex items-center px-3 py-2 rounded text-gray-700 hover:bg-gray-100 {{ request()->routeIs('dashboard.analytics') ? 'bg-gray-100 font-semibold' : '' }}">
                        <i class="fa-solid fa-chart-simple mr-2"></i> Analytics
                    </a>
                </nav>
                <div class="px-3 py-4 border-t border-gray-200">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center px-3 py-2 w-full text-left rounded text-red-600 hover:bg-red-50">
                            <i class="fa-solid fa-right-from-bracket mr-2"></i> Sair
                        </button>
                    </form>
                </div>
            </aside>

            <!-- Main -->
            <div class="flex-1 flex flex-col">
                <header class="bg-white shadow-sm px-6 py-4 flex items-center justify-between border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $title ?? 'Painel' }}</h2>
                    <div class="flex items-center gap-4">
                        {{-- Ver Site --}}
                        <a href="{{ url('/') }}" target="_blank"
                           class="flex items-center gap-2 px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition"
                           title="Ver site">
                            <i class="fa-solid fa-external-link-alt"></i>
                            <span class="hidden sm:inline">Ver Site</span>
                        </a>

                        {{-- Avatar + Menu --}}
                        <div class="relative" x-data="{ open: false }" @click.away="open = false">
                            <button @click="open = !open" class="flex items-center gap-2 focus:outline-none">
                                @if(auth()->user()->url_avatar)
                                    <img src="{{ auth()->user()->url_avatar }}" 
                                         alt="{{ auth()->user()->name }}"
                                         class="w-9 h-9 rounded-full object-cover ring-2 ring-gray-200">
                                @else
                                    <div class="w-9 h-9 rounded-full bg-blue-100 flex items-center justify-center ring-2 ring-gray-200">
                                        <span class="text-blue-600 font-semibold text-sm">
                                            {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                                        </span>
                                    </div>
                                @endif
                                <i class="fa-solid fa-chevron-down text-gray-400 text-xs transition" :class="open ? 'rotate-180' : ''"></i>
                            </button>

                            {{-- Dropdown --}}
                            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                                 class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-lg border border-gray-100 py-2 z-50">
                                {{-- User Info --}}
                                <div class="px-4 py-3 border-b border-gray-100">
                                    <p class="text-sm font-semibold text-gray-800">{{ auth()->user()->name ?? '' }}</p>
                                    <p class="text-xs text-gray-500 mt-0.5">{{ auth()->user()->email ?? '' }}</p>
                                </div>

                                {{-- Menu Items --}}
                                <a href="{{ route('dashboard.profile') }}" 
                                   class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition">
                                    <i class="fa-solid fa-user-circle w-5 text-center text-gray-400"></i> Meu Perfil
                                </a>
                                <a href="{{ url('/') }}" target="_blank"
                                   class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition">
                                    <i class="fa-solid fa-globe w-5 text-center text-gray-400"></i> Ver Site
                                </a>
                                <div class="border-t border-gray-100 my-1"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-3 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 w-full transition">
                                        <i class="fa-solid fa-right-from-bracket w-5 text-center"></i> Sair
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </header>
                <main class="flex-1 p-6 overflow-y-auto">
                    {{ $slot }}
                </main>
            </div>
        </div>

        {{-- Alerts via SweetAlert2 --}}
        <script>
            // Livewire v4: $this->dispatch() dispara browser CustomEvent
            // MontanariAlert é o wrapper global do SweetAlert2
            window.addEventListener('swal:fire', function(e) {
                var data = e.detail;
                if (Array.isArray(data)) data = data[0];
                if (typeof data === 'string') {
                    MontanariAlert.success(data);
                } else {
                    MontanariAlert[data.icon || 'success'](
                        data.title || data.message || '',
                        data
                    );
                }
            });
            window.addEventListener('swal:confirm', function(e) {
                var data = e.detail;
                if (Array.isArray(data)) data = data[0];
                MontanariAlert.confirm(data).then(function(result) {
                    if (result.isConfirmed && data.method) {
                        Livewire.find(data.componentId || '').call(data.method, ...(data.params || []));
                    }
                });
            });

            // Session flash (funciona em redirects e page loads)
            @if(session('toast_success'))
                document.addEventListener('DOMContentLoaded', function() {
                    MontanariAlert.success(@js(session('toast_success')));
                });
            @endif
            @if(session('toast_error'))
                document.addEventListener('DOMContentLoaded', function() {
                    MontanariAlert.error(@js(session('toast_error')));
                });
            @endif
            @if(session('toast_warning'))
                document.addEventListener('DOMContentLoaded', function() {
                    MontanariAlert.warning(@js(session('toast_warning')));
                });
            @endif
        </script>
    </body>
</html>

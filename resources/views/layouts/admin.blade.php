<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Montanari Adv - Painel</title>

        @vite(['resources/js/app.js'])
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body class="bg-gray-100 antialiased"
          x-data="{ mobileOpen: false, desktopExpanded: false }"
          :class="mobileOpen ? 'overflow-hidden' : ''">
        <div class="flex min-h-screen">

            <!-- Sidebar -->
            <aside
                class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-xl flex flex-col transition-transform duration-300 ease-in-out lg:static lg:translate-x-0 lg:z-auto lg:shadow-md lg:transition-[width] lg:duration-200"
                :class="{
                    '-translate-x-full': !mobileOpen,
                    'translate-x-0': mobileOpen,
                    'lg:translate-x-0': true,
                    'lg:w-64': desktopExpanded,
                    'lg:w-20': !desktopExpanded,
                }"
                @mouseenter="desktopExpanded = true"
                @mouseleave="desktopExpanded = false">

                <!-- Marca -->
                <div class="px-5 py-5 border-b border-gray-200 flex items-center gap-2"
                     :class="!desktopExpanded ? 'lg:justify-center' : ''">
                    <i class="fa-solid fa-scale-balanced text-blue-600 text-2xl shrink-0"></i>
                    <div class="min-w-0 flex-1" :class="!desktopExpanded ? 'lg:hidden' : ''">
                        <h1 class="text-base font-bold text-gray-800 truncate">Montanari Adv</h1>
                        <p class="text-[11px] text-gray-500 truncate">Painel Administrativo</p>
                    </div>
                    <button class="lg:hidden -mr-1 p-1 text-gray-400 hover:text-gray-700 rounded-lg"
                            @click="mobileOpen = false" aria-label="Fechar menu">
                        <i class="fa-solid fa-xmark text-lg"></i>
                    </button>
                </div>

                <!-- Navegação -->
                <nav class="flex-1 px-3 py-4 space-y-1 text-sm overflow-y-auto">

                    <a href="{{ route('dashboard') }}"
                       title="Dashboard"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors {{ request()->routeIs('dashboard') ? 'bg-gray-100 font-semibold text-gray-900' : '' }}"
                       :class="!desktopExpanded ? 'lg:justify-center lg:px-0' : ''">
                        <i class="fa-solid fa-gauge shrink-0 w-5 text-center"></i>
                        <span class="whitespace-nowrap" :class="!desktopExpanded ? 'lg:hidden' : ''">Dashboard</span>
                    </a>

                    <div class="px-3 pt-4 pb-1" :class="!desktopExpanded ? 'lg:hidden' : ''">
                        <p class="text-[11px] font-semibold uppercase tracking-wider text-gray-400">Conta</p>
                    </div>

                    <a href="{{ route('dashboard.profile') }}"
                       title="Meu Perfil"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors {{ request()->routeIs('dashboard.profile') ? 'bg-gray-100 font-semibold text-gray-900' : '' }}"
                       :class="!desktopExpanded ? 'lg:justify-center lg:px-0' : ''">
                        <i class="fa-solid fa-user-circle shrink-0 w-5 text-center"></i>
                        <span class="whitespace-nowrap" :class="!desktopExpanded ? 'lg:hidden' : ''">Meu Perfil</span>
                    </a>

                    <div class="px-3 pt-4 pb-1" :class="!desktopExpanded ? 'lg:hidden' : ''">
                        <p class="text-[11px] font-semibold uppercase tracking-wider text-gray-400">Gestão</p>
                    </div>

                    <a href="{{ route('dashboard.users') }}"
                       title="Usuários"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors {{ request()->routeIs('dashboard.users*') ? 'bg-gray-100 font-semibold text-gray-900' : '' }}"
                       :class="!desktopExpanded ? 'lg:justify-center lg:px-0' : ''">
                        <i class="fa-solid fa-users shrink-0 w-5 text-center"></i>
                        <span class="whitespace-nowrap" :class="!desktopExpanded ? 'lg:hidden' : ''">Usuários</span>
                    </a>

                    <div class="px-3 pt-4 pb-1" :class="!desktopExpanded ? 'lg:hidden' : ''">
                        <p class="text-[11px] font-semibold uppercase tracking-wider text-gray-400">Jurídico</p>
                    </div>

                    <a href="{{ route('dashboard.legal.processes') }}"
                       title="Processos"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors {{ request()->routeIs('dashboard.legal.processes*') ? 'bg-gray-100 font-semibold text-gray-900' : '' }}"
                       :class="!desktopExpanded ? 'lg:justify-center lg:px-0' : ''">
                        <i class="fa-solid fa-scale-balanced shrink-0 w-5 text-center"></i>
                        <span class="whitespace-nowrap" :class="!desktopExpanded ? 'lg:hidden' : ''">Processos</span>
                    </a>
                    <a href="{{ route('dashboard.legal.deadlines') }}"
                       title="Prazos"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors {{ request()->routeIs('dashboard.legal.deadlines*') ? 'bg-gray-100 font-semibold text-gray-900' : '' }}"
                       :class="!desktopExpanded ? 'lg:justify-center lg:px-0' : ''">
                        <i class="fa-solid fa-clock shrink-0 w-5 text-center"></i>
                        <span class="whitespace-nowrap" :class="!desktopExpanded ? 'lg:hidden' : ''">Prazos</span>
                    </a>
                    <a href="{{ route('dashboard.legal.tasks') }}"
                       title="Tarefas"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors {{ request()->routeIs('dashboard.legal.tasks*') ? 'bg-gray-100 font-semibold text-gray-900' : '' }}"
                       :class="!desktopExpanded ? 'lg:justify-center lg:px-0' : ''">
                        <i class="fa-solid fa-list-check shrink-0 w-5 text-center"></i>
                        <span class="whitespace-nowrap" :class="!desktopExpanded ? 'lg:hidden' : ''">Tarefas</span>
                    </a>
                    <a href="{{ route('dashboard.legal.agenda') }}"
                       title="Agenda"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors {{ request()->routeIs('dashboard.legal.agenda') ? 'bg-gray-100 font-semibold text-gray-900' : '' }}"
                       :class="!desktopExpanded ? 'lg:justify-center lg:px-0' : ''">
                        <i class="fa-solid fa-calendar-days shrink-0 w-5 text-center"></i>
                        <span class="whitespace-nowrap" :class="!desktopExpanded ? 'lg:hidden' : ''">Agenda</span>
                    </a>
                    <a href="{{ route('dashboard.legal.documents') }}"
                       title="Documentos"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors {{ request()->routeIs('dashboard.legal.documents') ? 'bg-gray-100 font-semibold text-gray-900' : '' }}"
                       :class="!desktopExpanded ? 'lg:justify-center lg:px-0' : ''">
                        <i class="fa-solid fa-file-lines shrink-0 w-5 text-center"></i>
                        <span class="whitespace-nowrap" :class="!desktopExpanded ? 'lg:hidden' : ''">Documentos</span>
                    </a>

                    <div class="px-3 pt-4 pb-1" :class="!desktopExpanded ? 'lg:hidden' : ''">
                        <p class="text-[11px] font-semibold uppercase tracking-wider text-gray-400">Conteúdo</p>
                    </div>

                    <a href="{{ route('dashboard.posts.articles') }}"
                       title="Artigos"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors {{ request()->routeIs('dashboard.posts.articles*') ? 'bg-gray-100 font-semibold text-gray-900' : '' }}"
                       :class="!desktopExpanded ? 'lg:justify-center lg:px-0' : ''">
                        <i class="fa-solid fa-newspaper shrink-0 w-5 text-center"></i>
                        <span class="whitespace-nowrap" :class="!desktopExpanded ? 'lg:hidden' : ''">Artigos</span>
                    </a>
                    <a href="{{ route('dashboard.posts.pages') }}"
                       title="Páginas"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors {{ request()->routeIs('dashboard.posts.pages*') ? 'bg-gray-100 font-semibold text-gray-900' : '' }}"
                       :class="!desktopExpanded ? 'lg:justify-center lg:px-0' : ''">
                        <i class="fa-solid fa-file-lines shrink-0 w-5 text-center"></i>
                        <span class="whitespace-nowrap" :class="!desktopExpanded ? 'lg:hidden' : ''">Páginas</span>
                    </a>
                    <a href="{{ route('dashboard.posts.categories') }}"
                       title="Categorias"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors {{ request()->routeIs('dashboard.posts.categories*') ? 'bg-gray-100 font-semibold text-gray-900' : '' }}"
                       :class="!desktopExpanded ? 'lg:justify-center lg:px-0' : ''">
                        <i class="fa-solid fa-folder shrink-0 w-5 text-center"></i>
                        <span class="whitespace-nowrap" :class="!desktopExpanded ? 'lg:hidden' : ''">Categorias</span>
                    </a>

                    <div class="px-3 pt-4 pb-1" :class="!desktopExpanded ? 'lg:hidden' : ''">
                        <p class="text-[11px] font-semibold uppercase tracking-wider text-gray-400">Sistema</p>
                    </div>

                    <a href="{{ route('dashboard.config') }}"
                       title="Configurações"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors {{ request()->routeIs('dashboard.config') ? 'bg-gray-100 font-semibold text-gray-900' : '' }}"
                       :class="!desktopExpanded ? 'lg:justify-center lg:px-0' : ''">
                        <i class="fa-solid fa-gear shrink-0 w-5 text-center"></i>
                        <span class="whitespace-nowrap" :class="!desktopExpanded ? 'lg:hidden' : ''">Configurações</span>
                    </a>
                    <a href="{{ route('dashboard.permissions') }}"
                       title="Permissões"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors {{ request()->routeIs('dashboard.permissions') ? 'bg-gray-100 font-semibold text-gray-900' : '' }}"
                       :class="!desktopExpanded ? 'lg:justify-center lg:px-0' : ''">
                        <i class="fa-solid fa-shield-halved shrink-0 w-5 text-center"></i>
                        <span class="whitespace-nowrap" :class="!desktopExpanded ? 'lg:hidden' : ''">Permissões</span>
                    </a>
                    <a href="{{ route('dashboard.analytics') }}"
                       title="Analytics"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors {{ request()->routeIs('dashboard.analytics') ? 'bg-gray-100 font-semibold text-gray-900' : '' }}"
                       :class="!desktopExpanded ? 'lg:justify-center lg:px-0' : ''">
                        <i class="fa-solid fa-chart-simple shrink-0 w-5 text-center"></i>
                        <span class="whitespace-nowrap" :class="!desktopExpanded ? 'lg:hidden' : ''">Analytics</span>
                    </a>
                </nav>

                <!-- Sair -->
                <div class="px-3 py-4 border-t border-gray-200">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                title="Sair"
                                class="flex items-center gap-3 px-3 py-2 w-full text-left rounded-lg text-red-600 hover:bg-red-50 transition-colors"
                                :class="!desktopExpanded ? 'lg:justify-center lg:px-0' : ''">
                            <i class="fa-solid fa-right-from-bracket shrink-0 w-5 text-center"></i>
                            <span class="whitespace-nowrap" :class="!desktopExpanded ? 'lg:hidden' : ''">Sair</span>
                        </button>
                    </form>
                </div>
            </aside>

            <!-- Backdrop mobile -->
            <div x-show="mobileOpen" x-cloak x-transition.opacity
                 @click="mobileOpen = false"
                 class="fixed inset-0 bg-gray-900/50 z-40 lg:hidden"></div>

            <!-- Conteúdo -->
            <div class="flex-1 flex flex-col min-w-0">
                <header class="bg-white shadow-sm border-b border-gray-200 px-4 sm:px-6 py-4 sticky top-0 z-30 flex items-center justify-between gap-4">
                    <div class="flex items-center gap-3 min-w-0">
                        <button class="lg:hidden -ml-1 p-2 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-gray-900"
                                @click="mobileOpen = true" aria-label="Abrir menu">
                            <i class="fa-solid fa-bars text-xl"></i>
                        </button>
                        <h2 class="text-lg sm:text-xl font-semibold text-gray-800 truncate">{{ $title ?? 'Painel' }}</h2>
                    </div>
                    <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                        {{-- Ver Site --}}
                        <a href="{{ url('/') }}" target="_blank"
                           class="flex items-center gap-2 px-3 py-2 text-sm text-gray-600 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition"
                           title="Ver site">
                            <i class="fa-solid fa-external-link-alt"></i>
                            <span class="hidden sm:inline">Ver Site</span>
                        </a>

                        {{-- Avatar + Menu --}}
                        <div class="relative" x-data="{ open: false }" @click.outside="open = false">
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
                            <div x-show="open" x-cloak
                                 x-transition:enter="transition ease-out duration-100"
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
                <main class="flex-1 p-4 sm:p-6 overflow-y-auto">
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

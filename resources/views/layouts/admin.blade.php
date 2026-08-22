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
                        <p class="text-xs font-semibold uppercase tracking-wider text-gray-400">Sistema</p>
                    </div>

                    <a href="{{ route('dashboard.config') }}" class="flex items-center px-3 py-2 rounded text-gray-700 hover:bg-gray-100 {{ request()->routeIs('dashboard.config') ? 'bg-gray-100 font-semibold' : '' }}">
                        <i class="fa-solid fa-gear mr-2"></i> Configurações
                    </a>
                    <a href="{{ route('dashboard.permissions') }}" class="flex items-center px-3 py-2 rounded text-gray-700 hover:bg-gray-100 {{ request()->routeIs('dashboard.permissions') ? 'bg-gray-100 font-semibold' : '' }}">
                        <i class="fa-solid fa-shield-halved mr-2"></i> Permissões
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
                    <span class="text-sm text-gray-600">{{ auth()->user()->name ?? '' }}</span>
                </header>
                <main class="flex-1 p-6 overflow-y-auto">
                    {{ $slot }}
                </main>
            </div>
        </div>

        {{-- Toast via Session Flash --}}
        @if(session('toast_success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    if (typeof MontanariToast !== 'undefined') {
                        MontanariToast.success('{{ session('toast_success') }}');
                    }
                });
            </script>
        @endif
        @if(session('toast_error'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    if (typeof MontanariToast !== 'undefined') {
                        MontanariToast.error('{{ session('toast_error') }}');
                    }
                });
            </script>
        @endif
        @if(session('toast_warning'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    if (typeof MontanariToast !== 'undefined') {
                        MontanariToast.warning('{{ session('toast_warning') }}');
                    }
                });
            </script>
        @endif
    </body>
</html>

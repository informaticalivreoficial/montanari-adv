<div>
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
        <p class="mt-1 text-sm text-gray-500">Visão geral do sistema.</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mb-6">
        <!-- Usuários -->
        <a href="{{ route('dashboard.users') }}" class="group">
            <x-card class="transition-all group-hover:shadow-md group-hover:-translate-y-0.5">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-100 text-amber-600">
                        <i class="fa-solid fa-users text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Usuários</p>
                        <p class="text-2xl font-bold text-gray-900">{{ \App\Models\User::count() }}</p>
                    </div>
                </div>
            </x-card>
        </a>

        <!-- Configurações -->
        <a href="{{ route('dashboard.config') }}" class="group">
            <x-card class="transition-all group-hover:shadow-md group-hover:-translate-y-0.5">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-blue-600">
                        <i class="fa-solid fa-gear text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Configurações</p>
                        <p class="text-lg font-semibold text-gray-900">Sistema</p>
                    </div>
                </div>
            </x-card>
        </a>

        <!-- Permissões -->
        <a href="{{ route('dashboard.permissions') }}" class="group">
            <x-card class="transition-all group-hover:shadow-md group-hover:-translate-y-0.5">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-green-100 text-green-600">
                        <i class="fa-solid fa-shield-halved text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500">Permissões</p>
                        <p class="text-lg font-semibold text-gray-900">Acessos</p>
                    </div>
                </div>
            </x-card>
        </a>
    </div>

    <!-- Quick Actions -->
    <x-card title="Ações Rápidas" icon="fa-bolt">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <a 
                href="{{ route('dashboard.users') }}" 
                class="flex items-center gap-3 rounded-lg border border-gray-200 p-4 transition hover:border-amber-300 hover:bg-amber-50"
            >
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-amber-100 text-amber-600">
                    <i class="fa-solid fa-user-plus"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">Novo Usuário</p>
                    <p class="text-xs text-gray-500">Criar novo usuário</p>
                </div>
            </a>

            <a 
                href="{{ route('dashboard.permissions') }}" 
                class="flex items-center gap-3 rounded-lg border border-gray-200 p-4 transition hover:border-green-300 hover:bg-green-50"
            >
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-green-100 text-green-600">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">Nova Função</p>
                    <p class="text-xs text-gray-500">Criar função de acesso</p>
                </div>
            </a>

            <a 
                href="{{ route('dashboard.config') }}" 
                class="flex items-center gap-3 rounded-lg border border-gray-200 p-4 transition hover:border-blue-300 hover:bg-blue-50"
            >
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-blue-600">
                    <i class="fa-solid fa-gear"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">Configurações</p>
                    <p class="text-xs text-gray-500">Ajustar sistema</p>
                </div>
            </a>

            <a 
                href="{{ route('web.home') }}" 
                target="_blank"
                class="flex items-center gap-3 rounded-lg border border-gray-200 p-4 transition hover:border-purple-300 hover:bg-purple-50"
            >
                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-purple-100 text-purple-600">
                    <i class="fa-solid fa-external-link"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">Ver Site</p>
                    <p class="text-xs text-gray-500">Abrir em nova aba</p>
                </div>
            </a>
        </div>
    </x-card>
</div>

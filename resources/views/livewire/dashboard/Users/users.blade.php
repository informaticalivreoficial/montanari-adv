<div>
    <!-- Header -->
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Gerenciar Usuários</h1>
            <p class="mt-1 text-sm text-gray-500">Crie, edite e gerencie os usuários do sistema.</p>
        </div>
        <a 
            href="{{ route('dashboard.users.create') }}"
            class="inline-flex items-center gap-2 rounded-lg bg-amber-600 px-4 py-2.5 text-sm font-semibold 
                   text-white shadow-sm transition hover:bg-amber-700 focus:outline-none focus:ring-2 
                   focus:ring-amber-500 focus:ring-offset-2"
        >
            <i class="fa-solid fa-plus text-xs"></i>
            Novo Usuário
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="mb-6 grid grid-cols-2 gap-4 sm:grid-cols-5">
        <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm">
            <p class="text-xs font-medium text-gray-500">Total</p>
            <p class="text-2xl font-bold text-gray-900">{{ $stats['total'] }}</p>
        </div>
        <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm">
            <p class="text-xs font-medium text-gray-500">Clientes</p>
            <p class="text-2xl font-bold text-blue-600">{{ $stats['clients'] }}</p>
        </div>
        <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm">
            <p class="text-xs font-medium text-gray-500">Time</p>
            <p class="text-2xl font-bold text-purple-600">{{ $stats['team'] }}</p>
        </div>
        <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm">
            <p class="text-xs font-medium text-gray-500">Ativos</p>
            <p class="text-2xl font-bold text-green-600">{{ $stats['active'] }}</p>
        </div>
        <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm">
            <p class="text-xs font-medium text-gray-500">Inativos</p>
            <p class="text-2xl font-bold text-gray-400">{{ $stats['inactive'] }}</p>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="mb-6 rounded-xl border border-gray-200 bg-white p-4 shadow-sm">
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <!-- View Mode Toggles -->
                <div class="flex flex-wrap gap-2">
                    @if(!auth()->user()->hasRole('manager'))
                    <button
                        wire:click="switchMode('all')"
                        class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition
                               {{ $viewMode === 'all' 
                                   ? 'bg-amber-600 text-white shadow-sm' 
                                   : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}"
                    >
                        <i class="fa-solid fa-users text-xs"></i>
                        Todos
                        <span class="rounded-full bg-white/20 px-2 py-0.5 text-xs">{{ $stats['total'] }}</span>
                    </button>
                    @endif
                    <button
                        wire:click="switchMode('clients')"
                        class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition
                               {{ $viewMode === 'clients' 
                                   ? 'bg-amber-600 text-white shadow-sm' 
                                   : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}"
                    >
                        <i class="fa-solid fa-user-check text-xs"></i>
                        Clientes
                        <span class="rounded-full bg-white/20 px-2 py-0.5 text-xs">{{ $stats['clients'] }}</span>
                    </button>
                    @if(!auth()->user()->hasRole('manager'))
                    <button
                        wire:click="switchMode('team')"
                        class="inline-flex items-center gap-2 rounded-lg px-4 py-2 text-sm font-medium transition
                               {{ $viewMode === 'team' 
                                   ? 'bg-amber-600 text-white shadow-sm' 
                                   : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}"
                    >
                        <i class="fa-solid fa-user-tie text-xs"></i>
                        Time
                        <span class="rounded-full bg-white/20 px-2 py-0.5 text-xs">{{ $stats['team'] }}</span>
                    </button>
                    @endif
                </div>

            <!-- Search -->
            <div class="relative flex-1 max-w-md">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <i class="fa-solid fa-search text-gray-400 text-sm"></i>
                </div>
                <input 
                    type="text" 
                    wire:model.live.debounce.300ms="search"
                    class="w-full rounded-lg border border-gray-300 bg-gray-50 py-2 pl-10 pr-4 text-sm 
                           text-gray-900 placeholder:text-gray-400 focus:border-amber-500 focus:bg-white 
                           focus:ring-2 focus:ring-amber-500/20 focus:outline-none transition"
                    placeholder="Buscar por nome, e-mail, cargo..."
                >
                @if($search)
                    <button 
                        wire:click="$set('search', '')"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600"
                    >
                        <i class="fa-solid fa-times text-sm"></i>
                    </button>
                @endif
            </div>
        </div>
    </div>

    <!-- Users Table -->
    <div class="rounded-xl border border-gray-200 bg-white shadow-sm overflow-hidden">
        @if(empty($users))
            <div class="flex flex-col items-center justify-center py-16 px-4 text-center">
                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-gray-100 text-gray-400 mb-4">
                    <i class="fa-solid fa-users text-2xl"></i>
                </div>
                <h3 class="text-base font-semibold text-gray-900">Nenhum usuário encontrado</h3>
                <p class="mt-1 max-w-sm text-sm text-gray-500">
                    {{ $search ? 'Tente buscar com outros termos.' : 'Comece criando o primeiro usuário do sistema.' }}
                </p>
                @if(!$search)
                    <div class="mt-6">
                        <a 
                            href="{{ route('dashboard.users.create') }}"
                            class="inline-flex items-center gap-2 rounded-lg bg-amber-600 px-4 py-2.5 text-sm font-semibold 
                                   text-white shadow-sm transition hover:bg-amber-700"
                        >
                            <i class="fa-solid fa-plus text-xs"></i>
                            Novo Usuário
                        </a>
                    </div>
                @endif
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th 
                                wire:click="sortBy('name')" 
                                class="group cursor-pointer px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 hover:bg-gray-100"
                            >
                                <div class="flex items-center gap-1">
                                    Nome
                                    @if($sortBy === 'name')
                                        <i class="fa-solid fa-{{ $sortDirection === 'asc' ? 'arrow-up' : 'arrow-down' }} text-amber-600"></i>
                                    @else
                                        <i class="fa-solid fa-sort text-gray-300 group-hover:text-gray-400"></i>
                                    @endif
                                </div>
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Função
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Cargo
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Status
                            </th>
                            <th 
                                wire:click="sortBy('created_at')" 
                                class="group cursor-pointer px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500 hover:bg-gray-100"
                            >
                                <div class="flex items-center gap-1">
                                    Criado em
                                    @if($sortBy === 'created_at')
                                        <i class="fa-solid fa-{{ $sortDirection === 'asc' ? 'arrow-up' : 'arrow-down' }} text-amber-600"></i>
                                    @else
                                        <i class="fa-solid fa-sort text-gray-300 group-hover:text-gray-400"></i>
                                    @endif
                                </div>
                            </th>
                            <th class="px-4 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="whitespace-nowrap px-4 py-3">
                                    <div class="flex items-center gap-3">
                                        @if(!empty($user['url_avatar']))
                                            <img src="{{ $user['url_avatar'] }}" alt="{{ $user['name'] }}"
                                                 class="h-10 w-10 rounded-full object-cover ring-2 ring-gray-200">
                                        @else
                                            <div class="flex h-10 w-10 items-center justify-center rounded-full
                                                        {{ $user['status'] ? 'bg-amber-100 text-amber-700' : 'bg-gray-100 text-gray-400' }}">
                                                <i class="fa-solid fa-user {{ !$user['status'] ? 'opacity-50' : '' }}"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">{{ $user['name'] }}</p>
                                            <p class="text-xs text-gray-500">{{ $user['email'] }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3">
                                    @php
                                        $roleName = $user['role'] ?? '';
                                        $roleClass = match($roleName) {
                                            'super-admin' => 'bg-purple-100 text-purple-800',
                                            'admin' => 'bg-blue-100 text-blue-800',
                                            'manager' => 'bg-indigo-100 text-indigo-800',
                                            'client' => 'bg-green-100 text-green-800',
                                            default => 'bg-gray-100 text-gray-600',
                                        };
                                    @endphp
                                    @if($roleName)
                                        <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $roleClass }}">
                                            {{ ucfirst(str_replace('-', ' ', $roleName)) }}
                                        </span>
                                    @else
                                        <span class="text-gray-400 text-xs">Sem função</span>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-600">
                                    {{ $user['position'] ?: '-' }}
                                </td>
                                <td class="whitespace-nowrap px-4 py-3">
                                    @if($user['status'])
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">
                                            <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                            Ativo
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-600">
                                            <span class="h-1.5 w-1.5 rounded-full bg-gray-400"></span>
                                            Inativo
                                        </span>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-500">
                                    {{ $user['created_at'] ?? '-' }}
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 text-right">
                                    <div class="flex items-center justify-end gap-1">
                                        <a 
                                            href="{{ route('dashboard.users.edit', $user['id']) }}"
                                            class="inline-flex items-center justify-center rounded-md p-2 text-amber-600 
                                                   hover:bg-amber-50 transition"
                                            title="Editar"
                                        >
                                            <i class="fa-solid fa-pen-to-square text-sm"></i>
                                        </a>
                                        <button 
                                            wire:click="toggleStatus({{ $user['id'] }})"
                                            class="inline-flex items-center justify-center rounded-md p-2 {{ $user['status'] ? 'text-orange-600 hover:bg-orange-50' : 'text-green-600 hover:bg-green-50' }} transition"
                                            title="{{ $user['status'] ? 'Desativar' : 'Ativar' }}"
                                        >
                                            <i class="fa-solid fa-{{ $user['status'] ? 'ban' : 'check' }} text-sm"></i>
                                        </button>
                                        @if(!auth()->user()->hasRole('manager'))
                                        <button 
                                            wire:click="confirmDelete({{ $user['id'] }})"
                                            class="inline-flex items-center justify-center rounded-md p-2 text-red-600 
                                                   hover:bg-red-50 transition"
                                            title="Excluir"
                                        >
                                            <i class="fa-solid fa-trash text-sm"></i>
                                        </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($lastPage > 1)
                <div class="border-t border-gray-200 bg-gray-50 px-4 py-3">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-700">
                            Mostrando <span class="font-medium">{{ ($currentPage - 1) * $perPage + 1 }}</span> a 
                            <span class="font-medium">{{ min($currentPage * $perPage, $total) }}</span> de 
                            <span class="font-medium">{{ $total }}</span> resultados
                        </div>
                        <div class="flex items-center gap-2">
                            <button 
                                wire:click="previousPage"
                                {{ $currentPage <= 1 ? 'disabled' : '' }}
                                class="inline-flex items-center gap-1 rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm 
                                       font-medium text-gray-700 transition hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed"
                            >
                                <i class="fa-solid fa-chevron-left text-xs"></i>
                                Anterior
                            </button>
                            
                            @for($i = 1; $i <= $lastPage; $i++)
                                <button 
                                    wire:click="goToPage({{ $i }})"
                                    class="inline-flex h-9 w-9 items-center justify-center rounded-lg text-sm font-medium transition
                                           {{ $currentPage === $i 
                                               ? 'bg-amber-600 text-white shadow-sm' 
                                               : 'border border-gray-300 bg-white text-gray-700 hover:bg-gray-50' }}"
                                >
                                    {{ $i }}
                                </button>
                            @endfor
                            
                            <button 
                                wire:click="nextPage"
                                {{ $currentPage >= $lastPage ? 'disabled' : '' }}
                                class="inline-flex items-center gap-1 rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm 
                                       font-medium text-gray-700 transition hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed"
                            >
                                Próximo
                                <i class="fa-solid fa-chevron-right text-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        @endif
    </div>



    <!-- Delete Confirmation Modal -->
    <x-modal name="delete-confirm-modal" title="Confirmar Exclusão" size="sm">
        <div class="text-center">
            <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-red-100">
                <i class="fa-solid fa-exclamation-triangle text-xl text-red-600"></i>
            </div>
            <h3 class="mt-4 text-lg font-semibold text-gray-900">Tem certeza?</h3>
            <p class="mt-2 text-sm text-gray-500">
                Esta ação não pode ser desfeita. O usuário e todos os seus dados serão permanentemente excluídos.
            </p>
        </div>
        <div class="mt-6 flex gap-3">
            <button 
                type="button" 
                x-on:click="$wire.cancelDelete(); Livewire.dispatch('close-modal', { name: 'delete-confirm-modal' })"
                class="flex-1 inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 
                       bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50"
            >
                Cancelar
            </button>
            <button 
                type="button" 
                x-on:click="$wire.executeDelete(); Livewire.dispatch('close-modal', { name: 'delete-confirm-modal' })"
                class="flex-1 inline-flex items-center justify-center gap-2 rounded-lg bg-red-600 px-4 py-2.5 
                       text-sm font-semibold text-white shadow-sm transition hover:bg-red-700"
            >
                <i class="fa-solid fa-trash text-xs"></i>
                Excluir
            </button>
        </div>
    </x-modal>

    <!-- Success/Error Messages -->
    @if($successMessage)
        <div class="fixed bottom-4 right-4 z-50 max-w-sm rounded-lg bg-green-50 border border-green-200 p-4 shadow-lg">
            <div class="flex items-center gap-3">
                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-green-100">
                    <i class="fa-solid fa-check text-sm text-green-600"></i>
                </div>
                <p class="text-sm font-medium text-green-800">{{ $successMessage }}</p>
            </div>
        </div>
    @endif

    @if($errorMessage)
        <div class="fixed bottom-4 right-4 z-50 max-w-sm rounded-lg bg-red-50 border border-red-200 p-4 shadow-lg">
            <div class="flex items-center gap-3">
                <div class="flex h-8 w-8 items-center justify-center rounded-full bg-red-100">
                    <i class="fa-solid fa-exclamation text-sm text-red-600"></i>
                </div>
                <p class="text-sm font-medium text-red-800">{{ $errorMessage }}</p>
            </div>
        </div>
    @endif
</div>

<div>
    <!-- Header -->
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Gerenciar Clientes</h1>
            <p class="mt-1 text-sm text-gray-500">Cadastre, edite e gerencie os clientes do escritório.</p>
        </div>
        <a
            href="{{ route('dashboard.clients.create') }}"
            class="inline-flex items-center gap-2 rounded-lg bg-amber-600 px-4 py-2.5 text-sm font-semibold
                   text-white shadow-sm transition hover:bg-amber-700 focus:outline-none focus:ring-2
                   focus:ring-amber-500 focus:ring-offset-2"
        >
            <i class="fa-solid fa-plus text-xs"></i>
            Novo Cliente
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-3">
        <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm">
            <p class="text-xs font-medium text-gray-500">Total de Clientes</p>
            <p class="text-2xl font-bold text-gray-900">{{ $stats['total'] }}</p>
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

    <!-- Search -->
    <div class="mb-6 rounded-xl border border-gray-200 bg-white p-4 shadow-sm">
        <div class="relative max-w-md">
            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                <i class="fa-solid fa-search text-gray-400 text-sm"></i>
            </div>
            <input
                type="text"
                wire:model.live.debounce.300ms="search"
                class="w-full rounded-lg border border-gray-300 bg-gray-50 py-2 pl-10 pr-4 text-sm
                       text-gray-900 placeholder:text-gray-400 focus:border-amber-500 focus:bg-white
                       focus:ring-2 focus:ring-amber-500/20 focus:outline-none transition"
                placeholder="Buscar por nome, e-mail, CPF, telefone..."
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

    <!-- Clients Table -->
    <div class="rounded-xl border border-gray-200 bg-white shadow-sm overflow-hidden">
        @if(empty($clients))
            <div class="flex flex-col items-center justify-center py-16 px-4 text-center">
                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-gray-100 text-gray-400 mb-4">
                    <i class="fa-solid fa-user-check text-2xl"></i>
                </div>
                <h3 class="text-base font-semibold text-gray-900">Nenhum cliente encontrado</h3>
                <p class="mt-1 max-w-sm text-sm text-gray-500">
                    {{ $search ? 'Tente buscar com outros termos.' : 'Comece cadastrando o primeiro cliente do escritório.' }}
                </p>
                @if(!$search)
                    <div class="mt-6">
                        <a
                            href="{{ route('dashboard.clients.create') }}"
                            class="inline-flex items-center gap-2 rounded-lg bg-amber-600 px-4 py-2.5 text-sm font-semibold
                                   text-white shadow-sm transition hover:bg-amber-700"
                        >
                            <i class="fa-solid fa-plus text-xs"></i>
                            Novo Cliente
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
                                Contato
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Documentos
                            </th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                                Processos
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
                        @foreach ($clients as $client)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="whitespace-nowrap px-4 py-3">
                                    <div class="flex items-center gap-3">
                                        @if(!empty($client['url_avatar']))
                                            <img src="{{ $client['url_avatar'] }}" alt="{{ $client['name'] }}"
                                                 class="h-10 w-10 rounded-full object-cover ring-2 ring-gray-200">
                                        @else
                                            <div class="flex h-10 w-10 items-center justify-center rounded-full
                                                        {{ $client['status'] ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-400' }}">
                                                <i class="fa-solid fa-user {{ !$client['status'] ? 'opacity-50' : '' }}"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">{{ $client['name'] }}</p>
                                            <p class="text-xs text-gray-500">{{ $client['email'] }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-600">
                                    <div>
                                        @if($client['phone'])
                                            <p class="text-xs"><i class="fa-solid fa-phone mr-1 text-gray-400"></i>{{ $client['phone'] }}</p>
                                        @endif
                                        @if($client['cell_phone'])
                                            <p class="text-xs"><i class="fa-solid fa-mobile-screen mr-1 text-gray-400"></i>{{ $client['cell_phone'] }}</p>
                                        @endif
                                        @if(!$client['phone'] && !$client['cell_phone'])
                                            <span class="text-gray-400 text-xs">-</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3">
                                    <span class="inline-flex items-center gap-1 rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-medium text-blue-800">
                                        <i class="fa-solid fa-file-lines text-[10px]"></i>
                                        {{ $client['documents_count'] }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3">
                                    <span class="inline-flex items-center gap-1 rounded-full bg-purple-100 px-2.5 py-0.5 text-xs font-medium text-purple-800">
                                        <i class="fa-solid fa-scale-balanced text-[10px]"></i>
                                        {{ $client['processes_count'] }}
                                    </span>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3">
                                    @if($client['status'])
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
                                    {{ $client['created_at'] ?? '-' }}
                                </td>
                                <td class="whitespace-nowrap px-4 py-3 text-right">
                                    <div class="flex items-center justify-end gap-1">
                                        <a
                                            href="{{ route('dashboard.clients.edit', $client['id']) }}"
                                            class="inline-flex items-center justify-center rounded-md p-2 text-amber-600
                                                   hover:bg-amber-50 transition"
                                            title="Editar"
                                        >
                                            <i class="fa-solid fa-pen-to-square text-sm"></i>
                                        </a>
                                        <button
                                            wire:click="toggleStatus({{ $client['id'] }})"
                                            class="inline-flex items-center justify-center rounded-md p-2 {{ $client['status'] ? 'text-orange-600 hover:bg-orange-50' : 'text-green-600 hover:bg-green-50' }} transition"
                                            title="{{ $client['status'] ? 'Desativar' : 'Ativar' }}"
                                        >
                                            <i class="fa-solid fa-{{ $client['status'] ? 'ban' : 'check' }} text-sm"></i>
                                        </button>
                                        @if(!auth()->user()->hasAnyRole(['manager', 'employee']))
                                        <button
                                            wire:click="confirmDelete({{ $client['id'] }})"
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
</div>

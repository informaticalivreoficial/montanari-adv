<div>
    <!-- Header -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Permissões e Funções</h1>
            <p class="mt-1 text-sm text-gray-500">Gerencie as funções e permissões de acesso do sistema.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <!-- ═══ Roles Section ═══ -->
        <div class="space-y-6">
            <!-- Create Role -->
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-5">
                <h3 class="flex items-center gap-2 text-sm font-semibold text-gray-900 mb-4">
                    <i class="fa-solid fa-shield-halved text-blue-500"></i> Criar Nova Função
                </h3>
                <form wire:submit.prevent="createRole" class="flex gap-2">
                    <input
                        type="text"
                        wire:model="roleName"
                        placeholder="Nome da função..."
                        class="flex-1 rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 focus:outline-none"
                    >
                    <button type="submit" class="rounded-lg bg-amber-600 px-4 py-2 text-sm font-semibold text-white hover:bg-amber-700 transition">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </form>
            </div>

            <!-- Edit Role -->
            @if($editRoleMode)
                <div class="rounded-xl border border-amber-200 bg-amber-50 shadow-sm p-5">
                    <h3 class="flex items-center gap-2 text-sm font-semibold text-amber-800 mb-4">
                        <i class="fa-solid fa-pen"></i> Editando Função
                    </h3>
                    <form wire:submit.prevent="updateRole" class="flex gap-2">
                        <input
                            type="text"
                            wire:model="roleName"
                            class="flex-1 rounded-lg border border-amber-300 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 focus:outline-none"
                        >
                        <button type="submit" class="rounded-lg bg-amber-600 px-4 py-2 text-sm font-semibold text-white hover:bg-amber-700 transition">
                            <i class="fa-solid fa-check"></i>
                        </button>
                        <button type="button" wire:click="cancelEditRole" class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 transition">
                            <i class="fa-solid fa-times"></i>
                        </button>
                    </form>
                </div>
            @endif

            <!-- Roles List -->
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-5">
                <h3 class="flex items-center gap-2 text-sm font-semibold text-gray-900 mb-4">
                    <i class="fa-solid fa-list text-gray-400"></i> Funções Cadastradas
                </h3>
                @if($roles->isNotEmpty())
                    <div class="divide-y divide-gray-100">
                        @foreach ($roles as $role)
                            <div class="flex items-center justify-between py-3">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-100 text-blue-600">
                                        <i class="fa-solid fa-shield-halved text-xs"></i>
                                    </div>
                                    <div>
                                        <span class="text-sm font-medium text-gray-900">{{ $role->name }}</span>
                                        <p class="text-xs text-gray-400">{{ count($rolePermissions[$role->id] ?? []) }} permissão(ões)</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-1">
                                    <button wire:click="editRole({{ $role->id }})" class="rounded-md p-1.5 text-amber-600 hover:bg-amber-50 transition" title="Editar">
                                        <i class="fa-solid fa-pen-to-square text-xs"></i>
                                    </button>
                                    <button
                                        x-on:click="
                                            MontanariAlert.confirm({
                                                title: 'Excluir função?',
                                                text: 'Todos os usuários com esta função perderão as permissões dela.',
                                                confirmButtonText: 'Sim, excluir',
                                                cancelButtonText: 'Cancelar'
                                            }).then(r => {
                                                if (r.isConfirmed) $wire.deleteRole({{ $role->id }})
                                            })
                                        "
                                        class="rounded-md p-1.5 text-red-500 hover:bg-red-50 transition" title="Excluir"
                                    >
                                        <i class="fa-solid fa-trash text-xs"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-6 text-gray-400">
                        <i class="fa-solid fa-shield-halved text-2xl mb-2"></i>
                        <p class="text-sm">Nenhuma função cadastrada.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- ═══ Permissions Section ═══ -->
        <div class="space-y-6">
            <!-- Create Permission -->
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-5">
                <h3 class="flex items-center gap-2 text-sm font-semibold text-gray-900 mb-4">
                    <i class="fa-solid fa-key text-green-500"></i> Criar Nova Permissão
                </h3>
                <form wire:submit.prevent="createPermission" class="flex gap-2">
                    <input
                        type="text"
                        wire:model="permissionName"
                        placeholder="Nome da permissão..."
                        class="flex-1 rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 focus:outline-none"
                    >
                    <button type="submit" class="rounded-lg bg-green-600 px-4 py-2 text-sm font-semibold text-white hover:bg-green-700 transition">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                </form>
            </div>

            <!-- Edit Permission -->
            @if($editPermissionMode)
                <div class="rounded-xl border border-amber-200 bg-amber-50 shadow-sm p-5">
                    <h3 class="flex items-center gap-2 text-sm font-semibold text-amber-800 mb-4">
                        <i class="fa-solid fa-pen"></i> Editando Permissão
                    </h3>
                    <form wire:submit.prevent="updatePermission" class="flex gap-2">
                        <input
                            type="text"
                            wire:model="permissionName"
                            class="flex-1 rounded-lg border border-amber-300 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 focus:outline-none"
                        >
                        <button type="submit" class="rounded-lg bg-amber-600 px-4 py-2 text-sm font-semibold text-white hover:bg-amber-700 transition">
                            <i class="fa-solid fa-check"></i>
                        </button>
                        <button type="button" wire:click="cancelEditPermission" class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 transition">
                            <i class="fa-solid fa-times"></i>
                        </button>
                    </form>
                </div>
            @endif

            <!-- Permissions List -->
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-5">
                <h3 class="flex items-center gap-2 text-sm font-semibold text-gray-900 mb-4">
                    <i class="fa-solid fa-list-check text-gray-400"></i> Permissões Cadastradas
                </h3>
                @if($permissions->isNotEmpty())
                    <div class="divide-y divide-gray-100">
                        @foreach ($permissions as $permission)
                            <div class="flex items-center justify-between py-3">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-green-100 text-green-600">
                                        <i class="fa-solid fa-key text-xs"></i>
                                    </div>
                                    <span class="text-sm font-medium text-gray-900">{{ $permission->name }}</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <button wire:click="editPermission({{ $permission->id }})" class="rounded-md p-1.5 text-amber-600 hover:bg-amber-50 transition" title="Editar">
                                        <i class="fa-solid fa-pen-to-square text-xs"></i>
                                    </button>
                                    <button
                                        x-on:click="
                                            MontanariAlert.confirm({
                                                title: 'Excluir permissão?',
                                                text: 'Esta permissão será removida de todas as funções.',
                                                confirmButtonText: 'Sim, excluir',
                                                cancelButtonText: 'Cancelar'
                                            }).then(r => {
                                                if (r.isConfirmed) $wire.deletePermission({{ $permission->id }})
                                            })
                                        "
                                        class="rounded-md p-1.5 text-red-500 hover:bg-red-50 transition" title="Excluir"
                                    >
                                        <i class="fa-solid fa-trash text-xs"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-6 text-gray-400">
                        <i class="fa-solid fa-key text-2xl mb-2"></i>
                        <p class="text-sm">Nenhuma permissão cadastrada.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- ═══ Matrix: Permissões por Role ═══ -->
        <div class="lg:col-span-1">
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-5 sticky top-6">
                <h3 class="flex items-center gap-2 text-sm font-semibold text-gray-900 mb-4">
                    <i class="fa-solid fa-table-cells text-amber-500"></i> Atribuir Permissões
                </h3>
                <p class="text-xs text-gray-500 mb-4">Marque as permissões que cada função deve ter.</p>

                @if($roles->isNotEmpty() && $permissions->isNotEmpty())
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b border-gray-200">
                                    <th class="py-2 px-2 text-left text-xs font-medium text-gray-500">Permissão</th>
                                    @foreach($roles as $role)
                                        <th class="py-2 px-2 text-center">
                                            <span class="text-xs font-medium text-gray-700" title="{{ $role->name }}">
                                                {{ Str::limit($role->name, 8) }}
                                            </span>
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions as $permission)
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-2 px-2">
                                            <span class="text-xs font-medium text-gray-700">{{ $permission->name }}</span>
                                        </td>
                                        @foreach($roles as $role)
                                            <td class="py-2 px-2 text-center">
                                                <input
                                                    type="checkbox"
                                                    {{ in_array($permission->id, $rolePermissions[$role->id] ?? []) ? 'checked' : '' }}
                                                    x-on:change="$wire.toggleRolePermission({{ $role->id }}, {{ $permission->id }})"
                                                    class="rounded border-gray-300 text-amber-600 focus:ring-amber-500"
                                                >
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @elseif($roles->isEmpty())
                    <div class="text-center py-6 text-gray-400">
                        <p class="text-sm">Crie uma função primeiro.</p>
                    </div>
                @elseif($permissions->isEmpty())
                    <div class="text-center py-6 text-gray-400">
                        <p class="text-sm">Crie uma permissão primeiro.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

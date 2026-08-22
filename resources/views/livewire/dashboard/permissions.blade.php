<div>
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Permissões e Funções</h1>
        <p class="mt-1 text-sm text-gray-500">Gerencie as funções e permissões de acesso do sistema.</p>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Roles Section -->
        <div class="space-y-6">
            <!-- Create Role -->
            <x-card title="Criar Nova Função" icon="fa-shield-halved">
                <form wire:submit.prevent="createRole">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nome da Função</label>
                        <input 
                            type="text" 
                            wire:model="roleName" 
                            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm 
                                   focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 focus:outline-none transition"
                            placeholder="Ex: editor, moderador"
                            required
                        >
                    </div>
                    
                    <button 
                        type="submit" 
                        class="w-full inline-flex items-center justify-center gap-2 rounded-lg bg-amber-600 px-4 py-2.5 
                               text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700 
                               focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2"
                    >
                        <i class="fa-solid fa-plus text-xs"></i>
                        Criar Função
                    </button>
                </form>
            </x-card>

            <!-- Edit Role Form -->
            @if($editRoleMode)
                <x-card title="Editando Função" icon="fa-pen" class="!border-amber-200 !bg-amber-50">
                    <form wire:submit.prevent="updateRole">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nome da Função</label>
                            <input 
                                type="text" 
                                wire:model="roleName" 
                                class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm 
                                       focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 focus:outline-none transition"
                                required
                            >
                        </div>
                        
                        <div class="flex gap-3">
                            <button 
                                type="submit" 
                                class="flex-1 inline-flex items-center justify-center gap-2 rounded-lg bg-amber-600 px-4 py-2.5 
                                       text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700"
                            >
                                <i class="fa-solid fa-check text-xs"></i>
                                Atualizar
                            </button>
                            <button 
                                type="button" 
                                wire:click="cancelEditRole" 
                                class="flex-1 inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 
                                       bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-sm transition 
                                       hover:bg-gray-50"
                            >
                                <i class="fa-solid fa-times text-xs"></i>
                                Cancelar
                            </button>
                        </div>
                    </form>
                </x-card>
            @endif

            <!-- Roles List -->
            <x-card title="Funções Cadastradas" icon="fa-list">
                @if($roles->isNotEmpty())
                    <div class="divide-y divide-gray-100">
                        @foreach ($roles as $role)
                            <div class="flex items-center justify-between py-3 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-100 text-blue-600">
                                        <i class="fa-solid fa-shield-halved text-xs"></i>
                                    </div>
                                    <span class="text-sm font-medium text-gray-900">{{ $role->name }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button 
                                        wire:click="editRole({{ $role->id }})" 
                                        class="inline-flex items-center gap-1 rounded-md px-2.5 py-1.5 text-xs 
                                               font-medium text-amber-700 hover:bg-amber-50 transition"
                                    >
                                        <i class="fa-solid fa-pen-to-square text-[10px]"></i>
                                        Editar
                                    </button>
                                    <button 
                                        wire:click="deleteRole({{ $role->id }})" 
                                        class="inline-flex items-center gap-1 rounded-md px-2.5 py-1.5 text-xs 
                                               font-medium text-red-600 hover:bg-red-50 transition"
                                    >
                                        <i class="fa-solid fa-trash text-[10px]"></i>
                                        Excluir
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8 text-gray-500">
                        <i class="fa-solid fa-shield-halved text-3xl text-gray-300 mb-3"></i>
                        <p class="text-sm">Nenhuma função cadastrada.</p>
                    </div>
                @endif
            </x-card>
        </div>

        <!-- Permissions Section -->
        <div class="space-y-6">
            <!-- Create Permission -->
            <x-card title="Criar Nova Permissão" icon="fa-key">
                <form wire:submit.prevent="createPermission">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nome da Permissão</label>
                        <input 
                            type="text" 
                            wire:model="permissionName" 
                            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm 
                                   focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 focus:outline-none transition"
                            placeholder="Ex: view users, edit posts"
                            required
                        >
                    </div>
                    
                    <button 
                        type="submit" 
                        class="w-full inline-flex items-center justify-center gap-2 rounded-lg bg-green-600 px-4 py-2.5 
                               text-sm font-semibold text-white shadow-sm transition hover:bg-green-700 
                               focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                    >
                        <i class="fa-solid fa-plus text-xs"></i>
                        Criar Permissão
                    </button>
                </form>
            </x-card>

            <!-- Edit Permission Form -->
            @if($editPermissionMode)
                <x-card title="Editando Permissão" icon="fa-pen" class="!border-amber-200 !bg-amber-50">
                    <form wire:submit.prevent="updatePermission">
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nome da Permissão</label>
                            <input 
                                type="text" 
                                wire:model="permissionName" 
                                class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm 
                                       focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 focus:outline-none transition"
                                required
                            >
                        </div>
                        
                        <div class="flex gap-3">
                            <button 
                                type="submit" 
                                class="flex-1 inline-flex items-center justify-center gap-2 rounded-lg bg-amber-600 px-4 py-2.5 
                                       text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700"
                            >
                                <i class="fa-solid fa-check text-xs"></i>
                                Atualizar
                            </button>
                            <button 
                                type="button" 
                                wire:click="cancelEditPermission" 
                                class="flex-1 inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 
                                       bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-sm transition 
                                       hover:bg-gray-50"
                            >
                                <i class="fa-solid fa-times text-xs"></i>
                                Cancelar
                            </button>
                        </div>
                    </form>
                </x-card>
            @endif

            <!-- Permissions List -->
            <x-card title="Permissões Cadastradas" icon="fa-list-check">
                @if($permissions->isNotEmpty())
                    <div class="divide-y divide-gray-100">
                        @foreach ($permissions as $permission)
                            <div class="flex items-center justify-between py-3 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-green-100 text-green-600">
                                        <i class="fa-solid fa-key text-xs"></i>
                                    </div>
                                    <span class="text-sm font-medium text-gray-900">{{ $permission->name }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <button 
                                        wire:click="editPermission({{ $permission->id }})" 
                                        class="inline-flex items-center gap-1 rounded-md px-2.5 py-1.5 text-xs 
                                               font-medium text-amber-700 hover:bg-amber-50 transition"
                                    >
                                        <i class="fa-solid fa-pen-to-square text-[10px]"></i>
                                        Editar
                                    </button>
                                    <button 
                                        wire:click="deletePermission({{ $permission->id }})" 
                                        class="inline-flex items-center gap-1 rounded-md px-2.5 py-1.5 text-xs 
                                               font-medium text-red-600 hover:bg-red-50 transition"
                                    >
                                        <i class="fa-solid fa-trash text-[10px]"></i>
                                        Excluir
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8 text-gray-500">
                        <i class="fa-solid fa-key text-3xl text-gray-300 mb-3"></i>
                        <p class="text-sm">Nenhuma permissão cadastrada.</p>
                    </div>
                @endif
            </x-card>
        </div>
    </div>

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

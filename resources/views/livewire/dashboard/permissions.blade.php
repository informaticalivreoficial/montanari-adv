<div>
<!-- Permissions Management -->
<div class="px-4 py-6">
    <div class="bg-white rounded-lg shadow mb-6">
        <div class="p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-6">Gerenciar Permissões e Funções</h2>
            
            <!-- Create Role -->
            <div class="mb-6">
                <h3 class="text-semibold text-gray-700 mb-3">Criar Nova Função</h3>
                
                <form wire:submit.prevent="createRole">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nome da Função</label>
                        <input type="text" wire:model="roleName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition-colors">
                        Criar Função
                    </button>
                </form>
            </div>
            
            <!-- Roles Table -->
            <div>
                <h3 class="text-semibold text-gray-700 mb-3">Funções Cadastradas</h3>
                @if($roles->isNotEmpty())
                    <table class="min-w-full bg-white rounded-lg shadow">
                        <thead class="bg-gray-100">
                            <tr class="text-left text-sm text-gray-700">
                                <th class="p-3">Nome</th>
                                <th class="p-3 text-right">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr class="border-b">
                                    <td class="p-3">{{ $role->name }}</td>
                                    <td class="p-3 text-right">
                                        <button wire:click="editRole({{ $role->id }})" class="text-blue-600 hover underline">Editar</button>
                                        <button wire:click="deleteRole({{ $role->id }})" class="text-red-600 hover underline ml-2">Excluir</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-600">Nenhuma função cadastrada.</p>
                @endif
            </div>
            
            <!-- Create Permission -->
            <div class="mt-8">
                <h3 class="text-semibold text-gray-700 mb-3">Criar Nova Permissão</h3>
                
                <form wire:submit.prevent="createPermission">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nome da Permissão</label>
                        <input type="text" wire:model="permissionName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    
                    <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition-colors">
                        Criar Permissão
                    </button>
                </form>
            </div>
            
            <!-- Permissions Table -->
            <div class="mt-8">
                <h3 class="text-semibold text-gray-700 mb-3">Permissões Cadastradas</h3>
                @if($permissions->isNotEmpty())
                    <table class="min-w-full bg-white rounded-lg shadow">
                        <thead class="bg-gray-100">
                            <tr class="text-left text-sm text-gray-700">
                                <th class="p-3">Nome</th>
                                <th class="p-3 text-right">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr class="border-b">
                                    <td class="p-3">{{ $permission->name }}</td>
                                    <td class="p-3 text-right">
                                        <button class="text-green-600 hover underline">Editar</button>
                                        <button class="text-red-600 hover underline ml-2">Excluir</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-600">Nenhuma permissão cadastrada.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Success/Error Messages -->
@if($successMessage)
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-3 mb-4 animate-in fade-in-0 duration-500">
        {{ $successMessage }}
    </div>
@endif

@if($errorMessage)
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-3 mb-4 animate-in fade-in-0 duration-500">
        {{ $errorMessage }}
    </div>
@endif
</div>


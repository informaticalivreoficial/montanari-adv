<div>
<!-- Users Management -->
<div class="px-4 py-6">
    <div class="bg-white rounded-lg shadow mb-6">
        <div class="p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Gerenciar Usuários</h2>
            
            <!-- Create User Form -->
            <div class="mb-6">
                <h3 class="text-semibold text-gray-700 mb-3">Novo Usuário</h3>
                
                <form wire:submit.prevent="store">
                    <div class="grid grid-cols-1 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                            <input type="text" wire:model="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                            <input type="email" wire:model="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
                            <input type="password" wire:model="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Função</label>
                            <select wire:model="role" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Selecione uma função</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Permissões</label>
                            <div class="space-y-1">
                                @foreach ($permissions as $permission)
                                    <label class="flex items-center">
                                        <input type="checkbox" wire:model="permissions" value="{{ $permission->name }}" class="mr-2 accent-blue-600 focus:ring-blue-500">
                                        {{ $permission->name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition-colors mt-4">
                        {{ $editMode ? 'Atualizar' : 'Criar' }} Usuário
                    </button>
                </form>
            </div>
            
            <!-- Users List -->
            @if($users->isNotEmpty())
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white rounded-lg shadow">
                        <thead class="bg-gray-100">
                            <tr class="text-left text-sm text-gray-700">
                                <th class="p-3">Nome</th>
                                <th class="p-3">E-mail</th>
                                <th class="p-3">Função</th>
                                <th class="p-3">Permissões</th>
                                <th class="p-3 text-right">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="border-b">
                                    <td class="p-3">{{ $user->name }}</td>
                                    <td class="p-3">{{ $user->email }}</td>
                                    <td class="p-3">
                                        @foreach ($user->roles as $role)
                                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-1 rounded mr-1">{{ $role->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="p-3">
                                        @foreach ($user->permissions as $permission)
                                            <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded mr-1">{{ $permission->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="p-3 text-right">
                                        <button wire:click="edit({{ $user->id }})" class="text-blue-600 hover underline">Editar</button>
                                        <button wire:click="delete({{ $user->id }})" class="text-red-600 hover underline ml-2">Excluir</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-600">Nenhum usuário encontrado.</p>
            @endif
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


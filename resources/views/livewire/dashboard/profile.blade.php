<div>
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Meu Perfil</h1>
        <p class="mt-1 text-sm text-gray-500">Visualize e gerencie suas informações pessoais.</p>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <!-- Coluna Principal - Info do Usuário -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Card de Perfil -->
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm overflow-hidden">
                <!-- Banner -->
                <div class="h-32 bg-gradient-to-r from-amber-500 to-amber-600"></div>
                
                <!-- Informações -->
                <div class="relative px-6 pb-6">
                    <!-- Avatar -->
                    <div class="-mt-16 mb-4">
                        <div class="relative inline-block">
                            @if($user->avatar)
                                <img 
                                    src="{{ Storage::url($user->avatar) }}" 
                                    alt="{{ $user->name }}"
                                    class="h-28 w-28 rounded-2xl border-4 border-white object-cover shadow-lg"
                                >
                            @else
                                <div class="flex h-28 w-28 items-center justify-center rounded-2xl border-4 border-white bg-amber-100 shadow-lg">
                                    <i class="fa-solid fa-user text-4xl text-amber-600"></i>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Nome e Cargo -->
                    <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h2>
                            <p class="text-sm text-gray-500">{{ $user->email }}</p>
                            @if($user->position)
                                <p class="mt-1 text-sm font-medium text-amber-600">{{ $user->position }}</p>
                            @endif
                            @if($user->department)
                                <p class="text-xs text-gray-500">{{ $user->department }}</p>
                            @endif
                        </div>
                        <div class="mt-4 sm:mt-0 flex gap-2">
                            <button 
                                wire:click="openEditModal"
                                class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 
                                       text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50"
                            >
                                <i class="fa-solid fa-pen-to-square text-xs"></i>
                                Editar
                            </button>
                            <button 
                                wire:click="openPasswordModal"
                                class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 
                                       text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50"
                            >
                                <i class="fa-solid fa-lock text-xs"></i>
                                Senha
                            </button>
                        </div>
                    </div>

                    <!-- Badges -->
                    <div class="mt-4 flex flex-wrap gap-2">
                        @php
                            $roleName = $user->roles->first()?->name ?? '';
                            $roleClass = match($roleName) {
                                'super-admin' => 'bg-purple-100 text-purple-800',
                                'admin' => 'bg-blue-100 text-blue-800',
                                'manager' => 'bg-indigo-100 text-indigo-800',
                                'client' => 'bg-green-100 text-green-800',
                                default => 'bg-gray-100 text-gray-600',
                            };
                        @endphp
                        @if($roleName)
                            <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-medium {{ $roleClass }}">
                                <i class="fa-solid fa-shield-halved mr-1.5"></i>
                                {{ ucfirst(str_replace('-', ' ', $roleName)) }}
                            </span>
                        @endif
                        
                        @if($user->status)
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-800">
                                <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>
                                Ativo
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 rounded-full bg-gray-100 px-3 py-1 text-xs font-medium text-gray-600">
                                <span class="h-1.5 w-1.5 rounded-full bg-gray-400"></span>
                                Inativo
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Informações de Contato -->
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                <div class="border-b border-gray-100 px-6 py-4">
                    <h3 class="text-base font-semibold text-gray-900">
                        <i class="fa-solid fa-address-card mr-2 text-amber-600"></i>
                        Informações de Contato
                    </h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="flex items-center gap-3 rounded-lg bg-gray-50 p-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-amber-100 text-amber-600">
                                <i class="fa-solid fa-envelope text-sm"></i>
                            </div>
                            <div>
                                <p class="text-xs font-medium text-gray-500">E-mail</p>
                                <p class="text-sm text-gray-900">{{ $user->email }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-3 rounded-lg bg-gray-50 p-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-blue-600">
                                <i class="fa-solid fa-phone text-sm"></i>
                            </div>
                            <div>
                                <p class="text-xs font-medium text-gray-500">Telefone</p>
                                <p class="text-sm text-gray-900">{{ $user->phone ?: '-' }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-3 rounded-lg bg-gray-50 p-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-green-100 text-green-600">
                                <i class="fa-solid fa-mobile-screen text-sm"></i>
                            </div>
                            <div>
                                <p class="text-xs font-medium text-gray-500">Celular</p>
                                <p class="text-sm text-gray-900">{{ $user->cell_phone ?: '-' }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center gap-3 rounded-lg bg-gray-50 p-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600">
                                <i class="fa-brands fa-whatsapp text-sm"></i>
                            </div>
                            <div>
                                <p class="text-xs font-medium text-gray-500">WhatsApp</p>
                                <p class="text-sm text-gray-900">{{ $user->whatsapp ?: '-' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Biografia -->
            @if($user->biography)
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="border-b border-gray-100 px-6 py-4">
                        <h3 class="text-base font-semibold text-gray-900">
                            <i class="fa-solid fa-quote-left mr-2 text-amber-600"></i>
                            Sobre
                        </h3>
                    </div>
                    <div class="p-6">
                        <p class="text-sm text-gray-700 leading-relaxed">{{ $user->biography }}</p>
                    </div>
                </div>
            @endif
        </div>

        <!-- Coluna Lateral - Info Adicionais -->
        <div class="space-y-6">
            <!-- Informações da Conta -->
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                <div class="border-b border-gray-100 px-6 py-4">
                    <h3 class="text-base font-semibold text-gray-900">
                        <i class="fa-solid fa-circle-info mr-2 text-amber-600"></i>
                        Informações da Conta
                    </h3>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <p class="text-xs font-medium text-gray-500">ID do Usuário</p>
                        <p class="text-sm text-gray-900 font-mono">#{{ $user->id }}</p>
                    </div>
                    <div class="border-t border-gray-100 pt-4">
                        <p class="text-xs font-medium text-gray-500">Membro desde</p>
                        <p class="text-sm text-gray-900">{{ $user->created_at?->format('d/m/Y') ?? '-' }}</p>
                    </div>
                    <div class="border-t border-gray-100 pt-4">
                        <p class="text-xs font-medium text-gray-500">Último login</p>
                        <p class="text-sm text-gray-900">{{ $user->last_login_at?->format('d/m/Y H:i') ?? 'Nunca' }}</p>
                    </div>
                    <div class="border-t border-gray-100 pt-4">
                        <p class="text-xs font-medium text-gray-500">Último IP</p>
                        <p class="text-sm text-gray-900 font-mono">{{ $user->last_login_ip ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <!-- Permissões -->
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                <div class="border-b border-gray-100 px-6 py-4">
                    <h3 class="text-base font-semibold text-gray-900">
                        <i class="fa-solid fa-shield-halved mr-2 text-amber-600"></i>
                        Permissões
                    </h3>
                </div>
                <div class="p-6">
                    @php
                        $permissions = $user->permissions->pluck('name')->toArray();
                    @endphp
                    @if(!empty($permissions))
                        <div class="flex flex-wrap gap-2">
                            @foreach ($permissions as $permission)
                                <span class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-700">
                                    {{ $permission }}
                                </span>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm text-gray-500">Nenhuma permissão adicional.</p>
                    @endif
                </div>
            </div>

            <!-- Ações Rápidas -->
            <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                <div class="border-b border-gray-100 px-6 py-4">
                    <h3 class="text-base font-semibold text-gray-900">
                        <i class="fa-solid fa-bolt mr-2 text-amber-600"></i>
                        Ações Rápidas
                    </h3>
                </div>
                <div class="p-6 space-y-3">
                    <a 
                        href="{{ route('dashboard') }}" 
                        class="flex items-center gap-3 rounded-lg border border-gray-200 p-3 transition hover:border-amber-300 hover:bg-amber-50"
                    >
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-amber-100 text-amber-600">
                            <i class="fa-solid fa-gauge"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Dashboard</p>
                            <p class="text-xs text-gray-500">Visão geral</p>
                        </div>
                    </a>
                    
                    <a 
                        href="{{ route('web.home') }}" 
                        target="_blank"
                        class="flex items-center gap-3 rounded-lg border border-gray-200 p-3 transition hover:border-blue-300 hover:bg-blue-50"
                    >
                        <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-blue-600">
                            <i class="fa-solid fa-external-link"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Ver Site</p>
                            <p class="text-xs text-gray-500">Abrir em nova aba</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <x-modal 
        name="edit-profile-modal" 
        title="Editar Perfil" 
        subtitle="Atualize suas informações pessoais"
        size="lg"
    >
        <form wire:submit.prevent="updateProfile">
            <div class="space-y-6">
                <!-- Avatar -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-3">Foto de Perfil</h4>
                    <div class="flex items-center gap-4">
                        <div class="relative">
                            @if($user->avatar)
                                <img 
                                    src="{{ Storage::url($user->avatar) }}" 
                                    alt="{{ $user->name }}"
                                    class="h-20 w-20 rounded-xl object-cover"
                                >
                            @else
                                <div class="flex h-20 w-20 items-center justify-center rounded-xl bg-amber-100 text-amber-600">
                                    <i class="fa-solid fa-user text-2xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <input 
                                type="file" 
                                wire:model="avatar" 
                                accept="image/*"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer 
                                       focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500"
                            >
                            <p class="mt-1 text-xs text-gray-500">PNG, JPG até 2MB. Recomendado 400x400px.</p>
                            @error('avatar')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Informações Básicas -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-3">Informações Básicas</h4>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nome *</label>
                            <input 
                                type="text" 
                                wire:model="name" 
                                class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 
                                       shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 
                                       focus:outline-none transition @error('name') border-red-500 @enderror"
                            >
                            @error('name')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">E-mail *</label>
                            <input 
                                type="email" 
                                wire:model="email" 
                                class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 
                                       shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 
                                       focus:outline-none transition @error('email') border-red-500 @enderror"
                            >
                            @error('email')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Contato -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-3">Contato</h4>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Telefone</label>
                            <input 
                                type="text" 
                                wire:model="phone" 
                                class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 
                                       shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 
                                       focus:outline-none transition"
                                data-imask="(00) 0000-0000"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Celular</label>
                            <input 
                                type="text" 
                                wire:model="cell_phone" 
                                class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 
                                       shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 
                                       focus:outline-none transition"
                                data-imask="(00) 00000-0000"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">WhatsApp</label>
                            <input 
                                type="text" 
                                wire:model="whatsapp" 
                                class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 
                                       shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 
                                       focus:outline-none transition"
                                data-imask="(00) 00000-0000"
                            >
                        </div>
                    </div>
                </div>

                <!-- Informações Profissionais -->
                <div>
                    <h4 class="text-sm font-semibold text-gray-900 mb-3">Informações Profissionais</h4>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Cargo</label>
                            <input 
                                type="text" 
                                wire:model="position" 
                                class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 
                                       shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 
                                       focus:outline-none transition"
                                placeholder="Ex: Advogado"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Departamento</label>
                            <input 
                                type="text" 
                                wire:model="department" 
                                class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 
                                       shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 
                                       focus:outline-none transition"
                                placeholder="Ex: Jurídico"
                            >
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Biografia</label>
                        <textarea 
                            wire:model="biography" 
                            rows="3"
                            class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 
                                   shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 
                                   focus:outline-none transition resize-none"
                            placeholder="Conte um pouco sobre você..."
                        ></textarea>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="mt-6 flex items-center justify-end gap-3 border-t border-gray-200 pt-4">
                <button 
                    type="button" 
                    x-on:click="$wire.closeEditModal(); Livewire.dispatch('close-modal', { name: 'edit-profile-modal' })"
                    class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 
                           text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50"
                >
                    Cancelar
                </button>
                <button 
                    type="submit" 
                    class="inline-flex items-center gap-2 rounded-lg bg-amber-600 px-5 py-2.5 text-sm font-semibold 
                           text-white shadow-sm transition hover:bg-amber-700 focus:outline-none focus:ring-2 
                           focus:ring-amber-500 focus:ring-offset-2"
                >
                    <i class="fa-solid fa-save text-xs"></i>
                    Salvar Alterações
                </button>
            </div>
        </form>
    </x-modal>

    <!-- Change Password Modal -->
    <x-modal 
        name="password-modal" 
        title="Alterar Senha" 
        subtitle="Atualize sua senha de acesso"
        size="md"
    >
        <form wire:submit.prevent="updatePassword">
            <div class="space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Senha Atual *</label>
                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fa-solid fa-lock text-sm"></i>
                        </span>
                        <input 
                            type="password" 
                            wire:model="current_password" 
                            class="w-full rounded-lg border border-gray-300 py-2.5 pl-10 pr-3 text-sm text-gray-900 
                                   shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 
                                   focus:outline-none transition @error('current_password') border-red-500 @enderror"
                            placeholder="Digite sua senha atual"
                            autocomplete="current-password"
                        >
                    </div>
                    @error('current_password')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nova Senha *</label>
                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fa-solid fa-lock text-sm"></i>
                        </span>
                        <input 
                            type="password" 
                            wire:model="new_password" 
                            class="w-full rounded-lg border border-gray-300 py-2.5 pl-10 pr-3 text-sm text-gray-900 
                                   shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 
                                   focus:outline-none transition @error('new_password') border-red-500 @enderror"
                            placeholder="Mínimo 8 caracteres"
                            autocomplete="new-password"
                        >
                    </div>
                    @error('new_password')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Confirmar Nova Senha *</label>
                    <div class="relative">
                        <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                            <i class="fa-solid fa-lock text-sm"></i>
                        </span>
                        <input 
                            type="password" 
                            wire:model="new_password_confirmation" 
                            class="w-full rounded-lg border border-gray-300 py-2.5 pl-10 pr-3 text-sm text-gray-900 
                                   shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 
                                   focus:outline-none transition"
                            placeholder="Repita a nova senha"
                            autocomplete="new-password"
                        >
                    </div>
                </div>

                <!-- Dicas de segurança -->
                <div class="rounded-lg bg-blue-50 border border-blue-200 p-4">
                    <div class="flex items-start gap-3">
                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-blue-100 text-blue-600 flex-shrink-0">
                            <i class="fa-solid fa-shield-halved text-sm"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-blue-800">Dicas de segurança</p>
                            <ul class="mt-1 text-xs text-blue-700 space-y-1">
                                <li>• Use no mínimo 8 caracteres</li>
                                <li>• Combine letras, números e símbolos</li>
                                <li>• Evite usar informações pessoais</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="mt-6 flex items-center justify-end gap-3 border-t border-gray-200 pt-4">
                <button 
                    type="button" 
                    x-on:click="$wire.closePasswordModal(); Livewire.dispatch('close-modal', { name: 'password-modal' })"
                    class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 
                           text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50"
                >
                    Cancelar
                </button>
                <button 
                    type="submit" 
                    class="inline-flex items-center gap-2 rounded-lg bg-amber-600 px-5 py-2.5 text-sm font-semibold 
                           text-white shadow-sm transition hover:bg-amber-700 focus:outline-none focus:ring-2 
                           focus:ring-amber-500 focus:ring-offset-2"
                >
                    <i class="fa-solid fa-lock text-xs"></i>
                    Alterar Senha
                </button>
            </div>
        </form>
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

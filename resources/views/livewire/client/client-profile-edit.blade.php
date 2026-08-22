<div>
    <!-- Header -->
    <div class="mb-6">
        <div class="flex items-center gap-3 mb-1">
            <a href="{{ route('client.profile') }}" class="text-gray-400 hover:text-gray-600 transition">
                <i class="fa-solid fa-arrow-left text-lg"></i>
            </a>
            <h1 class="text-2xl font-bold text-gray-900">Editar Perfil</h1>
        </div>
        <p class="mt-1 text-sm text-gray-500 ml-9">Atualize suas informações pessoais.</p>
    </div>

    <form wire:submit.prevent="updateProfile" class="space-y-6">

        {{-- ========== AVATAR ========== --}}
        <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-6">
            <div class="flex flex-col sm:flex-row items-center gap-4">
                <div class="relative flex-shrink-0">
                    @if($avatarPreview)
                        <img src="{{ $avatarPreview }}" alt="Preview" class="h-20 w-20 rounded-2xl object-cover shadow-md">
                    @elseif($user->avatar)
                        <img src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}" class="h-20 w-20 rounded-2xl object-cover shadow-md">
                    @else
                        <div class="flex h-20 w-20 items-center justify-center rounded-2xl bg-[#23406C] text-white shadow-md">
                            <span class="text-2xl font-bold">{{ strtoupper(substr($user->name ?? 'C', 0, 1)) }}</span>
                        </div>
                    @endif
                </div>
                <div class="flex-1 w-full sm:w-auto">
                    <input
                        type="file"
                        wire:model="avatar"
                        accept="image/*"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer
                               file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0
                               file:text-sm file:font-semibold file:bg-[#23406C]/10 file:text-[#23406C]
                               hover:file:bg-[#23406C]/20
                               focus:outline-none focus:ring-2 focus:ring-[#23406C]/20 focus:border-[#23406C]">
                    <p class="mt-1.5 text-xs text-gray-500">PNG, JPG ou WebP até 2MB. Conversão automática para WebP.</p>
                    @error('avatar') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    @if($avatarPreview)
                        <button type="button" wire:click="removeAvatarPreview" class="mt-1 text-xs text-red-600 hover:text-red-700">
                            <i class="fa-solid fa-times mr-1"></i> Remover seleção
                        </button>
                    @endif
                </div>
            </div>
        </div>

        {{-- ========== GRID 2 COLUNAS (Desktop) ========== --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            {{-- Coluna Esquerda --}}
            <div class="space-y-6">
                <!-- Dados Básicos -->
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-6">
                    <h3 class="text-base font-semibold text-gray-900 mb-4">
                        <i class="fa-solid fa-user mr-2 text-[#23406C]"></i>
                        Dados Básicos
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Nome *</label>
                            <input type="text" wire:model="name"
                                class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                       shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                       focus:outline-none transition @error('name') border-red-500 @enderror">
                            @error('name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">E-mail *</label>
                            <input type="email" wire:model="email"
                                class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                       shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                       focus:outline-none transition @error('email') border-red-500 @enderror">
                            @error('email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">E-mail Alternativo</label>
                            <input type="email" wire:model="additional_email"
                                class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                       shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                       focus:outline-none transition">
                            @error('additional_email') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Gênero</label>
                            <select wire:model="gender"
                                class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                       shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                       focus:outline-none transition">
                                <option value="">Selecione</option>
                                <option value="male">Masculino</option>
                                <option value="female">Feminino</option>
                                <option value="other">Outro</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Documentos -->
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-6">
                    <h3 class="text-base font-semibold text-gray-900 mb-4">
                        <i class="fa-solid fa-id-card mr-2 text-[#23406C]"></i>
                        Documentos
                    </h3>
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">CPF</label>
                                <input type="text" wire:model="cpf" data-mask-type="cpf" data-imask="1" maxlength="14"
                                    class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                           shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                           focus:outline-none transition"
                                    placeholder="000.000.000-00">
                                @error('cpf') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">RG</label>
                                <input type="text" wire:model="rg"
                                    class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                           shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                           focus:outline-none transition"
                                    placeholder="Número do RG">
                                @error('rg') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Órgão Expedidor</label>
                                <input type="text" wire:model="rg_expedition"
                                    class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                           shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                           focus:outline-none transition"
                                    placeholder="Ex: SSP/SP">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Data de Nascimento</label>
                                <input type="text" wire:model="birthday" data-mask-type="date" data-imask="1" maxlength="10"
                                    class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                           shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                           focus:outline-none transition"
                                    placeholder="00/00/0000">
                                @error('birthday') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Naturalidade</label>
                                <input type="text" wire:model="naturalness"
                                    class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                           shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                           focus:outline-none transition"
                                    placeholder="Cidade - UF">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Estado Civil</label>
                                <select wire:model="civil_status"
                                    class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                           shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                           focus:outline-none transition">
                                    <option value="">Selecione</option>
                                    <option value="single">Solteiro(a)</option>
                                    <option value="married">Casado(a)</option>
                                    <option value="divorced">Divorciado(a)</option>
                                    <option value="widowed">Viúvo(a)</option>
                                    <option value="stable_union">União Estável</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Redes Sociais -->
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-6">
                    <h3 class="text-base font-semibold text-gray-900 mb-4">
                        <i class="fa-solid fa-share-nodes mr-2 text-[#23406C]"></i>
                        Redes Sociais
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                <i class="fa-brands fa-facebook mr-1 text-blue-600"></i> Facebook
                            </label>
                            <input type="url" wire:model="facebook"
                                class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                       shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                       focus:outline-none transition"
                                placeholder="https://facebook.com/seu-perfil">
                            @error('facebook') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                <i class="fa-brands fa-instagram mr-1 text-pink-600"></i> Instagram
                            </label>
                            <input type="url" wire:model="instagram"
                                class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                       shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                       focus:outline-none transition"
                                placeholder="https://instagram.com/seu-perfil">
                            @error('instagram') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                <i class="fa-brands fa-twitter mr-1 text-sky-500"></i> Twitter / X
                            </label>
                            <input type="url" wire:model="twitter"
                                class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                       shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                       focus:outline-none transition"
                                placeholder="https://twitter.com/seu-perfil">
                            @error('twitter') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                <i class="fa-brands fa-linkedin mr-1 text-blue-700"></i> LinkedIn
                            </label>
                            <input type="url" wire:model="linkedin"
                                class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                       shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                       focus:outline-none transition"
                                placeholder="https://linkedin.com/in/seu-perfil">
                            @error('linkedin') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- Coluna Direita --}}
            <div class="space-y-6">
                <!-- Contato -->
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-6">
                    <h3 class="text-base font-semibold text-gray-900 mb-4">
                        <i class="fa-solid fa-address-card mr-2 text-[#23406C]"></i>
                        Contato
                    </h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Telefone</label>
                            <input type="text" wire:model="phone" data-mask-type="phone" data-imask="1" maxlength="15"
                                class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                       shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                       focus:outline-none transition"
                                placeholder="(00) 0000-0000">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Celular</label>
                            <input type="text" wire:model="cell_phone" data-mask-type="phone" data-imask="1" maxlength="15"
                                class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                       shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                       focus:outline-none transition"
                                placeholder="(00) 00000-0000">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">WhatsApp</label>
                            <input type="text" wire:model="whatsapp" data-mask-type="phone" data-imask="1" maxlength="15"
                                class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                       shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                       focus:outline-none transition"
                                placeholder="(00) 00000-0000">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Telegram</label>
                            <input type="text" wire:model="telegram"
                                class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                       shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                       focus:outline-none transition"
                                placeholder="@usuario">
                        </div>
                    </div>
                </div>

                <!-- Endereço -->
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-6">
                    <h3 class="text-base font-semibold text-gray-900 mb-4">
                        <i class="fa-solid fa-location-dot mr-2 text-[#23406C]"></i>
                        Endereço
                    </h3>
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">CEP</label>
                                <input type="text" wire:model.live="zipcode" data-mask-type="cep" data-imask="1" maxlength="9"
                                    class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                           shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                           focus:outline-none transition"
                                    placeholder="00000-000">
                                @error('zipcode') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Logradouro</label>
                                <input type="text" wire:model="street"
                                    class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                           shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                           focus:outline-none transition"
                                    placeholder="Rua, Avenida, etc.">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Número</label>
                                <input type="text" wire:model="number"
                                    class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                           shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                           focus:outline-none transition">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Complemento</label>
                                <input type="text" wire:model="complement"
                                    class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                           shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                           focus:outline-none transition"
                                    placeholder="Apto, Bloco, etc.">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Bairro</label>
                                <input type="text" wire:model="neighborhood"
                                    class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                           shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                           focus:outline-none transition">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">Cidade</label>
                                <input type="text" wire:model="city"
                                    class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900
                                           shadow-sm focus:border-[#23406C] focus:ring-2 focus:ring-[#23406C]/20
                                           focus:outline-none transition">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1.5">UF</label>
                                <input type="text" wire:model="state" readonly
                                    class="w-full rounded-lg border border-gray-200 bg-gray-50 px-3 py-2.5 text-sm text-gray-600
                                           focus:outline-none transition cursor-not-allowed"
                                    placeholder="Preenchido via CEP">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ========== BOTÕES ========== --}}
        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('client.profile') }}"
               class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-5 py-2.5
                      text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50">
                <i class="fa-solid fa-arrow-left text-xs"></i> Cancelar
            </a>
            <button type="submit"
                class="inline-flex items-center gap-2 rounded-lg bg-[#23406C] px-6 py-2.5 text-sm font-semibold
                       text-white shadow-sm transition hover:bg-[#112240] focus:outline-none focus:ring-2
                       focus:ring-[#23406C] focus:ring-offset-2"
                wire:loading.attr="disabled"
                wire:loading.class="opacity-50 cursor-not-allowed">
                <i class="fa-solid fa-save text-xs"></i>
                <span wire:loading.remove>Salvar Alterações</span>
                <span wire:loading>Salvando...</span>
            </button>
        </div>
    </form>
</div>

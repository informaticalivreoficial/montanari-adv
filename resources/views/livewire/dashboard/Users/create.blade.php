<div>
    <!-- Header -->
    <div class="mb-6 flex items-center gap-4">
        <a 
            href="{{ route('dashboard.users') }}"
            class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white p-2 
                   text-gray-600 shadow-sm transition hover:bg-gray-50"
        >
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Novo Usuário</h1>
            <p class="mt-1 text-sm text-gray-500">Preencha os dados para criar um novo usuário.</p>
        </div>
    </div>

    <form wire:submit.prevent="store">
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <!-- Card Principal -->
            <div class="lg:col-span-2">
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">

                    {{-- Seção: Informações Básicas --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-user text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Informações Básicas</h3>
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <x-input name="name" label="Nome completo" required placeholder="Nome completo do usuário" wire:model="name" />
                            <x-input name="email" label="E-mail" type="email" required placeholder="email@exemplo.com" wire:model="email" />
                        </div>
                    </div>

                    <div class="border-t border-gray-100"></div>

                    {{-- Seção: Avatar --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-camera text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Foto do Perfil</h3>
                        </div>
                        <div class="flex items-center gap-6">
                            <div class="shrink-0">
                                @if($avatar)
                                    <img src="{{ $avatar->temporaryUrl() }}" alt="Preview" class="h-16 w-16 rounded-full object-cover border-2 border-amber-200">
                                @else
                                    <div class="flex h-16 w-16 items-center justify-center rounded-full bg-amber-100 text-amber-700">
                                        <i class="fa-solid fa-user text-xl"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="flex-1">
                                <input 
                                    type="file" 
                                    wire:model="avatar" 
                                    accept="image/*"
                                    class="block w-full text-sm text-gray-500 file:mr-4 file:rounded-lg file:border-0 
                                           file:bg-amber-50 file:px-4 file:py-2 file:text-sm file:font-semibold 
                                           file:text-amber-700 hover:file:bg-amber-100 transition cursor-pointer"
                                >
                                <p class="mt-1 text-xs text-gray-500">JPG, PNG ou GIF. Máximo 2MB.</p>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-100"></div>

                    {{-- Seção: Senha --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-lock text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Senha</h3>
                        </div>
                        <x-forms.password :required="true" />
                    </div>

                    <div class="border-t border-gray-100"></div>

                    {{-- Seção: Dados Pessoais --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-id-card text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Dados Pessoais</h3>
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                            <div class="space-y-1">
                                <label for="gender" class="block text-sm font-medium text-gray-700">Gênero</label>
                                <select id="gender" wire:model="gender" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
                                    <option value="">Selecione</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                    <option value="O">Outro</option>
                                </select>
                            </div>
                            <x-input-mask name="cpf" label="CPF" mask-type="cpf" placeholder="000.000.000-00" wire:model="cpf" />
                            <x-input name="rg" label="RG" placeholder="Número do RG" wire:model="rg" />
                            <x-input name="rg_expedition" label="Orgão Expedidor" placeholder="Ex: SSP/SP" wire:model="rg_expedition" />
                            <x-date-picker name="birthday" label="Data de Nascimento" placeholder="Selecione..." max-date="today" wire:model.live="birthday" />
                            <x-input name="naturalness" label="Naturalidade" placeholder="Ex: São Paulo - SP" wire:model="naturalness" />
                            <div class="space-y-1">
                                <label for="civil_status" class="block text-sm font-medium text-gray-700">Estado Civil</label>
                                <select id="civil_status" wire:model="civil_status" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
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

                    <div class="border-t border-gray-100"></div>

                    {{-- Seção: Endereço --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-location-dot text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Endereço</h3>
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                            <x-input-mask name="zipcode" label="CEP" mask-type="cep" placeholder="00000-000" wire:model.live="zipcode" />
                            <div class="sm:col-span-2 lg:col-span-3">
                                <x-input name="street" label="Logradouro" placeholder="Rua, Avenida, etc." wire:model="street" />
                            </div>
                            <x-input name="number" label="Número" placeholder="Nº" wire:model="number" />
                            <x-input name="complement" label="Complemento" placeholder="Apto, Sala, Bloco" wire:model="complement" />
                            <x-input name="neighborhood" label="Bairro" placeholder="Bairro" wire:model="neighborhood" />
                            <x-input name="city" label="Cidade" placeholder="Cidade" wire:model="city" />
                            <div class="space-y-1">
                                <label for="state" class="block text-sm font-medium text-gray-700">UF</label>
                                <select id="state" wire:model="state" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
                                    <option value="">UF</option>
                                    <option value="AC">AC</option><option value="AL">AL</option><option value="AP">AP</option>
                                    <option value="AM">AM</option><option value="BA">BA</option><option value="CE">CE</option>
                                    <option value="DF">DF</option><option value="ES">ES</option><option value="GO">GO</option>
                                    <option value="MA">MA</option><option value="MT">MT</option><option value="MS">MS</option>
                                    <option value="MG">MG</option><option value="PA">PA</option><option value="PB">PB</option>
                                    <option value="PR">PR</option><option value="PE">PE</option><option value="PI">PI</option>
                                    <option value="RJ">RJ</option><option value="RN">RN</option><option value="RS">RS</option>
                                    <option value="RO">RO</option><option value="RR">RR</option><option value="SC">SC</option>
                                    <option value="SP">SP</option><option value="SE">SE</option><option value="TO">TO</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-100"></div>

                    {{-- Seção: Contato --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-phone text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Contato</h3>
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                            <x-input-mask name="phone" label="Telefone" mask-type="phone" placeholder="(00) 0000-0000" wire:model="phone" />
                            <x-input-mask name="cell_phone" label="Celular" mask-type="phone" placeholder="(00) 00000-0000" wire:model="cell_phone" />
                            <x-input-mask name="whatsapp" label="WhatsApp" mask-type="phone" placeholder="(00) 00000-0000" wire:model="whatsapp" />
                            <x-input name="telegram" label="Telegram" placeholder="@usuario" wire:model="telegram" />
                            <div class="sm:col-span-2">
                                <x-input name="additional_email" label="E-mail Adicional" type="email" placeholder="email@exemplo.com" wire:model="additional_email" />
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-100"></div>

                    {{-- Seção: Redes Sociais --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-share-nodes text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Redes Sociais</h3>
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div class="space-y-1">
                                <label for="facebook" class="block text-sm font-medium text-gray-700"><i class="fa-brands fa-facebook text-blue-600 mr-1"></i> Facebook</label>
                                <input type="url" id="facebook" wire:model="facebook" placeholder="https://facebook.com/perfil" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20" />
                            </div>
                            <div class="space-y-1">
                                <label for="instagram" class="block text-sm font-medium text-gray-700"><i class="fa-brands fa-instagram text-pink-600 mr-1"></i> Instagram</label>
                                <input type="url" id="instagram" wire:model="instagram" placeholder="https://instagram.com/perfil" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20" />
                            </div>
                            <div class="space-y-1">
                                <label for="linkedin" class="block text-sm font-medium text-gray-700"><i class="fa-brands fa-linkedin text-blue-700 mr-1"></i> LinkedIn</label>
                                <input type="url" id="linkedin" wire:model="linkedin" placeholder="https://linkedin.com/in/perfil" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20" />
                            </div>
                            <div class="space-y-1">
                                <label for="twitter" class="block text-sm font-medium text-gray-700"><i class="fa-brands fa-x-twitter text-gray-800 mr-1"></i> Twitter / X</label>
                                <input type="url" id="twitter" wire:model="twitter" placeholder="https://x.com/perfil" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 placeholder-gray-400 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20" />
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-100"></div>

                    {{-- Seção: Profissional --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-briefcase text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Informações Profissionais</h3>
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mb-4">
                            <x-input name="position" label="Cargo" placeholder="Ex: Advogado, Estagiário" wire:model="position" />
                            <x-input name="department" label="Departamento" placeholder="Ex: Jurídico, Administrativo" wire:model="department" />
                        </div>
                        <x-textarea name="biography" label="Biografia" rows="3" placeholder="Breve descrição sobre o usuário..." wire:model="biography" />
                    </div>

                    <div class="border-t border-gray-100"></div>

                    {{-- Seção: Observações --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-sticky-note text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Observações</h3>
                        </div>
                        <x-textarea name="information" rows="3" placeholder="Anotações internas sobre este usuário..." wire:model="information" />
                    </div>

                </div>
            </div>

            <!-- Coluna Lateral -->
            <div class="space-y-6">
                <!-- Função -->
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-shield-halved text-sm"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-gray-900">Função</h3>
                                <p class="text-xs text-gray-500">Obrigatório</p>
                            </div>
                        </div>
                        <select 
                            wire:model="role" 
                            class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 
                                   shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 
                                   focus:outline-none transition @error('role') border-red-500 @enderror"
                        >
                            <option value="">Selecione uma função</option>
                            @foreach ($roles as $r)
                                <option value="{{ $r['name'] }}">{{ ucfirst(str_replace('-', ' ', $r['name'])) }}</option>
                            @endforeach
                        </select>
                        @error('role')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Botões de Ação -->
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-6">
                    <div class="space-y-3">
                        <button 
                            type="submit" 
                            class="w-full inline-flex items-center justify-center gap-2 rounded-lg bg-amber-600 px-4 py-3 
                                   text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700 
                                   focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2
                                   disabled:opacity-50 disabled:cursor-not-allowed"
                            wire:loading.attr="disabled"
                            wire:target="store"
                        >
                            <span wire:loading.remove wire:target="store">
                                <i class="fa-solid fa-save text-xs"></i>
                                Criar Usuário
                            </span>
                            <span wire:loading wire:target="store">
                                <i class="fa-solid fa-spinner fa-spin text-xs"></i>
                                Salvando...
                            </span>
                        </button>
                        <a 
                            href="{{ route('dashboard.users') }}"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 
                                   bg-white px-4 py-3 text-sm font-semibold text-gray-700 shadow-sm transition 
                                   hover:bg-gray-50"
                        >
                            <i class="fa-solid fa-times text-xs"></i>
                            Cancelar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="pb-6">

    {{-- ============================================================
         HEADER
    ============================================================ --}}
    <div class="mb-4 flex items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <a
                href="{{ route('dashboard.clients') }}"
                class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-600 shadow-sm transition hover:bg-gray-50"
            >
                <i class="fa-solid fa-arrow-left text-sm"></i>
            </a>

            <div>
                <h1 class="text-xl font-bold text-gray-900">
                    Editar Cliente
                </h1>

                <p class="text-xs text-gray-500">
                    Atualize as informações de
                    <span class="font-semibold text-gray-700">
                        {{ $client->name }}
                    </span>
                </p>
            </div>
        </div>
    </div>


    {{-- ============================================================
         TABS
    ============================================================ --}}
    <div class="mb-4 flex gap-1 rounded-lg border border-gray-200 bg-white p-1 shadow-sm">
        <button
            wire:click="setTab('data')"
            class="flex-1 inline-flex items-center justify-center gap-2 rounded-md px-4 py-2.5 text-sm font-medium transition
                   {{ $activeTab === 'data'
                      ? 'bg-amber-600 text-white shadow-sm'
                      : 'text-gray-600 hover:bg-gray-100' }}"
        >
            <i class="fa-solid fa-user text-xs"></i>
            Dados do Cliente
        </button>
        <button
            wire:click="setTab('documents')"
            class="flex-1 inline-flex items-center justify-center gap-2 rounded-md px-4 py-2.5 text-sm font-medium transition
                   {{ $activeTab === 'documents'
                      ? 'bg-amber-600 text-white shadow-sm'
                      : 'text-gray-600 hover:bg-gray-100' }}"
        >
            <i class="fa-solid fa-file-lines text-xs"></i>
            Documentos
            @if($documents->count() > 0)
                <span class="inline-flex items-center justify-center h-5 min-w-5 rounded-full bg-amber-100 text-amber-700 text-[11px] font-bold px-1.5">
                    {{ $documents->count() }}
                </span>
            @endif
        </button>
    </div>


    {{-- ============================================================
         TAB: DADOS DO CLIENTE
    ============================================================ --}}
    @if($activeTab === 'data')
    <form wire:submit.prevent="update" x-data="{ submitting: false }" x-init="
        new MutationObserver(() => {
            if (!submitting) return;
            const el = document.querySelector('.text-red-500');
            if (el) { submitting = false; el.scrollIntoView({ behavior: 'smooth', block: 'center' }); }
        }).observe($el, { childList: true, subtree: true });
    " x-on:submit="submitting = true">

        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">


            {{-- ====================================================
                 INFORMAÇÕES BÁSICAS + FOTO
            ==================================================== --}}
            <section class="px-5 py-4 lg:px-6 lg:py-5">

                <div class="mb-4 flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                        <i class="fa-solid fa-user text-sm"></i>
                    </div>

                    <div>
                        <h2 class="text-sm font-semibold text-gray-900">
                            Informações Básicas
                        </h2>

                        <p class="text-xs text-gray-500">
                            Nome, e-mail e foto do cliente
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3">

                    <x-input
                        name="name"
                        label="Nome completo"
                        :required="true"
                        wire:model="name"
                    />

                    <x-input
                        name="email"
                        label="E-mail"
                        type="email"
                        :required="true"
                        wire:model="email"
                    />

                    <x-input
                        name="additional_email"
                        label="E-mail Adicional"
                        type="email"
                        placeholder="email@exemplo.com"
                        wire:model="additional_email"
                    />

                </div>

                {{-- Avatar com Drag & Drop --}}
                <div class="mt-3">
                    <div
                        x-data="{ dragging: false, previewUrl: null }"
                        x-on:dragover.prevent="dragging = true"
                        x-on:dragleave.prevent="dragging = false"
                        x-on:drop.prevent="
                            dragging = false;
                            const file = $event.dataTransfer.files[0];
                            if (file && file.type.startsWith('image/')) {
                                const dt = new DataTransfer();
                                dt.items.add(file);
                                $refs.avatarInput.files = dt.files;
                                const reader = new FileReader();
                                reader.onload = e => previewUrl = e.target.result;
                                reader.readAsDataURL(file);
                                $refs.avatarInput.dispatchEvent(new Event('change', { bubbles: true }));
                            }
                        "
                        class="relative flex items-center gap-4 rounded-lg border-2 border-dashed transition-colors cursor-pointer
                               px-4 py-3 max-w-md"
                        :class="dragging
                            ? 'border-blue-400 bg-blue-50'
                            : (@error('avatar') 'border-red-500 bg-red-50/30' @else 'border-gray-200 hover:border-blue-300 hover:bg-gray-50' @enderror)"
                        x-on:click="$refs.avatarInput.click()"
                    >
                        {{-- Preview --}}
                        <div class="shrink-0">
                            @if($avatar)
                                <img src="{{ $avatar->temporaryUrl() }}" alt="Preview" class="h-20 w-20 rounded-full object-cover border-2 border-blue-200">
                            @elseif($currentAvatar)
                                <img src="{{ $currentAvatar }}" alt="{{ $name }}" class="h-20 w-20 rounded-full object-cover border-2 border-blue-200">
                            @else
                                <img x-show="previewUrl" :src="previewUrl" class="h-20 w-20 rounded-full object-cover border-2 border-blue-200">
                                <div x-show="!previewUrl" class="flex h-20 w-20 items-center justify-center rounded-full bg-blue-100 text-blue-700">
                                    <i class="fa-solid fa-cloud-arrow-up text-2xl"></i>
                                </div>
                            @endif
                        </div>

                        {{-- Texto --}}
                        <div class="min-w-0 flex-1 pt-1">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Foto do Perfil</label>

                            <template x-if="!dragging">
                                <p class="text-xs text-gray-500">
                                    <span class="font-semibold text-blue-600">Clique para selecionar</span> ou arraste uma imagem
                                </p>
                            </template>

                            <template x-if="dragging">
                                <p class="text-xs font-semibold text-blue-600">
                                    <i class="fa-solid fa-arrow-down mr-1"></i> Solte a imagem aqui
                                </p>
                            </template>

                            <p class="mt-0.5 text-[11px] text-gray-400">JPG, PNG ou GIF. Máximo 2MB.</p>
                        </div>

                        {{-- Input file oculto --}}
                        <input
                            type="file"
                            x-ref="avatarInput"
                            wire:model="avatar"
                            accept="image/*"
                            class="hidden"
                        >
                    </div>

                    @error('avatar')
                        <p class="flex items-center gap-1 text-xs text-red-500 mt-1">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

            </section>


            <div class="border-t border-gray-100"></div>


            {{-- ====================================================
                 DADOS PESSOAIS
            ==================================================== --}}
            <section class="px-5 py-4 lg:px-6 lg:py-5">

                <div class="mb-4 flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                        <i class="fa-solid fa-id-card text-sm"></i>
                    </div>

                    <div>
                        <h2 class="text-sm font-semibold text-gray-900">
                            Dados Pessoais
                        </h2>

                        <p class="text-xs text-gray-500">
                            Informações pessoais do cliente
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-4">

                    <x-select name="gender" label="Gênero" placeholder="Selecione" :options="['M' => 'Masculino', 'F' => 'Feminino', 'O' => 'Outro']" wire:model="gender" />

                    <x-input-mask name="cpf" label="CPF" mask-type="cpf" placeholder="000.000.000-00" wire:model="cpf" />

                    <x-input name="rg" label="RG" placeholder="Número do RG" wire:model="rg" />

                    <x-input name="rg_expedition" label="Orgão Expedidor" placeholder="Ex: SSP/SP" wire:model="rg_expedition" />

                </div>

                <div class="mt-3 grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-4">

                    <x-date-picker name="birthday" label="Data de Nascimento" placeholder="Selecione..." max-date="today" wire:model.live="birthday" />

                    <x-input name="naturalness" label="Naturalidade" placeholder="Ex: São Paulo - SP" wire:model="naturalness" />

                    <x-select
                        name="civil_status"
                        label="Estado Civil"
                        placeholder="Selecione"
                        :options="[
                            'single' => 'Solteiro(a)',
                            'married' => 'Casado(a)',
                            'divorced' => 'Divorciado(a)',
                            'widowed' => 'Viúvo(a)',
                            'stable_union' => 'União Estável',
                        ]"
                        wire:model="civil_status"
                    />

                </div>

            </section>


            <div class="border-t border-gray-100"></div>


            {{-- ====================================================
                 ENDEREÇO
            ==================================================== --}}
            <section class="px-5 py-4 lg:px-6 lg:py-5">

                <div class="mb-4 flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                        <i class="fa-solid fa-location-dot text-sm"></i>
                    </div>

                    <div>
                        <h2 class="text-sm font-semibold text-gray-900">
                            Endereço
                        </h2>

                        <p class="text-xs text-gray-500">
                            Endereço residencial
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-6">

                    <div class="lg:col-span-2">
                        <x-input name="street" label="Logradouro" placeholder="Rua, Avenida, etc." wire:model="street" />
                    </div>

                    <x-input-mask name="zipcode" label="CEP" mask-type="cep" placeholder="00000-000" wire:model.live="zipcode" />

                    <x-input name="number" label="Nº" placeholder="Nº" wire:model="number" />

                    <x-input name="complement" label="Compl." placeholder="Apto, Sala" wire:model="complement" />

                    <x-input name="neighborhood" label="Bairro" placeholder="Bairro" wire:model="neighborhood" />

                </div>

                <div class="mt-3 grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-6">

                    <div class="lg:col-span-3">
                        <x-input name="city" label="Cidade" placeholder="Cidade" wire:model="city" />
                    </div>

                    <div class="space-y-1">
                        <label for="state" class="block text-sm font-medium text-gray-700">
                            UF
                        </label>
                        <select
                            id="state"
                            wire:model="state"
                            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500/20"
                        >
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

            </section>


            <div class="border-t border-gray-100"></div>


            {{-- ====================================================
                 CONTATO
            ==================================================== --}}
            <section class="px-5 py-4 lg:px-6 lg:py-5">

                <div class="mb-4 flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                        <i class="fa-solid fa-phone text-sm"></i>
                    </div>

                    <div>
                        <h2 class="text-sm font-semibold text-gray-900">
                            Contato
                        </h2>

                        <p class="text-xs text-gray-500">
                            Telefones e e-mails
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-4">

                    <x-input-mask name="phone" label="Telefone" mask-type="phone" placeholder="(00) 0000-0000" wire:model="phone" />

                    <x-input-mask name="cell_phone" label="Celular" mask-type="phone" placeholder="(00) 00000-0000" wire:model="cell_phone" />

                    <x-input-mask name="whatsapp" label="WhatsApp" mask-type="phone" placeholder="(00) 00000-0000" wire:model="whatsapp" />

                    <x-input name="telegram" label="Telegram" placeholder="@usuario" wire:model="telegram" />

                </div>

            </section>


            <div class="border-t border-gray-100"></div>


            {{-- ====================================================
                 OBSERVAÇÕES
            ==================================================== --}}
            <section class="px-5 py-4 lg:px-6 lg:py-5">

                <div class="mb-4 flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                        <i class="fa-solid fa-sticky-note text-sm"></i>
                    </div>

                    <div>
                        <h2 class="text-sm font-semibold text-gray-900">
                            Observações
                        </h2>

                        <p class="text-xs text-gray-500">
                            Anotações internas sobre este cliente
                        </p>
                    </div>
                </div>

                <x-textarea
                    name="information"
                    label="Observações"
                    rows="3"
                    placeholder="Anotações internas sobre este cliente..."
                    wire:model="information"
                />

            </section>


            {{-- ====================================================
                 INFORMAÇÕES DO REGISTRO
            ==================================================== --}}
            <section class="bg-gray-50/50 px-5 py-4 lg:px-6 lg:py-5">

                <div class="mb-3 flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-gray-100 text-gray-600">
                        <i class="fa-solid fa-circle-info text-sm"></i>
                    </div>

                    <div>
                        <h2 class="text-sm font-semibold text-gray-900">
                            Informações do Registro
                        </h2>

                        <p class="text-xs text-gray-500">
                            Dados técnicos do cadastro
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">

                    <div class="space-y-1">
                        <label class="block text-xs font-medium text-gray-600">ID</label>
                        <div class="rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-mono text-gray-600">
                            #{{ $client->id }}
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-xs font-medium text-gray-600">Criado em</label>
                        <div class="rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm text-gray-600">
                            {{ $client->created_at?->format('d/m/Y H:i') ?? '-' }}
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-xs font-medium text-gray-600">Último login</label>
                        <div class="rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm text-gray-600">
                            {{ $client->last_login_at?->format('d/m/Y H:i') ?? 'Nunca' }}
                        </div>
                    </div>

                </div>

            </section>


            {{-- ====================================================
                 RODAPÉ / AÇÕES
            ==================================================== --}}
            <div class="sticky bottom-0 border-t border-gray-200 bg-white/95 px-5 py-3 backdrop-blur lg:px-6">

                <div class="flex flex-col-reverse gap-2 sm:flex-row sm:items-center sm:justify-end">

                    <a
                        href="{{ route('dashboard.clients') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50"
                    >
                        <i class="fa-solid fa-times text-xs"></i>
                        Cancelar
                    </a>

                    <button
                        type="submit"
                        wire:loading.attr="disabled"
                        wire:target="update"
                        class="inline-flex items-center justify-center gap-2 rounded-lg bg-amber-600 px-5 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                    >

                        <span wire:loading.remove wire:target="update">
                            <i class="fa-solid fa-save text-xs"></i>
                            Salvar Alterações
                        </span>

                        <span wire:loading wire:target="update">
                            <i class="fa-solid fa-spinner fa-spin text-xs"></i>
                            Salvando...
                        </span>

                    </button>

                </div>

            </div>

        </div>

    </form>
    @endif


    {{-- ============================================================
         TAB: DOCUMENTOS
    ============================================================ --}}
    @if($activeTab === 'documents')
        <livewire:dashboard.clients.client-documents-tab :clientId="$clientId" :key="'docs-'.$clientId" />
    @endif

</div>

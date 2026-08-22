<div>
    <!-- Header -->
    <div class="mb-6 flex items-center gap-4">
        <a
            href="{{ route('dashboard.legal.processes') }}"
            class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white p-2 text-gray-600 shadow-sm transition hover:bg-gray-50"
        >
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Novo Processo</h1>
            <p class="mt-1 text-sm text-gray-500">Preencha os dados para criar um novo processo jurídico.</p>
        </div>
    </div>

    <form wire:submit.prevent="store">
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <!-- Main Card -->
            <div class="lg:col-span-2">
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">

                    {{-- Section: Basic Info --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-folder-open text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Dados do Processo</h3>
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <x-input name="process_number" label="Número do Processo" required placeholder="Ex: 0001234-56.2026.8.26.0001" wire:model="process_number" />
                            <x-input name="court_name" label="Nome do Tribunal" placeholder="Ex: Tribunal de Justiça de SP" wire:model="court_name" />
                            <x-input name="court_variable" label="Vara" placeholder="Ex: 1ª Vara Cível" wire:model="court_variable" />
                            <div class="space-y-1">
                                <label class="block text-sm font-medium text-gray-700">Tipo de Ação <span class="text-red-500">*</span></label>
                                <select wire:model="case_type" required class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
                                    <option value="">Selecione</option>
                                    <option value="civil">Cível</option>
                                    <option value="criminal">Criminal</option>
                                    <option value="family">Família</option>
                                    <option value="labor">Trabalhista</option>
                                    <option value="administrative">Administrativo</option>
                                    <option value="tax">Tributário</option>
                                    <option value="consumer">Consumidor</option>
                                    <option value="other">Outro</option>
                                </select>
                            </div>
                            <x-input name="case_area" label="Área" placeholder="Ex: Direito de Família" wire:model="case_area" />
                        </div>
                    </div>

                    <div class="border-t border-gray-100"></div>

                    {{-- Section: Parties --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-users text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Partes</h3>
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <x-input name="opposing_party" label="Parte Contrária" placeholder="Nome da parte contrária" wire:model="opposing_party" />
                            <x-input name="opposing_lawyer" label="Advogado da Parte Contrária" placeholder="OAB/UF e nome" wire:model="opposing_lawyer" />
                        </div>
                    </div>

                    <div class="border-t border-gray-100"></div>

                    {{-- Section: Description --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-align-left text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Descrição</h3>
                        </div>
                        <x-textarea name="description" label="Descrição do Processo" rows="3" placeholder="Descreva brevemente o objeto do processo..." wire:model="description" />
                    </div>

                    <div class="border-t border-gray-100"></div>

                    {{-- Section: Financial --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-dollar-sign text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Dados Financeiros</h3>
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <x-input name="contract_value" label="Valor do Contrato" placeholder="R$ 0,00" wire:model="contract_value" />
                            <x-input name="client_interest" label="% Sucumbência" placeholder="Ex: 10" type="number" wire:model="client_interest" />
                        </div>
                    </div>

                    <div class="border-t border-gray-100"></div>

                    {{-- Section: Notes --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-sticky-note text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Observações Internas</h3>
                        </div>
                        <x-textarea name="internal_notes" rows="3" placeholder="Anotações internas sobre este processo..." wire:model="internal_notes" />
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Client -->
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-user text-sm"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-gray-900">Cliente</h3>
                                <p class="text-xs text-gray-500">Obrigatório</p>
                            </div>
                        </div>
                        <select wire:model="client_id" required class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 focus:outline-none transition @error('client_id') border-red-500 @enderror">
                            <option value="">Selecione o cliente</option>
                            @foreach($clients as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                        @error('client_id')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Responsible -->
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-user-tie text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Responsável</h3>
                        </div>
                        <select wire:model="responsible_id" class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 focus:outline-none transition">
                            <option value="">Selecione</option>
                            @foreach($team as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Status -->
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-tag text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Status</h3>
                        </div>
                        <select wire:model="status" class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 focus:outline-none transition">
                            <option value="active">Ativo</option>
                            <option value="suspended">Suspenso</option>
                            <option value="archived">Arquivado</option>
                            <option value="closed">Encerrado</option>
                        </select>
                    </div>
                </div>

                <!-- Actions -->
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm p-6">
                    <div class="space-y-3">
                        <button
                            type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-lg bg-amber-600 px-4 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed"
                            wire:loading.attr="disabled"
                            wire:target="store"
                        >
                            <span wire:loading.remove wire:target="store">
                                <i class="fa-solid fa-save text-xs"></i>
                                Criar Processo
                            </span>
                            <span wire:loading wire:target="store">
                                <i class="fa-solid fa-spinner fa-spin text-xs"></i>
                                Salvando...
                            </span>
                        </button>
                        <a
                            href="{{ route('dashboard.legal.processes') }}"
                            class="w-full inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50"
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

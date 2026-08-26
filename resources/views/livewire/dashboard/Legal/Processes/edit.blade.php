<div x-data="{ activeSection: 'dados' }">
    <!-- Header -->
    <div class="mb-6 flex items-center gap-4">
        <a
            href="{{ route('dashboard.legal.processes') }}"
            aria-label="Voltar para lista de processos"
            class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white p-2 text-gray-600 shadow-sm transition hover:bg-gray-50"
        >
            <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Editar Processo</h1>
            <p class="mt-1 text-sm text-gray-500">Atualize as informações de <span class="font-medium text-gray-700">{{ $process->process_number }}</span></p>
        </div>
    </div>

    @if ($errors->any())
        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4">
            <p class="text-sm font-semibold text-red-800">
                <i class="fa-solid fa-circle-exclamation" aria-hidden="true"></i>
                Corrija os erros abaixo antes de salvar ({{ $errors->count() }}):
            </p>
            <ul class="mt-2 list-inside list-disc text-sm text-red-700">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form wire:submit.prevent="update" class="pb-24">
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <!-- Main Card -->
            <div class="lg:col-span-2 space-y-4">

                {{-- Section: Basic Info (open by default) --}}
                <details id="dados" open class="group rounded-xl border border-gray-200 bg-white shadow-sm">
                    <summary class="flex cursor-pointer list-none items-center justify-between px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-folder-open text-sm" aria-hidden="true"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Dados do Processo</h3>
                        </div>
                        <i class="fa-solid fa-chevron-down text-xs text-gray-400 transition group-open:rotate-180" aria-hidden="true"></i>
                    </summary>
                    <div class="border-t border-gray-100 px-6 py-5">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                            <div>
                                <x-input name="process_number" label="Número do Processo" required placeholder="Ex: 0001234-56.2026.8.26.0001" wire:model="process_number" />
                                @error('process_number') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>
                            <x-input name="cnj_number" label="Número CNJ" placeholder="Número CNJ completo" wire:model="cnj_number" />

                            {{-- Consulta Datajud --}}
                            <div class="sm:col-span-2 rounded-lg border border-amber-200 bg-amber-50/60 p-3">
                                <div class="flex flex-col gap-3 sm:flex-row sm:items-end">
                                    <div class="w-full sm:w-1/3">
                                        <label for="datajud_tribunal" class="block text-sm font-medium text-gray-700">Tribunal (Datajud)</label>
                                        <select id="datajud_tribunal" wire:model="datajud_tribunal" class="mt-1 w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 shadow-sm focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
                                            <option value="">Selecione o tribunal</option>
                                            @foreach($tribunais as $sigla => $nome)
                                                <option value="{{ $sigla }}">{{ strtoupper($sigla) }} — {{ $nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="w-full sm:w-2/3">
                                        <button
                                            type="button"
                                            wire:click="consultarDatajud"
                                            wire:loading.attr="disabled"
                                            wire:target="consultarDatajud"
                                            :disabled="!$wire.datajud_tribunal"
                                            class="inline-flex w-full items-center justify-center gap-2 rounded-lg border border-amber-600 bg-amber-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700 disabled:cursor-not-allowed disabled:opacity-50"
                                        >
                                            <span wire:loading.remove wire:target="consultarDatajud">
                                                <i class="fa-solid fa-magnifying-glass text-xs" aria-hidden="true"></i>
                                                Consultar Datajud
                                            </span>
                                            <span wire:loading wire:target="consultarDatajud">
                                                <i class="fa-solid fa-spinner fa-spin text-xs" aria-hidden="true"></i>
                                                Consultando...
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                @if($datajud_error)
                                    <p class="mt-2 text-xs text-red-600" role="alert">
                                        <i class="fa-solid fa-circle-exclamation" aria-hidden="true"></i> {{ $datajud_error }}
                                    </p>
                                @endif
                                <p class="mt-2 text-xs text-gray-500">
                                    Busca o processo na API Pública do CNJ e pré-preenche o formulário. Revise os dados e salve.
                                </p>
                            </div>
                            <x-input name="court_name" label="Nome do Tribunal" placeholder="Ex: Tribunal de Justiça de SP" wire:model="court_name" />
                            <x-input name="court_variable" label="Vara" placeholder="Ex: 1ª Vara Cível" wire:model="court_variable" />
                            <div class="space-y-1">
                                <label for="case_type" class="block text-sm font-medium text-gray-700">Tipo de Ação <span class="text-red-500">*</span></label>
                                <select id="case_type" wire:model="case_type" required class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20 @error('case_type') border-red-500 @enderror">
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
                                @error('case_type') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>
                            <x-input name="case_area" label="Área" placeholder="Ex: Direito de Família" wire:model="case_area" />
                            <x-input name="action_type" label="Tipo de Ação (detalhe)" placeholder="Ex: Ordinária, Executiva" wire:model="action_type" />
                        </div>
                    </div>
                </details>

                {{-- Section: Origem / Tribunal --}}
                <details id="origem" class="group rounded-xl border border-gray-200 bg-white shadow-sm">
                    <summary class="flex cursor-pointer list-none items-center justify-between px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-building-columns text-sm" aria-hidden="true"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Origem / Tribunal</h3>
                        </div>
                        <i class="fa-solid fa-chevron-down text-xs text-gray-400 transition group-open:rotate-180" aria-hidden="true"></i>
                    </summary>
                    <div class="border-t border-gray-100 px-6 py-5">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                            <x-input name="legacy_number" label="Número Antigo" wire:model="legacy_number" />
                            <x-input name="external_number" label="Número Externo" wire:model="external_number" />
                            <x-input name="court_acronym" label="Sigla do Tribunal" wire:model="court_acronym" />
                            <x-input name="justice_segment" label="Segmento de Justiça" placeholder="Ex: Justiça Estadual" wire:model="justice_segment" />
                            <x-input name="instance_level" label="Grau" placeholder="Ex: 1º grau, 2º grau" wire:model="instance_level" />
                            <x-input name="state" label="UF" maxlength="2" wire:model="state" />
                            <x-input name="judicial_district" label="Comarca" wire:model="judicial_district" />
                            <x-input name="judicial_district_code" label="Código da Comarca" wire:model="judicial_district_code" />
                            <x-input name="forum" label="Foro" wire:model="forum" />
                            <x-input name="forum_code" label="Código do Foro" wire:model="forum_code" />
                            <x-input name="court_division_code" label="Código da Vara" wire:model="court_division_code" />
                            <x-input name="judicial_unit" label="Unidade Judiciária" wire:model="judicial_unit" />
                        </div>
                    </div>
                </details>

                {{-- Section: Parties --}}
                <details id="partes" class="group rounded-xl border border-gray-200 bg-white shadow-sm">
                    <summary class="flex cursor-pointer list-none items-center justify-between px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-users text-sm" aria-hidden="true"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Partes</h3>
                        </div>
                        <i class="fa-solid fa-chevron-down text-xs text-gray-400 transition group-open:rotate-180" aria-hidden="true"></i>
                    </summary>
                    <div class="border-t border-gray-100 px-6 py-5">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                            <x-input name="opposing_party" label="Parte Contrária" placeholder="Nome da parte contrária" wire:model="opposing_party" />
                            <x-input name="opposing_lawyer" label="Advogado da Parte Contrária" placeholder="OAB/UF e nome" wire:model="opposing_lawyer" />
                        </div>
                    </div>
                </details>

                {{-- Section: Classificação --}}
                <details id="classificacao" class="group rounded-xl border border-gray-200 bg-white shadow-sm">
                    <summary class="flex cursor-pointer list-none items-center justify-between px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-tags text-sm" aria-hidden="true"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Classificação</h3>
                        </div>
                        <i class="fa-solid fa-chevron-down text-xs text-gray-400 transition group-open:rotate-180" aria-hidden="true"></i>
                    </summary>
                    <div class="border-t border-gray-100 px-6 py-5">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                            <x-input name="case_class" label="Classe Processual" wire:model="case_class" />
                            <x-input name="case_class_code" label="Código da Classe" wire:model="case_class_code" />
                            <x-input name="main_subject" label="Assunto Principal" wire:model="main_subject" />
                            <x-input name="main_subject_code" label="Código do Assunto" wire:model="main_subject_code" />
                            <x-input name="nature" label="Natureza" wire:model="nature" />
                        </div>
                    </div>
                </details>

                {{-- Section: Description --}}
                <details id="descricao" open class="group rounded-xl border border-gray-200 bg-white shadow-sm">
                    <summary class="flex cursor-pointer list-none items-center justify-between px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-align-left text-sm" aria-hidden="true"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Descrição</h3>
                        </div>
                        <i class="fa-solid fa-chevron-down text-xs text-gray-400 transition group-open:rotate-180" aria-hidden="true"></i>
                    </summary>
                    <div class="border-t border-gray-100 px-6 py-5">
                        <x-textarea name="description" label="Descrição do Processo" rows="3" placeholder="Descreva brevemente o objeto do processo..." wire:model="description" />
                    </div>
                </details>

                {{-- Section: Fase / Situação --}}
                <details id="fase" class="group rounded-xl border border-gray-200 bg-white shadow-sm">
                    <summary class="flex cursor-pointer list-none items-center justify-between px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-flag text-sm" aria-hidden="true"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Fase / Situação</h3>
                        </div>
                        <i class="fa-solid fa-chevron-down text-xs text-gray-400 transition group-open:rotate-180" aria-hidden="true"></i>
                    </summary>
                    <div class="border-t border-gray-100 px-6 py-5">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                            <x-input name="process_phase" label="Fase Processual" placeholder="Ex: Conhecimento, Execução" wire:model="process_phase" />
                            <x-input name="court_status" label="Status no Tribunal" wire:model="court_status" />
                            <x-input name="situation" label="Situação" placeholder="Ex: Em andamento, Arquivado" wire:model="situation" />
                        </div>
                        <div class="mt-4">
                            <x-textarea name="situation_reason" label="Motivo da Situação" rows="2" wire:model="situation_reason" />
                        </div>
                    </div>
                </details>

                {{-- Section: Datas --}}
                <details id="datas" class="group rounded-xl border border-gray-200 bg-white shadow-sm">
                    <summary class="flex cursor-pointer list-none items-center justify-between px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-calendar-days text-sm" aria-hidden="true"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Datas Importantes</h3>
                        </div>
                        <i class="fa-solid fa-chevron-down text-xs text-gray-400 transition group-open:rotate-180" aria-hidden="true"></i>
                    </summary>
                    <div class="border-t border-gray-100 px-6 py-5">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                            <x-input name="distribution_date" label="Distribuição" type="text" data-flatpickr data-date-format="Y-m-d" data-alt-input="true" data-alt-format="d/m/Y" wire:model="distribution_date" />
                            <x-input name="filing_date" label="Autuação" type="text" data-flatpickr data-date-format="Y-m-d" data-alt-input="true" data-alt-format="d/m/Y" wire:model="filing_date" />
                            <x-input name="start_date" label="Início" type="text" data-flatpickr data-date-format="Y-m-d" data-alt-input="true" data-alt-format="d/m/Y" wire:model="start_date" />
                            <x-input name="summons_date" label="Citação" type="text" data-flatpickr data-date-format="Y-m-d" data-alt-input="true" data-alt-format="d/m/Y" wire:model="summons_date" />
                            <x-input name="sentence_date" label="Sentença" type="text" data-flatpickr data-date-format="Y-m-d" data-alt-input="true" data-alt-format="d/m/Y" wire:model="sentence_date" />
                            <x-input name="res_judicata_date" label="Trânsito em Julgado" type="text" data-flatpickr data-date-format="Y-m-d" data-alt-input="true" data-alt-format="d/m/Y" wire:model="res_judicata_date" />
                            <x-input name="closure_date" label="Baixa" type="text" data-flatpickr data-date-format="Y-m-d" data-alt-input="true" data-alt-format="d/m/Y" wire:model="closure_date" />
                            <x-input name="archival_date" label="Arquivamento" type="text" data-flatpickr data-date-format="Y-m-d" data-alt-input="true" data-alt-format="d/m/Y" wire:model="archival_date" />
                            <x-input name="unarchival_date" label="Desarquivamento" type="text" data-flatpickr data-date-format="Y-m-d" data-alt-input="true" data-alt-format="d/m/Y" wire:model="unarchival_date" />
                            <x-input name="last_movement_date" label="Última Movimentação" type="text" data-flatpickr data-date-format="Y-m-d" data-alt-input="true" data-alt-format="d/m/Y" wire:model="last_movement_date" />
                        </div>
                    </div>
                </details>

                {{-- Section: Financial --}}
                <details id="financeiro" class="group rounded-xl border border-gray-200 bg-white shadow-sm">
                    <summary class="flex cursor-pointer list-none items-center justify-between px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-dollar-sign text-sm" aria-hidden="true"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Dados Financeiros</h3>
                        </div>
                        <i class="fa-solid fa-chevron-down text-xs text-gray-400 transition group-open:rotate-180" aria-hidden="true"></i>
                    </summary>
                    <div class="border-t border-gray-100 px-6 py-5">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                            <x-input name="contract_value" label="Valor do Contrato" placeholder="R$ 0,00" data-mask-type="decimal" wire:model="contract_value" />
                            <div>
                                <x-input name="client_interest" label="% Sucumbência" type="number" min="0" max="100" step="0.01" wire:model="client_interest" />
                                @error('client_interest') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>
                            <x-input name="cause_value" label="Valor da Causa" type="text" data-mask-type="decimal" wire:model="cause_value" />
                            <x-input name="updated_cause_value" label="Valor Atualizado" type="text" data-mask-type="decimal" wire:model="updated_cause_value" />
                            <x-input name="conviction_value" label="Valor da Condenação" type="text" data-mask-type="decimal" wire:model="conviction_value" />
                            <x-input name="executed_value" label="Valor Executado" type="text" data-mask-type="decimal" wire:model="executed_value" />
                            <x-input name="received_value" label="Valor Recebido" type="text" data-mask-type="decimal" wire:model="received_value" />
                            <x-input name="pending_value" label="Valor Pendente" type="text" data-mask-type="decimal" wire:model="pending_value" />
                            <div class="space-y-1">
                                <label for="currency" class="block text-sm font-medium text-gray-700">Moeda</label>
                                <select id="currency" wire:model="currency" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
                                    <option value="BRL">BRL</option>
                                    <option value="USD">USD</option>
                                    <option value="EUR">EUR</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </details>

                {{-- Section: Segredo / Prioridades --}}
                <details id="prioridades" class="group rounded-xl border border-gray-200 bg-white shadow-sm">
                    <summary class="flex cursor-pointer list-none items-center justify-between px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-shield-halved text-sm" aria-hidden="true"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Segredo de Justiça / Prioridades</h3>
                        </div>
                        <i class="fa-solid fa-chevron-down text-xs text-gray-400 transition group-open:rotate-180" aria-hidden="true"></i>
                    </summary>
                    <div class="border-t border-gray-100 px-6 py-5">
                        <fieldset>
                            <legend class="sr-only">Marcadores de segredo, gratuidade e prioridade</legend>
                            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3">
                                <label class="flex items-center gap-2 text-sm text-gray-700"><input type="checkbox" wire:model="secret_of_justice" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Segredo de justiça</label>
                                <label class="flex items-center gap-2 text-sm text-gray-700"><input type="checkbox" wire:model="free_justice" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Justiça gratuita</label>
                                <label class="flex items-center gap-2 text-sm text-gray-700"><input type="checkbox" wire:model="priority" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Prioridade</label>
                                <label class="flex items-center gap-2 text-sm text-gray-700"><input type="checkbox" wire:model="elderly" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Idoso</label>
                                <label class="flex items-center gap-2 text-sm text-gray-700"><input type="checkbox" wire:model="disabled" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Deficiente</label>
                                <label class="flex items-center gap-2 text-sm text-gray-700"><input type="checkbox" wire:model="serious_illness" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Doença grave</label>
                            </div>
                        </fieldset>
                        <div class="mt-4">
                            <x-input name="priority_type" label="Tipo de Prioridade" wire:model="priority_type" />
                        </div>
                    </div>
                </details>

                {{-- Section: Liminar / Tutela --}}
                <details id="liminar" class="group rounded-xl border border-gray-200 bg-white shadow-sm">
                    <summary class="flex cursor-pointer list-none items-center justify-between px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-gavel text-sm" aria-hidden="true"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Liminar / Tutela / Urgência</h3>
                        </div>
                        <i class="fa-solid fa-chevron-down text-xs text-gray-400 transition group-open:rotate-180" aria-hidden="true"></i>
                    </summary>
                    <div class="border-t border-gray-100 px-6 py-5">
                        <fieldset>
                            <legend class="sr-only">Marcadores de liminar, tutela e urgência</legend>
                            <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                                <label class="flex items-center gap-2 text-sm text-gray-700"><input type="checkbox" wire:model="has_injunction" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Possui liminar</label>
                                <label class="flex items-center gap-2 text-sm text-gray-700"><input type="checkbox" wire:model="has_preliminary_injunction" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Possui tutela</label>
                                <label class="flex items-center gap-2 text-sm text-gray-700"><input type="checkbox" wire:model="has_urgency" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Possui urgência</label>
                            </div>
                        </fieldset>
                        <div class="mt-4">
                            <x-textarea name="injunction_notes" label="Observações de Liminar" rows="2" wire:model="injunction_notes" />
                        </div>
                    </div>
                </details>

                {{-- Section: Audiências --}}
                <details id="audiencias" class="group rounded-xl border border-gray-200 bg-white shadow-sm">
                    <summary class="flex cursor-pointer list-none items-center justify-between px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-scale-balanced text-sm" aria-hidden="true"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Audiências</h3>
                        </div>
                        <i class="fa-solid fa-chevron-down text-xs text-gray-400 transition group-open:rotate-180" aria-hidden="true"></i>
                    </summary>
                    <div class="border-t border-gray-100 px-6 py-5">
                        <label class="flex items-center gap-2 text-sm text-gray-700 mb-4"><input type="checkbox" wire:model="has_hearing" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Possui audiência</label>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                            <x-input name="next_hearing_at" label="Próxima Audiência" type="text" data-flatpickr data-enable-time="true" data-time-24hr="true" data-date-format="Y-m-d H:i" data-alt-input="true" data-alt-format="d/m/Y H:i" wire:model="next_hearing_at" />
                            <x-input name="next_hearing_type" label="Tipo de Audiência" wire:model="next_hearing_type" />
                            <x-input name="next_hearing_location" label="Local da Audiência" wire:model="next_hearing_location" />
                        </div>
                        <div class="mt-4">
                            <x-textarea name="hearing_notes" label="Observações de Audiência" rows="2" wire:model="hearing_notes" />
                        </div>
                    </div>
                </details>

                {{-- Section: Sentença / Recurso --}}
                <details id="sentenca" class="group rounded-xl border border-gray-200 bg-white shadow-sm">
                    <summary class="flex cursor-pointer list-none items-center justify-between px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-bookmark text-sm" aria-hidden="true"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Sentença / Recurso</h3>
                        </div>
                        <i class="fa-solid fa-chevron-down text-xs text-gray-400 transition group-open:rotate-180" aria-hidden="true"></i>
                    </summary>
                    <div class="border-t border-gray-100 px-6 py-5">
                        <fieldset>
                            <legend class="sr-only">Marcadores de sentença e recurso</legend>
                            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3">
                                <label class="flex items-center gap-2 text-sm text-gray-700"><input type="checkbox" wire:model="has_sentence" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Possui sentença</label>
                                <label class="flex items-center gap-2 text-sm text-gray-700"><input type="checkbox" wire:model="has_appeal" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Houve recurso</label>
                                <x-input name="sentence_result" label="Resultado da Sentença" wire:model="sentence_result" />
                                <x-input name="appeal_type" label="Tipo de Recurso" wire:model="appeal_type" />
                                <x-input name="appeal_result" label="Resultado do Recurso" wire:model="appeal_result" />
                            </div>
                        </fieldset>
                    </div>
                </details>

                {{-- Section: Notes --}}
                <details id="observacoes" class="group rounded-xl border border-gray-200 bg-white shadow-sm">
                    <summary class="flex cursor-pointer list-none items-center justify-between px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-sticky-note text-sm" aria-hidden="true"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Observações</h3>
                        </div>
                        <i class="fa-solid fa-chevron-down text-xs text-gray-400 transition group-open:rotate-180" aria-hidden="true"></i>
                    </summary>
                    <div class="border-t border-gray-100 px-6 py-5">
                        <x-textarea name="internal_notes" label="Observações Internas" rows="3" placeholder="Anotações internas sobre este processo..." wire:model="internal_notes" />
                        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                            <x-input name="internal_title" label="Título Interno" wire:model="internal_title" />
                            <x-input name="internal_code" label="Código Interno" wire:model="internal_code" />
                            <x-input name="folder" label="Pasta" wire:model="folder" />
                            <x-input name="folder_number" label="Número da Pasta" wire:model="folder_number" />
                        </div>
                        <div class="mt-4">
                            <x-textarea name="notes" label="Observações Gerais" rows="3" wire:model="notes" />
                        </div>
                    </div>
                </details>

                {{-- Section: Sincronização (collapsed, advanced) --}}
                <details id="sincronizacao" class="group rounded-xl border border-gray-200 bg-white shadow-sm">
                    <summary class="flex cursor-pointer list-none items-center justify-between px-6 py-5">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-rotate text-sm" aria-hidden="true"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-gray-900">Sincronização / Metadados</h3>
                                <p class="text-xs text-gray-400">Avançado — edição manual não recomendada</p>
                            </div>
                        </div>
                        <i class="fa-solid fa-chevron-down text-xs text-gray-400 transition group-open:rotate-180" aria-hidden="true"></i>
                    </summary>
                    <div class="border-t border-gray-100 px-6 py-5">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                            <div class="space-y-1">
                                <label for="source" class="block text-sm font-medium text-gray-700">Origem dos Dados</label>
                                <select id="source" wire:model="source" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
                                    <option value="manual">Manual</option>
                                    <option value="tribunal">Tribunal</option>
                                    <option value="api">API</option>
                                    <option value="importacao">Importação</option>
                                </select>
                            </div>
                            <x-input name="source_provider" label="Provedor" wire:model="source_provider" />
                            <x-input name="source_id" label="ID Externo" wire:model="source_id" />
                            <x-input name="last_synced_at" label="Última Sincronização" type="text" data-flatpickr data-enable-time="true" data-time-24hr="true" data-date-format="Y-m-d H:i" data-alt-input="true" data-alt-format="d/m/Y H:i" wire:model="last_synced_at" />
                            <x-input name="next_sync_at" label="Próxima Sincronização" type="text" data-flatpickr data-enable-time="true" data-time-24hr="true" data-date-format="Y-m-d H:i" data-alt-input="true" data-alt-format="d/m/Y H:i" wire:model="next_sync_at" />
                            <x-input name="sync_attempts" label="Tentativas" type="number" wire:model="sync_attempts" />
                        </div>
                        <div class="mt-4">
                            <x-textarea name="sync_error" label="Erro de Sincronização" rows="2" wire:model="sync_error" />
                        </div>
                        <label class="mt-4 flex items-center gap-2 text-sm text-gray-700">
                            <input type="checkbox" wire:model="auto_sync" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500">
                            Sincronização automática (incluído no agendamento diário)
                        </label>
                        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                            <div>
                                <x-textarea name="source_data" label="Dados Brutos da Fonte (JSON)" rows="5" wire:model="source_data" />
                                @error('source_data') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <x-textarea name="metadata" label="Metadados (JSON)" rows="5" wire:model="metadata" />
                                @error('metadata') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                            </div>
                        </div>
                        <p class="mt-2 text-xs text-gray-500">Os campos JSON aceitam objetos válidos, ex.: <code class="rounded bg-gray-100 px-1">{"chave":"valor"}</code>. Deixe em branco para nulo.</p>
                    </div>
                </details>

                {{-- Section: Movimentações (Datajud) — read-only, keep visible without toggle --}}
                <div id="movimentacoes" class="rounded-xl border border-gray-200 bg-white shadow-sm px-6 py-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                            <i class="fa-solid fa-list-check text-sm" aria-hidden="true"></i>
                        </div>
                        <h3 class="text-sm font-semibold text-gray-900">Movimentações (Datajud)</h3>
                        <span class="ml-auto rounded-full bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-600">{{ $process->movements->count() }}</span>
                    </div>
                    @if($process->movements->isEmpty())
                        <p class="text-sm text-gray-500">Nenhuma movimentação sincronizada.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-sm">
                                <thead class="bg-gray-50 border-b border-gray-200 text-xs uppercase tracking-wider text-gray-500">
                                    <tr>
                                        <th scope="col" class="px-3 py-2 text-left">Data/Hora</th>
                                        <th scope="col" class="px-3 py-2 text-left">Código</th>
                                        <th scope="col" class="px-3 py-2 text-left">Movimentação</th>
                                        <th scope="col" class="px-3 py-2 text-left">Órgão</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($process->movements->sortByDesc('data_hora') as $mov)
                                        <tr>
                                            <td class="px-3 py-2 text-gray-700">{{ $mov->data_hora?->format('d/m/Y H:i') ?? '-' }}</td>
                                            <td class="px-3 py-2 text-gray-700">{{ $mov->codigo ?? '-' }}</td>
                                            <td class="px-3 py-2 text-gray-900">{{ $mov->nome }}</td>
                                            <td class="px-3 py-2 text-gray-700">{{ $mov->orgao_julgador ?? '-' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>

                {{-- Section: Partes (Datajud) --}}
                <div id="partes-datajud" class="rounded-xl border border-gray-200 bg-white shadow-sm px-6 py-5">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                            <i class="fa-solid fa-users text-sm" aria-hidden="true"></i>
                        </div>
                        <h3 class="text-sm font-semibold text-gray-900">Partes (Datajud)</h3>
                        <span class="ml-auto rounded-full bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-600">{{ $process->parties->count() }}</span>
                    </div>
                    @if($process->parties->isEmpty())
                        <p class="text-sm text-gray-500">Nenhuma parte sincronizada.</p>
                    @else
                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach($process->parties as $party)
                                <div class="rounded-lg border border-gray-200 p-3">
                                    <span class="inline-flex items-center rounded-full px-2 py-0.5 text-xs font-medium
                                        @if($party->tipo === 'ativo') bg-green-50 text-green-700
                                        @elseif($party->tipo === 'passivo') bg-red-50 text-red-700
                                        @else bg-gray-100 text-gray-700 @endif">
                                        {{ ucfirst($party->tipo) }}
                                    </span>
                                    <p class="mt-1 text-sm font-medium text-gray-900">{{ $party->nome }}</p>
                                    @if($party->documento)
                                        <p class="text-xs text-gray-500">Doc: {{ $party->documento }}</p>
                                    @endif
                                    @if($party->categoria)
                                        <p class="text-xs text-gray-500">{{ $party->categoria }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                {{-- Section: Publicações (DJEN) --}}
                <div id="publicacoes" class="rounded-xl border border-gray-200 bg-white shadow-sm px-6 py-5">
                    <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                        <div class="flex items-center gap-3">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-newspaper text-sm" aria-hidden="true"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Publicações (DJEN)</h3>
                            <span class="rounded-full bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-600">{{ $process->publications->count() }}</span>
                        </div>
                        <button
                            type="button"
                            wire:click="syncDjen"
                            wire:loading.attr="disabled"
                            wire:target="syncDjen"
                            class="inline-flex items-center gap-2 rounded-lg border border-amber-600 bg-amber-600 px-3 py-1.5 text-xs font-semibold text-white transition hover:bg-amber-700 disabled:opacity-50"
                        >
                            <span wire:loading.remove wire:target="syncDjen">
                                <i class="fa-solid fa-rotate text-xs" aria-hidden="true"></i> Sincronizar DJEN
                            </span>
                            <span wire:loading wire:target="syncDjen">
                                <i class="fa-solid fa-spinner fa-spin text-xs" aria-hidden="true"></i> Sincronizando...
                            </span>
                        </button>
                    </div>
                    @if($process->publications->isEmpty())
                        <p class="text-sm text-gray-500">Nenhuma publicação sincronizada do Diário de Justiça Eletrônico Nacional.</p>
                    @else
                        <div class="space-y-4">
                            @foreach($process->publications->sortByDesc('data_disponibilizacao') as $pub)
                                <div class="rounded-lg border border-gray-200 p-4 @if($pub->cancelado) opacity-60 @endif">
                                    <div class="flex flex-wrap items-center gap-2 text-xs text-gray-500">
                                        @if($pub->tipo)
                                            <span class="rounded-full bg-blue-50 px-2 py-0.5 font-medium text-blue-700">{{ $pub->tipo }}</span>
                                        @endif
                                        @if($pub->documento_tipo)
                                            <span class="rounded-full bg-gray-100 px-2 py-0.5 font-medium text-gray-700">{{ $pub->documento_tipo }}</span>
                                        @endif
                                        @if($pub->data_disponibilizacao)
                                            <span>Disponibilização: {{ $pub->data_disponibilizacao?->format('d/m/Y') }}</span>
                                        @endif
                                        @if($pub->orgao_julgador)
                                            <span>{{ $pub->orgao_julgador }}</span>
                                        @endif
                                        @if($pub->cancelado)
                                            <span class="rounded-full bg-red-50 px-2 py-0.5 font-medium text-red-700">Cancelada</span>
                                        @endif
                                    </div>
                                    @if($pub->classe)
                                        <p class="mt-1 text-sm font-medium text-gray-900">{{ $pub->classe }}</p>
                                    @endif
                                    @if($pub->assuntos)
                                        <p class="text-xs text-gray-500">{{ $pub->assuntos }}</p>
                                    @endif
                                    {{-- texto_html vem de fonte externa (DJEN): garanta sanitização no backend antes de persistir --}}
                                    <div class="mt-2 max-w-none text-sm leading-relaxed text-gray-700">{!! $pub->texto_html !!}</div>
                                    @if($pub->certidao_url)
                                        <a href="{{ $pub->certidao_url }}" target="_blank" rel="noopener"
                                           class="mt-2 inline-flex items-center gap-1 text-xs font-medium text-amber-600 hover:text-amber-700">
                                            <i class="fa-solid fa-file-pdf" aria-hidden="true"></i> Certidão
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Quick nav -->
                <nav aria-label="Navegação rápida das seções" class="rounded-xl border border-gray-200 bg-white shadow-sm p-4 sticky top-4 hidden lg:block">
                    <p class="mb-2 text-xs font-semibold uppercase tracking-wider text-gray-400">Ir para</p>
                    <ul class="space-y-1 text-sm">
                        <li><a href="#dados" class="block rounded px-2 py-1 text-gray-600 hover:bg-amber-50 hover:text-amber-700">Dados do Processo</a></li>
                        <li><a href="#datas" class="block rounded px-2 py-1 text-gray-600 hover:bg-amber-50 hover:text-amber-700">Datas</a></li>
                        <li><a href="#financeiro" class="block rounded px-2 py-1 text-gray-600 hover:bg-amber-50 hover:text-amber-700">Financeiro</a></li>
                        <li><a href="#audiencias" class="block rounded px-2 py-1 text-gray-600 hover:bg-amber-50 hover:text-amber-700">Audiências</a></li>
                        <li><a href="#movimentacoes" class="block rounded px-2 py-1 text-gray-600 hover:bg-amber-50 hover:text-amber-700">Movimentações</a></li>
                        <li><a href="#publicacoes" class="block rounded px-2 py-1 text-gray-600 hover:bg-amber-50 hover:text-amber-700">Publicações</a></li>
                    </ul>
                </nav>

                <!-- Client -->
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-user text-sm" aria-hidden="true"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-semibold text-gray-900">Cliente</h3>
                                <p class="text-xs text-gray-500">Obrigatório</p>
                            </div>
                        </div>
                        <label for="client_id" class="sr-only">Cliente</label>
                        <select id="client_id" wire:model="client_id" required class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 focus:outline-none transition @error('client_id') border-red-500 @enderror">
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
                                <i class="fa-solid fa-user-tie text-sm" aria-hidden="true"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Responsável</h3>
                        </div>
                        <label for="responsible_id" class="sr-only">Responsável</label>
                        <select id="responsible_id" wire:model="responsible_id" class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 focus:outline-none transition">
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
                                <i class="fa-solid fa-tag text-sm" aria-hidden="true"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Status</h3>
                        </div>
                        <label for="status" class="sr-only">Status</label>
                        <select id="status" wire:model="status" class="w-full rounded-lg border border-gray-300 px-3 py-2.5 text-sm text-gray-900 shadow-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-500/20 focus:outline-none transition">
                            <option value="active">Ativo</option>
                            <option value="suspended">Suspenso</option>
                            <option value="archived">Arquivado</option>
                            <option value="closed">Encerrado</option>
                        </select>
                    </div>
                </div>

                <!-- Process Info -->
                <div class="rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-circle-info text-sm" aria-hidden="true"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Informações</h3>
                        </div>
                        <div class="space-y-3">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">ID</span>
                                <span class="font-mono text-gray-900">#{{ $process->id }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Criado em</span>
                                <span class="text-gray-900">{{ $process->created_at?->format('d/m/Y') ?? '-' }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">Atualizado em</span>
                                <span class="text-gray-900">{{ $process->updated_at?->format('d/m/Y') ?? '-' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sticky action bar -->
        <div class="fixed inset-x-0 bottom-0 z-10 border-t border-gray-200 bg-white/95 backdrop-blur px-4 py-3 shadow-[0_-2px_8px_rgba(0,0,0,0.04)] lg:pl-[calc(theme(spacing.6)+16rem)]">
            <div class="mx-auto flex max-w-5xl items-center justify-between gap-3">
                <span wire:dirty class="hidden text-xs font-medium text-amber-600 sm:inline">
                    <i class="fa-solid fa-circle text-[6px] align-middle" aria-hidden="true"></i>
                    Alterações não salvas
                </span>
                <div class="ml-auto flex gap-3">
                    <a
                        href="{{ route('dashboard.legal.processes') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50"
                    >
                        <i class="fa-solid fa-times text-xs" aria-hidden="true"></i>
                        Cancelar
                    </a>
                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-lg bg-amber-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed"
                        wire:loading.attr="disabled"
                        wire:target="update"
                    >
                        <span wire:loading.remove wire:target="update">
                            <i class="fa-solid fa-save text-xs" aria-hidden="true"></i>
                            Salvar Alterações
                        </span>
                        <span wire:loading wire:target="update">
                            <i class="fa-solid fa-spinner fa-spin text-xs" aria-hidden="true"></i>
                            Salvando...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
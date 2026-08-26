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
                            <x-input name="cnj_number" label="Número CNJ" placeholder="Número CNJ completo" wire:model="cnj_number" />

                            {{-- Consulta Datajud --}}
                            <div class="sm:col-span-2 rounded-lg border border-amber-200 bg-amber-50/60 p-3">
                                <div class="flex flex-col gap-3 sm:flex-row sm:items-end">
                                    <div class="w-full sm:w-1/3">
                                        <label class="block text-sm font-medium text-gray-700">Tribunal (Datajud)</label>
                                        <select wire:model="datajud_tribunal" class="mt-1 w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 shadow-sm focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
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
                                            class="inline-flex w-full items-center justify-center gap-2 rounded-lg border border-amber-600 bg-amber-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-700 disabled:opacity-50"
                                        >
                                            <span wire:loading.remove wire:target="consultarDatajud">
                                                <i class="fa-solid fa-magnifying-glass text-xs"></i>
                                                Consultar Datajud
                                            </span>
                                            <span wire:loading wire:target="consultarDatajud">
                                                <i class="fa-solid fa-spinner fa-spin text-xs"></i>
                                                Consultando...
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                @if($datajud_error)
                                    <p class="mt-2 text-xs text-red-600">
                                        <i class="fa-solid fa-circle-exclamation"></i> {{ $datajud_error }}
                                    </p>
                                @endif
                                <p class="mt-2 text-xs text-gray-500">
                                    Busca o processo na API Pública do CNJ e pré-preenche o formulário. Revise os dados e salve.
                                </p>
                            </div>
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
                            <x-input name="action_type" label="Tipo de Ação (detalhe)" placeholder="Ex: Ordinária, Executiva" wire:model="action_type" />
                        </div>
                    </div>

                    <div class="border-t border-gray-100"></div>

                    {{-- Section: Origem / Tribunal --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-building-columns text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Origem / Tribunal</h3>
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
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

                    {{-- Section: Classificação --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-tags text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Classificação</h3>
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <x-input name="case_class" label="Classe Processual" wire:model="case_class" />
                            <x-input name="case_class_code" label="Código da Classe" wire:model="case_class_code" />
                            <x-input name="main_subject" label="Assunto Principal" wire:model="main_subject" />
                            <x-input name="main_subject_code" label="Código do Assunto" wire:model="main_subject_code" />
                            <x-input name="nature" label="Natureza" wire:model="nature" />
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

                    {{-- Section: Fase / Situação --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-flag text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Fase / Situação</h3>
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <x-input name="process_phase" label="Fase Processual" placeholder="Ex: Conhecimento, Execução" wire:model="process_phase" />
                            <x-input name="court_status" label="Status no Tribunal" wire:model="court_status" />
                            <x-input name="situation" label="Situação" placeholder="Ex: Em andamento, Arquivado" wire:model="situation" />
                        </div>
                        <div class="mt-4">
                            <x-textarea name="situation_reason" label="Motivo da Situação" rows="2" wire:model="situation_reason" />
                        </div>
                    </div>

                    <div class="border-t border-gray-100"></div>

                    {{-- Section: Datas --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-calendar-days text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Datas Importantes</h3>
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
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
                            <x-input name="contract_value" label="Valor do Contrato" placeholder="R$ 0,00" data-mask-type="decimal" wire:model="contract_value" />
                            <x-input name="client_interest" label="% Sucumbência" type="number" wire:model="client_interest" />
                            <x-input name="cause_value" label="Valor da Causa" type="text" data-mask-type="decimal" wire:model="cause_value" />
                            <x-input name="updated_cause_value" label="Valor Atualizado" type="text" data-mask-type="decimal" wire:model="updated_cause_value" />
                            <x-input name="conviction_value" label="Valor da Condenação" type="text" data-mask-type="decimal" wire:model="conviction_value" />
                            <x-input name="executed_value" label="Valor Executado" type="text" data-mask-type="decimal" wire:model="executed_value" />
                            <x-input name="received_value" label="Valor Recebido" type="text" data-mask-type="decimal" wire:model="received_value" />
                            <x-input name="pending_value" label="Valor Pendente" type="text" data-mask-type="decimal" wire:model="pending_value" />
                            <div class="space-y-1">
                                <label class="block text-sm font-medium text-gray-700">Moeda</label>
                                <select wire:model="currency" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
                                    <option value="BRL">BRL</option>
                                    <option value="USD">USD</option>
                                    <option value="EUR">EUR</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-100"></div>

                    {{-- Section: Segredo / Prioridades --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-shield-halved text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Segredo de Justiça / Prioridades</h3>
                        </div>
                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3">
                            <label class="flex items-center gap-2 text-sm text-gray-700"><input type="checkbox" wire:model="secret_of_justice" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Segredo de justiça</label>
                            <label class="flex items-center gap-2 text-sm text-gray-700"><input type="checkbox" wire:model="free_justice" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Justiça gratuita</label>
                            <label class="flex items-center gap-2 text-sm text-gray-700"><input type="checkbox" wire:model="priority" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Prioridade</label>
                            <label class="flex items-center gap-2 text-sm text-gray-700"><input type="checkbox" wire:model="elderly" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Idoso</label>
                            <label class="flex items-center gap-2 text-sm text-gray-700"><input type="checkbox" wire:model="disabled" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Deficiente</label>
                            <label class="flex items-center gap-2 text-sm text-gray-700"><input type="checkbox" wire:model="serious_illness" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Doença grave</label>
                        </div>
                        <div class="mt-4">
                            <x-input name="priority_type" label="Tipo de Prioridade" wire:model="priority_type" />
                        </div>
                    </div>

                    <div class="border-t border-gray-100"></div>

                    {{-- Section: Liminar / Tutela --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-gavel text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Liminar / Tutela / Urgência</h3>
                        </div>
                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                            <label class="flex items-center gap-2 text-sm text-gray-700"><input type="checkbox" wire:model="has_injunction" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Possui liminar</label>
                            <label class="flex items-center gap-2 text-sm text-gray-700"><input type="checkbox" wire:model="has_preliminary_injunction" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Possui tutela</label>
                            <label class="flex items-center gap-2 text-sm text-gray-700"><input type="checkbox" wire:model="has_urgency" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Possui urgência</label>
                        </div>
                        <div class="mt-4">
                            <x-textarea name="injunction_notes" label="Observações de Liminar" rows="2" wire:model="injunction_notes" />
                        </div>
                    </div>

                    <div class="border-t border-gray-100"></div>

                    {{-- Section: Audiências --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-scale-balanced text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Audiências</h3>
                        </div>
                        <label class="flex items-center gap-2 text-sm text-gray-700 mb-4"><input type="checkbox" wire:model="has_hearing" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Possui audiência</label>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <x-input name="next_hearing_at" label="Próxima Audiência" type="text" data-flatpickr data-enable-time="true" data-time-24hr="true" data-date-format="Y-m-d H:i" data-alt-input="true" data-alt-format="d/m/Y H:i" wire:model="next_hearing_at" />
                            <x-input name="next_hearing_type" label="Tipo de Audiência" wire:model="next_hearing_type" />
                            <x-input name="next_hearing_location" label="Local da Audiência" wire:model="next_hearing_location" />
                        </div>
                        <div class="mt-4">
                            <x-textarea name="hearing_notes" label="Observações de Audiência" rows="2" wire:model="hearing_notes" />
                        </div>
                    </div>

                    <div class="border-t border-gray-100"></div>

                    {{-- Section: Sentença / Recurso --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-bookmark text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Sentença / Recurso</h3>
                        </div>
                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                            <label class="flex items-center gap-2 text-sm text-gray-700"><input type="checkbox" wire:model="has_sentence" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Possui sentença</label>
                            <label class="flex items-center gap-2 text-sm text-gray-700"><input type="checkbox" wire:model="has_appeal" class="h-4 w-4 rounded border-gray-300 text-amber-600 focus:ring-amber-500"> Houve recurso</label>
                            <x-input name="sentence_result" label="Resultado da Sentença" wire:model="sentence_result" />
                            <x-input name="appeal_type" label="Tipo de Recurso" wire:model="appeal_type" />
                            <x-input name="appeal_result" label="Resultado do Recurso" wire:model="appeal_result" />
                        </div>
                    </div>

                    <div class="border-t border-gray-100"></div>

                    {{-- Section: Notes --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-sticky-note text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Observações</h3>
                        </div>
                        <x-textarea name="internal_notes" label="Observações Internas" rows="3" placeholder="Anotações internas sobre este processo..." wire:model="internal_notes" />
                        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <x-input name="internal_title" label="Título Interno" wire:model="internal_title" />
                            <x-input name="internal_code" label="Código Interno" wire:model="internal_code" />
                            <x-input name="folder" label="Pasta" wire:model="folder" />
                            <x-input name="folder_number" label="Número da Pasta" wire:model="folder_number" />
                        </div>
                        <div class="mt-4">
                            <x-textarea name="notes" label="Observações Gerais" rows="3" wire:model="notes" />
                        </div>
                    </div>

                    <div class="border-t border-gray-100"></div>

                    {{-- Section: Sincronização --}}
                    <div class="px-6 py-5">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                                <i class="fa-solid fa-rotate text-sm"></i>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-900">Sincronização / Metadados</h3>
                        </div>
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                            <div class="space-y-1">
                                <label class="block text-sm font-medium text-gray-700">Origem dos Dados</label>
                                <select wire:model="source" class="w-full rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm text-gray-900 shadow-sm transition focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20">
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
                        <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <x-textarea name="source_data" label="Dados Brutos da Fonte (JSON)" rows="5" wire:model="source_data" />
                            <x-textarea name="metadata" label="Metadados (JSON)" rows="5" wire:model="metadata" />
                        </div>
                        <p class="mt-2 text-xs text-gray-500">Os campos JSON aceitam objetos válidos, ex.: <code class="rounded bg-gray-100 px-1">{"chave":"valor"}</code>. Deixe em branco para nulo.</p>
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

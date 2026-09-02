<div class="pb-10">

    {{-- ============================================================
         HEADER
    ============================================================ --}}
    <div class="mb-6 flex items-center justify-between gap-4">
        <div class="flex items-center gap-4">
            <a
                href="{{ route('dashboard.legal.processes') }}"
                class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-gray-300 bg-white text-gray-600 shadow-sm transition hover:bg-gray-50"
            >
                <i class="fa-solid fa-arrow-left"></i>
            </a>

            <div>
                <h1 class="text-2xl font-bold text-gray-900">
                    Processo
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Visualizando
                    <span class="font-semibold text-gray-700">
                        {{ $process->process_number }}
                    </span>
                </p>
            </div>
        </div>

        {{-- Status + Ações --}}
        <div class="flex items-center gap-3">
            @php
                $statusClasses = match($process->status) {
                    'active' => 'bg-green-50 text-green-700 border-green-200',
                    'suspended' => 'bg-yellow-50 text-yellow-700 border-yellow-200',
                    'archived' => 'bg-gray-100 text-gray-700 border-gray-200',
                    'closed' => 'bg-red-50 text-red-700 border-red-200',
                    default => 'bg-gray-100 text-gray-700 border-gray-200',
                };
            @endphp

            <span class="inline-flex items-center gap-2 rounded-full border px-3 py-1.5 text-xs font-semibold {{ $statusClasses }}">
                <span class="h-2 w-2 rounded-full bg-current"></span>
                {{ $process->status_label }}
            </span>

            @unless(auth()->user()->hasRole('employee'))
            <a
                href="{{ route('dashboard.legal.processes.edit', $process->id) }}"
                class="inline-flex items-center gap-2 rounded-lg bg-amber-500 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-amber-600"
            >
                <i class="fa-solid fa-pen text-xs"></i>
                Editar
            </a>
            @endunless
        </div>
    </div>


    {{-- ============================================================
         DADOS PRINCIPAIS
    ============================================================ --}}
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">

        {{-- Coluna principal (2/3) --}}
        <div class="space-y-6 lg:col-span-2">

            {{-- Identificação --}}
            <section class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm lg:p-6">
                <div class="mb-4 flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                        <i class="fa-solid fa-folder-open text-sm"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-gray-900">Identificação</h2>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <p class="text-xs font-medium text-gray-500">Número do Processo</p>
                        <p class="mt-1 text-sm font-semibold text-gray-900">{{ $process->process_number ?: '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Vara / Foro</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->court_variable ?: '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Comarca / Tribunal</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->court_name ?: '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Tipo de Ação</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->case_type_label }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Área do Direito</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->case_area ?: '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Cliente</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->client->name ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Responsável</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->responsible->name ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Descrição</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->description ?: '-' }}</p>
                    </div>
                </div>
            </section>

            {{-- Partes --}}
            <section class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm lg:p-6">
                <div class="mb-4 flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-purple-50 text-purple-600">
                        <i class="fa-solid fa-users text-sm"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-gray-900">Partes</h2>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <p class="text-xs font-medium text-gray-500">Parte Contrária</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->opposing_party ?: '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Advogado da Parte Contrária</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->opposing_lawyer ?: '-' }}</p>
                    </div>
                </div>
            </section>

            {{-- Datas --}}
            <section class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm lg:p-6">
                <div class="mb-4 flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-green-50 text-green-600">
                        <i class="fa-solid fa-calendar-days text-sm"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-gray-900">Datas</h2>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                    <div>
                        <p class="text-xs font-medium text-gray-500">Distribuição</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->distribution_date?->format('d/m/Y') ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Ajuizamento</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->filing_date?->format('d/m/Y') ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Início</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->start_date?->format('d/m/Y') ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Citação</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->summons_date?->format('d/m/Y') ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Sentença</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->sentence_date?->format('d/m/Y') ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Trânsito em Julgado</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->res_judicata_date?->format('d/m/Y') ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Arquivamento</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->archival_date?->format('d/m/Y') ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Encerramento</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->closure_date?->format('d/m/Y') ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Último Movimento</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->last_movement_date?->format('d/m/Y') ?? '-' }}</p>
                    </div>
                </div>
            </section>

            {{-- Audiência --}}
            @if($process->has_hearing)
            <section class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm lg:p-6">
                <div class="mb-4 flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-orange-50 text-orange-600">
                        <i class="fa-solid fa-gavel text-sm"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-gray-900">Audiência</h2>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                    <div>
                        <p class="text-xs font-medium text-gray-500">Data/Hora</p>
                        <p class="mt-1 text-sm font-semibold text-gray-900">{{ $process->next_hearing_at?->format('d/m/Y H:i') ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Tipo</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->next_hearing_type ?: '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Local</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->next_hearing_location ?: '-' }}</p>
                    </div>
                </div>

                @if($process->hearing_notes)
                    <div class="mt-3">
                        <p class="text-xs font-medium text-gray-500">Observações da Audiência</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->hearing_notes }}</p>
                    </div>
                @endif
            </section>
            @endif

            {{-- Sentença / Recurso --}}
            @if($process->has_sentence || $process->has_appeal)
            <section class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm lg:p-6">
                <div class="mb-4 flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                        <i class="fa-solid fa-scale-balanced text-sm"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-gray-900">Sentença e Recurso</h2>
                </div>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    @if($process->has_sentence)
                    <div>
                        <p class="text-xs font-medium text-gray-500">Resultado da Sentença</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->sentence_result ?: '-' }}</p>
                    </div>
                    @endif
                    @if($process->has_appeal)
                    <div>
                        <p class="text-xs font-medium text-gray-500">Tipo de Recurso</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->appeal_type ?: '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-gray-500">Resultado do Recurso</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->appeal_result ?: '-' }}</p>
                    </div>
                    @endif
                </div>
            </section>
            @endif

            {{-- Medidas Cautelares --}}
            @if($process->has_injunction || $process->has_preliminary_injunction || $process->has_urgency)
            <section class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm lg:p-6">
                <div class="mb-4 flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-red-50 text-red-600">
                        <i class="fa-solid fa-bolt text-sm"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-gray-900">Medidas Cautelares / Urgência</h2>
                </div>

                <div class="flex flex-wrap gap-2">
                    @if($process->has_injunction)
                        <span class="inline-flex items-center gap-1 rounded-full bg-red-50 px-3 py-1 text-xs font-medium text-red-700 border border-red-200">
                            <i class="fa-solid fa-bolt text-[10px]"></i> Cautelar
                        </span>
                    @endif
                    @if($process->has_preliminary_injunction)
                        <span class="inline-flex items-center gap-1 rounded-full bg-orange-50 px-3 py-1 text-xs font-medium text-orange-700 border border-orange-200">
                            <i class="fa-solid fa-bolt text-[10px]"></i> Liminar
                        </span>
                    @endif
                    @if($process->has_urgency)
                        <span class="inline-flex items-center gap-1 rounded-full bg-yellow-50 px-3 py-1 text-xs font-medium text-yellow-700 border border-yellow-200">
                            <i class="fa-solid fa-clock text-[10px]"></i> Urgência
                        </span>
                    @endif
                </div>

                @if($process->injunction_notes)
                    <div class="mt-3">
                        <p class="text-xs font-medium text-gray-500">Observações</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->injunction_notes }}</p>
                    </div>
                @endif
            </section>
            @endif

            {{-- Observações --}}
            @if($process->notes || $process->internal_notes)
            <section class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm lg:p-6">
                <div class="mb-4 flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                        <i class="fa-solid fa-sticky-note text-sm"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-gray-900">Observações</h2>
                </div>

                <div class="space-y-4">
                    @if($process->internal_notes)
                        <div>
                            <p class="text-xs font-medium text-gray-500">Notas Internas</p>
                            <p class="mt-1 text-sm text-gray-900 whitespace-pre-line">{{ $process->internal_notes }}</p>
                        </div>
                    @endif
                    @if($process->notes)
                        <div>
                            <p class="text-xs font-medium text-gray-500">Observações Gerais</p>
                            <p class="mt-1 text-sm text-gray-900 whitespace-pre-line">{{ $process->notes }}</p>
                        </div>
                    @endif
                </div>
            </section>
            @endif

        </div>


        {{-- Coluna lateral (1/3) --}}
        <div class="space-y-6">

            {{-- Resumo Financeiro --}}
            <section class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm lg:p-6">
                <div class="mb-4 flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                        <i class="fa-solid fa-dollar-sign text-sm"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-gray-900">Financeiro</h2>
                </div>

                <div class="space-y-3">
                    @if($process->client_interest)
                    <div>
                        <p class="text-xs font-medium text-gray-500">Valor do Contrato</p>
                        <p class="mt-1 text-sm font-semibold text-gray-900">R$ {{ number_format($process->client_interest, 2, ',', '.') }}</p>
                    </div>
                    @endif
                    @if($process->cause_value)
                    <div>
                        <p class="text-xs font-medium text-gray-500">Valor da Causa</p>
                        <p class="mt-1 text-sm font-semibold text-gray-900">R$ {{ number_format($process->cause_value, 2, ',', '.') }}</p>
                    </div>
                    @endif
                    @if($process->conviction_value)
                    <div>
                        <p class="text-xs font-medium text-gray-500">Valor da Condenação</p>
                        <p class="mt-1 text-sm font-semibold text-gray-900">R$ {{ number_format($process->conviction_value, 2, ',', '.') }}</p>
                    </div>
                    @endif
                    @if(!$process->client_interest && !$process->cause_value && !$process->conviction_value)
                        <p class="text-sm text-gray-400 italic">Nenhum valor registrado</p>
                    @endif
                </div>
            </section>

            {{-- Próxima Audiência --}}
            @if($process->has_hearing && $process->next_hearing_at)
            <section class="rounded-xl border border-orange-200 bg-orange-50 p-5 shadow-sm lg:p-6">
                <div class="mb-3 flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-orange-100 text-orange-600">
                        <i class="fa-solid fa-calendar-day text-sm"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-orange-900">Próxima Audiência</h2>
                </div>

                <div class="text-center">
                    <p class="text-2xl font-bold text-orange-700">
                        {{ $process->next_hearing_at->format('d/m') }}
                    </p>
                    <p class="text-sm text-orange-600">{{ $process->next_hearing_at->format('H:i') }}</p>
                    @if($process->next_hearing_type)
                        <p class="mt-1 text-xs font-medium text-orange-800">{{ $process->next_hearing_type }}</p>
                    @endif
                    @if($process->next_hearing_location)
                        <p class="mt-1 text-xs text-orange-600">{{ $process->next_hearing_location }}</p>
                    @endif
                </div>
            </section>
            @endif

            {{-- Flags --}}
            @if($process->priority || $process->elderly || $process->disabled || $process->serious_illness || $process->secret_of_justice || $process->free_justice)
            <section class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm lg:p-6">
                <div class="mb-4 flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-pink-50 text-pink-600">
                        <i class="fa-solid fa-flag text-sm"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-gray-900">Flags</h2>
                </div>

                <div class="flex flex-wrap gap-2">
                    @if($process->priority)
                        <span class="inline-flex items-center gap-1 rounded-full bg-red-50 px-3 py-1 text-xs font-medium text-red-700 border border-red-200">
                            <i class="fa-solid fa-flag text-[10px]"></i> Prioritário
                        </span>
                    @endif
                    @if($process->elderly)
                        <span class="inline-flex items-center gap-1 rounded-full bg-purple-50 px-3 py-1 text-xs font-medium text-purple-700 border border-purple-200">
                            <i class="fa-solid fa-person-cane text-[10px]"></i> Idoso
                        </span>
                    @endif
                    @if($process->disabled)
                        <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-3 py-1 text-xs font-medium text-blue-700 border border-blue-200">
                            <i class="fa-solid fa-wheelchair text-[10px]"></i> PCD
                        </span>
                    @endif
                    @if($process->serious_illness)
                        <span class="inline-flex items-center gap-1 rounded-full bg-teal-50 px-3 py-1 text-xs font-medium text-teal-700 border border-teal-200">
                            <i class="fa-solid fa-heart-pulse text-[10px]"></i> Doença Grave
                        </span>
                    @endif
                    @if($process->secret_of_justice)
                        <span class="inline-flex items-center gap-1 rounded-full bg-gray-50 px-3 py-1 text-xs font-medium text-gray-700 border border-gray-200">
                            <i class="fa-solid fa-lock text-[10px]"></i> Segredo de Justiça
                        </span>
                    @endif
                    @if($process->free_justice)
                        <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-3 py-1 text-xs font-medium text-green-700 border border-green-200">
                            <i class="fa-solid fa-hand-holding-dollar text-[10px]"></i> Justiça Gratuita
                        </span>
                    @endif
                </div>
            </section>
            @endif

            {{-- Prazos Relacionados --}}
            <section class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm lg:p-6">
                <div class="mb-4 flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-amber-50 text-amber-600">
                        <i class="fa-solid fa-clock text-sm"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-gray-900">Prazos</h2>
                    @if($process->deadlines->count())
                        <span class="ml-auto rounded-full bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-600">
                            {{ $process->deadlines->count() }}
                        </span>
                    @endif
                </div>

                @if($process->deadlines->count())
                    <div class="space-y-3">
                        @foreach($process->deadlines as $deadline)
                            @php
                                $priorityColor = match($deadline->priority) {
                                    'low' => 'gray',
                                    'normal' => 'blue',
                                    'high' => 'orange',
                                    'urgent' => 'red',
                                    default => 'gray',
                                };
                                $statusColor = match($deadline->status) {
                                    'completed' => 'green',
                                    'expired' => 'red',
                                    default => ($deadline->is_overdue ? 'red' : 'blue'),
                                };
                            @endphp
                            <div class="rounded-lg border border-gray-100 p-3 transition hover:bg-gray-50">
                                <div class="flex items-start justify-between gap-2">
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm font-medium text-gray-900 truncate">{{ $deadline->title }}</p>
                                        <div class="mt-1 flex items-center gap-2 text-xs text-gray-500">
                                            <i class="fa-regular fa-clock"></i>
                                            <span>{{ $deadline->due_date->format('d/m/Y H:i') }}</span>
                                            @if($deadline->responsible)
                                                <span class="text-gray-300">|</span>
                                                <span>{{ $deadline->responsible->name }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-1.5 shrink-0">
                                        <span class="inline-flex items-center rounded-full px-2 py-0.5 text-[10px] font-semibold bg-{{ $priorityColor }}-50 text-{{ $priorityColor }}-700 border border-{{ $priorityColor }}-200">
                                            {{ $deadline->priority_label }}
                                        </span>
                                        <span class="inline-flex items-center rounded-full px-2 py-0.5 text-[10px] font-semibold bg-{{ $statusColor }}-50 text-{{ $statusColor }}-700 border border-{{ $statusColor }}-200">
                                            {{ $deadline->status_label }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-400 italic text-center py-4">Nenhum prazo registrado</p>
                @endif
            </section>

            {{-- Documentos --}}
            <section class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm lg:p-6">
                <div class="mb-4 flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-cyan-50 text-cyan-600">
                        <i class="fa-solid fa-file-lines text-sm"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-gray-900">Documentos</h2>
                    @if($process->documents->count())
                        <span class="ml-auto rounded-full bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-600">
                            {{ $process->documents->count() }}
                        </span>
                    @endif
                </div>

                @if($process->documents->count())
                    <div class="space-y-2">
                        @foreach($process->documents as $doc)
                            <a
                                href="{{ $doc->url }}"
                                target="_blank"
                                class="flex items-center gap-3 rounded-lg border border-gray-100 p-3 transition hover:bg-gray-50 group"
                            >
                                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-gray-100 text-gray-500 group-hover:bg-cyan-50 group-hover:text-cyan-600 transition">
                                    <i class="fa-solid {{ $doc->category_icon }} text-sm"></i>
                                </div>
                                <div class="min-w-0 flex-1">
                                    <p class="text-sm font-medium text-gray-900 truncate">{{ $doc->title }}</p>
                                    <div class="flex items-center gap-2 text-xs text-gray-500">
                                        <span>{{ $doc->category_label }}</span>
                                        <span class="text-gray-300">|</span>
                                        <span>{{ $doc->file_size_formatted }}</span>
                                        @if($doc->uploader)
                                            <span class="text-gray-300">|</span>
                                            <span>{{ $doc->uploader->name }}</span>
                                        @endif
                                    </div>
                                </div>
                                <i class="fa-solid fa-arrow-up-right-from-square text-xs text-gray-400 group-hover:text-cyan-600 transition"></i>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-gray-400 italic text-center py-4">Nenhum documento anexado</p>
                @endif
            </section>

            {{-- Integrações --}}
            @if($process->source_provider)
            <section class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm lg:p-6">
                <div class="mb-4 flex items-center gap-2.5">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-gray-100 text-gray-600">
                        <i class="fa-solid fa-rotate text-sm"></i>
                    </div>
                    <h2 class="text-sm font-semibold text-gray-900">Integrações</h2>
                </div>

                <div class="space-y-3">
                    <div>
                        <p class="text-xs font-medium text-gray-500">Fonte</p>
                        <p class="mt-1 text-sm text-gray-900 uppercase">{{ $process->source_provider }}</p>
                    </div>
                    @if($process->last_synced_at)
                    <div>
                        <p class="text-xs font-medium text-gray-500">Última Sincronização</p>
                        <p class="mt-1 text-sm text-gray-900">{{ $process->last_synced_at->format('d/m/Y H:i') }}</p>
                    </div>
                    @endif
                    @if($process->source_id)
                    <div>
                        <p class="text-xs font-medium text-gray-500">ID Externo</p>
                        <p class="mt-1 text-sm text-gray-900 font-mono">{{ $process->source_id }}</p>
                    </div>
                    @endif
                </div>
            </section>
            @endif

        </div>
    </div>
</div>

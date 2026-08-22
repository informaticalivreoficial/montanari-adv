<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Processo {{ $process->process_number }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Helvetica', 'Arial', sans-serif; font-size: 11px; color: #333; line-height: 1.5; }

        .header { border-bottom: 3px solid #d97706; padding-bottom: 10px; margin-bottom: 20px; }
        .header h1 { font-size: 20px; color: #1f2937; margin-bottom: 4px; }
        .header .subtitle { font-size: 12px; color: #6b7280; }
        .header .meta { font-size: 9px; color: #9ca3af; margin-top: 4px; }

        .section { margin-bottom: 20px; }
        .section-title { font-size: 13px; font-weight: bold; color: #92400e; border-bottom: 1px solid #fcd34d; padding-bottom: 4px; margin-bottom: 10px; }

        .grid { display: flex; gap: 20px; }
        .grid-col { flex: 1; }

        .field { margin-bottom: 8px; }
        .field .label { font-size: 9px; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px; }
        .field .value { font-size: 11px; color: #1f2937; font-weight: 500; }

        .badge { display: inline-block; padding: 2px 8px; border-radius: 10px; font-size: 9px; font-weight: 600; }
        .badge-green { background: #dcfce7; color: #166534; }
        .badge-yellow { background: #fef9c3; color: #854d0e; }
        .badge-gray { background: #f3f4f6; color: #374151; }
        .badge-red { background: #fee2e2; color: #991b1b; }
        .badge-blue { background: #dbeafe; color: #1e40af; }
        .badge-orange { background: #ffedd5; color: #9a3412; }
        .badge-purple { background: #f3e8ff; color: #6b21a8; }

        table { width: 100%; border-collapse: collapse; margin-top: 5px; }
        thead th { background: #f9fafb; border-bottom: 2px solid #d1d5db; padding: 5px 8px; text-align: left; font-size: 9px; text-transform: uppercase; letter-spacing: 0.5px; color: #6b7280; }
        tbody td { border-bottom: 1px solid #f3f4f6; padding: 5px 8px; font-size: 10px; }

        .notes { background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 6px; padding: 10px; margin-top: 10px; font-size: 10px; }

        .footer { margin-top: 30px; border-top: 1px solid #e5e7eb; padding-top: 8px; font-size: 8px; color: #9ca3af; text-align: center; }

        .empty { color: #9ca3af; font-style: italic; }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>{{ $process->process_number }}</h1>
        <div class="subtitle">
            {{ $process->case_type_label }}
            @if($process->court_name) — {{ $process->court_name }} @endif
            @if($process->court_variable) / {{ $process->court_variable }} @endif
        </div>
        <div class="meta">
            Gerado em {{ $generated_at }} | ID #{{ $process->id }}
        </div>
    </div>

    <!-- Status -->
    <div class="section">
        <div class="grid">
            <div class="field">
                <div class="label">Status</div>
                <div class="value">
                    @php $color = $process->status_color; @endphp
                    <span class="badge badge-{{ $color }}">{{ $process->status_label }}</span>
                </div>
            </div>
            <div class="field">
                <div class="label">Tipo de Ação</div>
                <div class="value"><span class="badge badge-blue">{{ $process->case_type_label }}</span></div>
            </div>
            @if($process->case_area)
            <div class="field">
                <div class="label">Área</div>
                <div class="value">{{ $process->case_area }}</div>
            </div>
            @endif
        </div>
    </div>

    <!-- Pessoas -->
    <div class="section">
        <div class="section-title">Pessoas</div>
        <div class="grid">
            <div class="field">
                <div class="label">Cliente</div>
                <div class="value">{{ $process->client?->name ?? '-' }}</div>
            </div>
            <div class="field">
                <div class="label">Responsável</div>
                <div class="value">{{ $process->responsible?->name ?? '-' }}</div>
            </div>
            <div class="field">
                <div class="label">Parte Contrária</div>
                <div class="value">{{ $process->opposing_party ?? '-' }}</div>
            </div>
            <div class="field">
                <div class="label">Advogado Contrário</div>
                <div class="value">{{ $process->opposing_lawyer ?? '-' }}</div>
            </div>
        </div>
    </div>

    <!-- Financeiro -->
    @if($process->contract_value || $process->client_interest)
    <div class="section">
        <div class="section-title">Dados Financeiros</div>
        <div class="grid">
            @if($process->contract_value)
            <div class="field">
                <div class="label">Valor do Contrato</div>
                <div class="value">{{ $process->contract_value }}</div>
            </div>
            @endif
            @if($process->client_interest)
            <div class="field">
                <div class="label">Sucumbência</div>
                <div class="value">{{ $process->client_interest }}%</div>
            </div>
            @endif
        </div>
    </div>
    @endif

    <!-- Descrição -->
    @if($process->description)
    <div class="section">
        <div class="section-title">Descrição</div>
        <p>{{ $process->description }}</p>
    </div>
    @endif

    <!-- Prazos -->
    <div class="section">
        <div class="section-title">Prazos ({{ $process->deadlines->count() }})</div>
        @if($process->deadlines->isEmpty())
            <p class="empty">Nenhum prazo registrado.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Vencimento</th>
                        <th>Prioridade</th>
                        <th>Status</th>
                        <th>Responsável</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($process->deadlines as $deadline)
                        <tr>
                            <td>{{ $deadline->title }}</td>
                            <td>{{ $deadline->due_date->format('d/m/Y H:i') }}</td>
                            <td><span class="badge badge-{{ $deadline->priority_color }}">{{ $deadline->priority_label }}</span></td>
                            <td>{{ $deadline->status_label }}</td>
                            <td>{{ $deadline->responsible?->name ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Tarefas -->
    <div class="section">
        <div class="section-title">Tarefas ({{ $process->tasks->count() }})</div>
        @if($process->tasks->isEmpty())
            <p class="empty">Nenhuma tarefa registrada.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Vencimento</th>
                        <th>Prioridade</th>
                        <th>Status</th>
                        <th>Responsável</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($process->tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->due_date ? $task->due_date->format('d/m/Y H:i') : '-' }}</td>
                            <td><span class="badge badge-{{ $task->priority_color }}">{{ $task->priority_label }}</span></td>
                            <td>{{ $task->status_label }}</td>
                            <td>{{ $task->responsible?->name ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Documentos -->
    @if($process->documents->isNotEmpty())
    <div class="section">
        <div class="section-title">Documentos ({{ $process->documents->count() }})</div>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Categoria</th>
                    <th>Arquivo</th>
                    <th>Tamanho</th>
                    <th>Enviado por</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach($process->documents as $doc)
                    <tr>
                        <td>{{ $doc->title }}</td>
                        <td><span class="badge badge-purple">{{ $doc->category_label }}</span></td>
                        <td>{{ $doc->original_name }}</td>
                        <td>{{ $doc->file_size_formatted }}</td>
                        <td>{{ $doc->uploader?->name ?? '-' }}</td>
                        <td>{{ $doc->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <!-- Observações -->
    @if($process->internal_notes)
    <div class="section">
        <div class="section-title">Observações Internas</div>
        <div class="notes">{{ $process->internal_notes }}</div>
    </div>
    @endif

    <!-- Footer -->
    <div class="footer">
        <p>Montanari Advocacia — Documento gerado automaticamente em {{ $generated_at }}</p>
    </div>
</body>
</html>

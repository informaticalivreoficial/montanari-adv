<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Processos</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Helvetica', 'Arial', sans-serif; font-size: 10px; color: #333; }

        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 3px solid #d97706; padding-bottom: 10px; margin-bottom: 15px; }
        .header h1 { font-size: 18px; color: #1f2937; }
        .header .meta { font-size: 9px; color: #6b7280; text-align: right; }

        .filters { background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 6px; padding: 8px 12px; margin-bottom: 15px; font-size: 9px; }
        .filters strong { color: #374151; }

        .summary { display: flex; gap: 20px; margin-bottom: 15px; }
        .summary-box { background: #fffbeb; border: 1px solid #fcd34d; border-radius: 6px; padding: 8px 12px; flex: 1; }
        .summary-box .label { font-size: 8px; color: #92400e; text-transform: uppercase; letter-spacing: 0.5px; }
        .summary-box .value { font-size: 16px; font-weight: bold; color: #92400e; }

        table { width: 100%; border-collapse: collapse; margin-top: 5px; }
        thead th { background: #f9fafb; border-bottom: 2px solid #d1d5db; padding: 6px 8px; text-align: left; font-size: 8px; text-transform: uppercase; letter-spacing: 0.5px; color: #6b7280; }
        tbody td { border-bottom: 1px solid #f3f4f6; padding: 5px 8px; font-size: 9px; vertical-align: top; }
        tbody tr:hover { background: #f9fafb; }

        .badge { display: inline-block; padding: 1px 6px; border-radius: 10px; font-size: 8px; font-weight: 600; }
        .badge-green { background: #dcfce7; color: #166534; }
        .badge-yellow { background: #fef9c3; color: #854d0e; }
        .badge-gray { background: #f3f4f6; color: #374151; }
        .badge-red { background: #fee2e2; color: #991b1b; }
        .badge-blue { background: #dbeafe; color: #1e40af; }

        .footer { margin-top: 20px; border-top: 1px solid #e5e7eb; padding-top: 8px; font-size: 8px; color: #9ca3af; text-align: center; }

        .page-break { page-break-before: always; }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div>
            <h1>Relatório de Processos</h1>
            <p style="font-size: 10px; color: #6b7280;">Montanari Advocacia</p>
        </div>
        <div class="meta">
            <p>Gerado em: {{ $generated_at }}</p>
            <p>Total de processos: {{ $total }}</p>
        </div>
    </div>

    <!-- Filters -->
    @if($filters['status'] || $filters['case_type'] || $filters['responsible_id'])
    <div class="filters">
        <strong>Filtros aplicados:</strong>
        @if($filters['status']) Status: {{ ucfirst($filters['status']) }} | @endif
        @if($filters['case_type']) Tipo: {{ ucfirst($filters['case_type']) }} | @endif
        @if($filters['responsible_id']) Responsável: #{{ $filters['responsible_id'] }} | @endif
    </div>
    @endif

    <!-- Summary -->
    <div class="summary">
        <div class="summary-box">
            <div class="label">Ativos</div>
            <div class="value">{{ $processes->where('status', 'active')->count() }}</div>
        </div>
        <div class="summary-box">
            <div class="label">Suspensos</div>
            <div class="value">{{ $processes->where('status', 'suspended')->count() }}</div>
        </div>
        <div class="summary-box">
            <div class="label">Arquivados</div>
            <div class="value">{{ $processes->where('status', 'archived')->count() }}</div>
        </div>
        <div class="summary-box">
            <div class="label">Encerrados</div>
            <div class="value">{{ $processes->where('status', 'closed')->count() }}</div>
        </div>
    </div>

    <!-- Table -->
    <table>
        <thead>
            <tr>
                <th width="60">Nº Processo</th>
                <th width="60">Cliente</th>
                <th width="40">Tipo</th>
                <th width="55">Tribunal</th>
                <th width="50">Responsável</th>
                <th width="30">Status</th>
                <th width="40">Parte Contrária</th>
                <th width="25">Prazos</th>
                <th width="25">Tarefas</th>
            </tr>
        </thead>
        <tbody>
            @forelse($processes as $process)
                <tr>
                    <td><strong>{{ $process->process_number }}</strong></td>
                    <td>{{ $process->client?->name ?? '-' }}</td>
                    <td>
                        <span class="badge badge-blue">{{ $process->case_type_label }}</span>
                    </td>
                    <td>{{ $process->court_name ?? '-' }}</td>
                    <td>{{ $process->responsible?->name ?? '-' }}</td>
                    <td>
                        @php $color = $process->status_color; @endphp
                        <span class="badge badge-{{ $color }}">{{ $process->status_label }}</span>
                    </td>
                    <td>{{ $process->opposing_party ?? '-' }}</td>
                    <td style="text-align:center;">{{ $process->deadlines->count() }}</td>
                    <td style="text-align:center;">{{ $process->tasks->count() }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" style="text-align:center; padding:20px; color:#9ca3af;">Nenhum processo encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Footer -->
    <div class="footer">
        <p>Montanari Advocacia — Relatório gerado automaticamente em {{ $generated_at }}</p>
    </div>
</body>
</html>

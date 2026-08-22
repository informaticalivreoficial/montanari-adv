<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Prazos</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Helvetica', 'Arial', sans-serif; font-size: 10px; color: #333; }

        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 3px solid #dc2626; padding-bottom: 10px; margin-bottom: 15px; }
        .header h1 { font-size: 18px; color: #1f2937; }
        .header .meta { font-size: 9px; color: #6b7280; text-align: right; }

        .summary { display: flex; gap: 15px; margin-bottom: 15px; }
        .summary-box { border-radius: 6px; padding: 8px 12px; flex: 1; }
        .summary-box.pending { background: #fef9c3; border: 1px solid #fde047; }
        .summary-box.overdue { background: #fee2e2; border: 1px solid #fca5a5; }
        .summary-box.completed { background: #dcfce7; border: 1px solid #86efac; }
        .summary-box .label { font-size: 8px; text-transform: uppercase; letter-spacing: 0.5px; }
        .summary-box .value { font-size: 16px; font-weight: bold; }

        table { width: 100%; border-collapse: collapse; }
        thead th { background: #f9fafb; border-bottom: 2px solid #d1d5db; padding: 6px 8px; text-align: left; font-size: 8px; text-transform: uppercase; letter-spacing: 0.5px; color: #6b7280; }
        tbody td { border-bottom: 1px solid #f3f4f6; padding: 5px 8px; font-size: 9px; }
        tbody tr.overdue { background: #fef2f2; }

        .badge { display: inline-block; padding: 1px 6px; border-radius: 10px; font-size: 8px; font-weight: 600; }
        .badge-red { background: #fee2e2; color: #991b1b; }
        .badge-orange { background: #ffedd5; color: #9a3412; }
        .badge-blue { background: #dbeafe; color: #1e40af; }
        .badge-gray { background: #f3f4f6; color: #374151; }
        .badge-green { background: #dcfce7; color: #166534; }

        .footer { margin-top: 20px; border-top: 1px solid #e5e7eb; padding-top: 8px; font-size: 8px; color: #9ca3af; text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <div>
            <h1>Relatório de Prazos</h1>
            <p style="font-size: 10px; color: #6b7280;">Montanari Advocacia</p>
        </div>
        <div class="meta">
            <p>Gerado em: {{ $generated_at }}</p>
            <p>Total: {{ $total }}</p>
        </div>
    </div>

    <!-- Summary -->
    <div class="summary">
        <div class="summary-box pending">
            <div class="label" style="color:#854d0e;">Pendentes</div>
            <div class="value" style="color:#854d0e;">{{ $deadlines->where('status', 'pending')->count() }}</div>
        </div>
        <div class="summary-box overdue">
            <div class="label" style="color:#991b1b;">Atrasados</div>
            <div class="value" style="color:#991b1b;">{{ $deadlines->filter(fn($d) => $d->is_overdue)->count() }}</div>
        </div>
        <div class="summary-box completed">
            <div class="label" style="color:#166534;">Concluídos</div>
            <div class="value" style="color:#166534;">{{ $deadlines->where('status', 'completed')->count() }}</div>
        </div>
    </div>

    <!-- Table -->
    <table>
        <thead>
            <tr>
                <th>Prazo</th>
                <th>Processo</th>
                <th>Vencimento</th>
                <th>Prioridade</th>
                <th>Status</th>
                <th>Responsável</th>
            </tr>
        </thead>
        <tbody>
            @forelse($deadlines as $deadline)
                <tr class="{{ $deadline->is_overdue ? 'overdue' : '' }}">
                    <td><strong>{{ $deadline->title }}</strong></td>
                    <td>{{ $deadline->process?->process_number ?? '-' }}</td>
                    <td>{{ $deadline->due_date->format('d/m/Y H:i') }}</td>
                    <td><span class="badge badge-{{ $deadline->priority_color }}">{{ $deadline->priority_label }}</span></td>
                    <td>{{ $deadline->status_label }}</td>
                    <td>{{ $deadline->responsible?->name ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center; padding:20px; color:#9ca3af;">Nenhum prazo encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>Montanari Advocacia — Relatório gerado automaticamente em {{ $generated_at }}</p>
    </div>
</body>
</html>

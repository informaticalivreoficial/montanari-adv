<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Process;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ProcessReportController extends Controller
{
    /**
     * GET /api/legal/reports/processes
     * Gera relatório PDF de todos os processos
     */
    public function index(Request $request)
    {
        $query = Process::with(['client', 'responsible', 'deadlines', 'tasks']);

        // Filtros
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('case_type')) {
            $query->where('case_type', $request->case_type);
        }
        if ($request->filled('responsible_id')) {
            $query->where('responsible_id', $request->responsible_id);
        }

        $processes = $query->orderBy('created_at', 'desc')->get();

        $data = [
            'processes' => $processes,
            'filters' => [
                'status' => $request->status,
                'case_type' => $request->case_type,
                'responsible_id' => $request->responsible_id,
            ],
            'generated_at' => now()->format('d/m/Y H:i'),
            'total' => $processes->count(),
        ];

        $pdf = Pdf::loadView('reports.processes', $data)
            ->setPaper('a4', 'landscape');

        return $pdf->download('relatorio-processos-' . now()->format('Y-m-d') . '.pdf');
    }

    /**
     * GET /api/legal/reports/processes/{id}
     * Gera relatório PDF de um processo específico
     */
    public function show(int $id)
    {
        $process = Process::with(['client', 'responsible', 'deadlines', 'tasks', 'documents'])
            ->findOrFail($id);

        $data = [
            'process' => $process,
            'generated_at' => now()->format('d/m/Y H:i'),
        ];

        $pdf = Pdf::loadView('reports.process-detail', $data)
            ->setPaper('a4', 'portrait');

        return $pdf->download("processo-{$process->process_number}.pdf");
    }

    /**
     * GET /api/legal/reports/deadlines
     * Gera relatório de prazos
     */
    public function deadlines(Request $request)
    {
        $query = \App\Models\Deadline::with(['process', 'responsible']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('priority')) {
            $query->where('priority', $request->priority);
        }

        $deadlines = $query->orderBy('due_date', 'asc')->get();

        $data = [
            'deadlines' => $deadlines,
            'generated_at' => now()->format('d/m/Y H:i'),
            'total' => $deadlines->count(),
        ];

        $pdf = Pdf::loadView('reports.deadlines', $data)
            ->setPaper('a4', 'portrait');

        return $pdf->download('relatorio-prazos-' . now()->format('Y-m-d') . '.pdf');
    }
}

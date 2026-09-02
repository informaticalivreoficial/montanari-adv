<?php

namespace App\Http\Livewire\Dashboard\Legal\Processes;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Process;
use App\Models\User;
use App\Services\DatajudService;
use App\Services\DjenService;
use App\Exceptions\DatajudException;
use App\Exceptions\DjenException;
use App\Traits\HasAlerts;
use Illuminate\Support\Facades\Gate;

class ListProcesses extends Component
{
    use WithPagination, HasAlerts;

    public $search = '';
    public $filterStatus = '';
    public $filterType = '';

    protected $queryString = ['search', 'filterStatus', 'filterType'];

    public function mount()
    {
        Gate::authorize('viewAny', Process::class);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterStatus()
    {
        $this->resetPage();
    }

    public function updatingFilterType()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        if (auth()->user()->hasRole('employee')) {
            abort(403, 'Colaboradores não podem excluir processos.');
        }

        $process = Process::findOrFail($id);
        $process->delete();

        $this->toastSuccess('Processo excluído com sucesso!');
    }

    /**
     * Re-sincroniza um processo vinculado ao Datajud (consulta a API e atualiza).
     */
    public function resync($id)
    {
        $process = Process::where('source_provider', 'datajud')->findOrFail($id);

        $tribunal = strtolower((string) ($process->court_acronym ?? ''));

        if (empty($tribunal)) {
            $this->toastError('Defina o tribunal (court_acronym) para re-sincronizar.');
            return;
        }

        try {
            $svc    = new DatajudService();
            $source = $svc->findByNumero($tribunal, $process->source_id);

            if (!$source) {
                $this->toastError("Processo {$process->source_id} não encontrado no Datajud.");
                return;
            }

            $data = $svc->normalize($source);
            $process->update(array_merge($data, [
                'source_data'    => $source,
                'last_synced_at' => now(),
                'sync_attempts'  => $process->sync_attempts + 1,
                'sync_error'     => null,
            ]));

            $svc->syncDetails($process, $source);

            // Complemento DJEN: publicações/intimações do Diário oficial.
            try {
                $djen = new DjenService();
                $n = $djen->syncPublications($process);
                $msg = 'Processo re-sincronizado com o Datajud.';
                if ($n > 0) {
                    $msg .= " {$n} publicação(ões) do DJEN importada(s).";
                }
                $this->toastSuccess($msg);
            } catch (DjenException $e) {
                $this->toastSuccess('Processo re-sincronizado com o Datajud. (DJEN: ' . $e->getMessage() . ')');
            }
        } catch (DatajudException $e) {
            $process->update([
                'sync_error'    => $e->getMessage(),
                'sync_attempts' => $process->sync_attempts + 1,
            ]);
            $this->toastError('Erro ao sincronizar: ' . $e->getMessage());
        }
    }

    public function render()
    {
        $processes = Process::with('client', 'responsible')
            ->when($this->search, fn($q) => $q->search($this->search))
            ->when($this->filterStatus, fn($q) => $q->where('status', $this->filterStatus))
            ->when($this->filterType, fn($q) => $q->byType($this->filterType))
            // Manager só vê processos onde é responsável
            ->when(auth()->user()->hasRole('manager'), fn($q) => $q->where('responsible_id', auth()->id()))
            ->latest()
            ->paginate(25);

        return view('livewire.dashboard.Legal.Processes.list', compact('processes'))
            ->layout('layouts.admin', ['title' => 'Processos']);
    }
}

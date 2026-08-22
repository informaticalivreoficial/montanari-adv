<?php

namespace App\Http\Livewire\Dashboard\Legal\Processes;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Process;
use App\Models\User;
use App\Traits\HasAlerts;

class ListProcesses extends Component
{
    use WithPagination, HasAlerts;

    public $search = '';
    public $filterStatus = '';
    public $filterType = '';

    protected $queryString = ['search', 'filterStatus', 'filterType'];

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
        $process = Process::findOrFail($id);
        $process->delete();

        $this->toastSuccess('Processo excluído com sucesso!');
    }

    public function render()
    {
        $processes = Process::with('client', 'responsible')
            ->when($this->search, fn($q) => $q->search($this->search))
            ->when($this->filterStatus, fn($q) => $q->where('status', $this->filterStatus))
            ->when($this->filterType, fn($q) => $q->byType($this->filterType))
            ->latest()
            ->paginate(10);

        return view('livewire.dashboard.Legal.Processes.list', compact('processes'))
            ->layout('layouts.admin', ['title' => 'Processos']);
    }
}

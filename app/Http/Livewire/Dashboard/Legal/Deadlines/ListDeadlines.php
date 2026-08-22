<?php

namespace App\Http\Livewire\Dashboard\Legal\Deadlines;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Deadline;
use App\Models\Process;
use App\Models\User;
use App\Traits\HasAlerts;

class ListDeadlines extends Component
{
    use WithPagination, HasAlerts;

    public $search = '';
    public $filterStatus = '';
    public $filterPriority = '';

    protected $queryString = ['search', 'filterStatus', 'filterPriority'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function complete($id)
    {
        $deadline = Deadline::findOrFail($id);
        $deadline->update(['status' => 'completed']);
        $this->toastSuccess('Prazo marcado como concluído!');
    }

    public function delete($id)
    {
        $deadline = Deadline::findOrFail($id);
        $deadline->delete();
        $this->toastSuccess('Prazo excluído com sucesso!');
    }

    public function render()
    {
        $deadlines = Deadline::with('process', 'responsible')
            ->when($this->search, fn($q) => $q->where('title', 'like', "%{$this->search}%"))
            ->when($this->filterStatus, fn($q) => $q->where('status', $this->filterStatus))
            ->when($this->filterPriority, fn($q) => $q->where('priority', $this->filterPriority))
            ->orderBy('due_date', 'asc')
            ->paginate(10);

        return view('livewire.dashboard.Legal.Deadlines.list', compact('deadlines'))
            ->layout('layouts.admin', ['title' => 'Prazos']);
    }
}

<?php

namespace App\Http\Livewire\Dashboard\Legal\Deadlines;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Deadline;
use App\Models\Process;
use App\Models\User;
use App\Models\Event;
use App\Traits\HasAlerts;
use Illuminate\Support\Facades\Gate;

class ListDeadlines extends Component
{
    use WithPagination, HasAlerts;

    public $search = '';
    public $filterStatus = '';
    public $filterPriority = '';

    protected $queryString = ['search', 'filterStatus', 'filterPriority'];

    public function mount()
    {
        Gate::authorize('viewAny', Deadline::class);
    }

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
        if (auth()->user()->hasRole('employee')) {
            abort(403, 'Colaboradores não podem excluir prazos.');
        }

        $deadline = Deadline::findOrFail($id);

        // Remove também o evento correspondente do calendário (Agenda)
        Event::where('deadline_id', $deadline->id)->delete();

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
            ->paginate(25);

        return view('livewire.dashboard.Legal.Deadlines.list', compact('deadlines'))
            ->layout('layouts.admin', ['title' => 'Prazos']);
    }
}

<?php

namespace App\Http\Livewire\Dashboard\Legal\Tasks;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Task;
use App\Models\Process;
use App\Models\User;
use App\Models\Event;
use App\Traits\HasAlerts;
use App\Notifications\System\TaskCompleted;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Gate;

class ListTasks extends Component
{
    use WithPagination, HasAlerts;

    public $search = '';
    public $filterStatus = '';
    public $filterPriority = '';

    protected $queryString = ['search', 'filterStatus', 'filterPriority'];

    public function mount()
    {
        Gate::authorize('viewAny', Task::class);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function toggleStatus($id)
    {
        $task = Task::findOrFail($id);
        $newStatus = $task->status === 'completed' ? 'pending' : 'completed';
        $task->update(['status' => $newStatus]);

        $label = $newStatus === 'completed' ? 'concluída' : 'pendente';
        $this->toastSuccess("Tarefa marcada como {$label}!");

        // Notifica quando concluída
        if ($newStatus === 'completed') {
            $admins = User::role(['super-admin', 'admin'])->get();
            Notification::send($admins, new TaskCompleted(
                taskTitle: $task->title,
                completedByName: auth()->user()->name,
                taskId: $task->id,
            ));
        }
    }

    public function startProgress($id)
    {
        $task = Task::findOrFail($id);
        $task->update(['status' => 'in_progress']);
        $this->toastSuccess('Tarefa iniciada!');
    }

    public function delete($id)
    {
        if (auth()->user()->hasRole('employee')) {
            abort(403, 'Colaboradores não podem excluir tarefas.');
        }

        $task = Task::findOrFail($id);

        // Remove também o evento correspondente do calendário (Agenda)
        Event::where('task_id', $task->id)->delete();

        $task->delete();
        $this->toastSuccess('Tarefa excluída com sucesso!');
    }

    public function render()
    {
        $tasks = Task::with('process', 'responsible')
            ->when($this->search, fn($q) => $q->where('title', 'like', "%{$this->search}%"))
            ->when($this->filterStatus, fn($q) => $q->where('status', $this->filterStatus))
            ->when($this->filterPriority, fn($q) => $q->where('priority', $this->filterPriority))
            ->latest()
            ->paginate(25);

        return view('livewire.dashboard.Legal.Tasks.list', compact('tasks'))
            ->layout('layouts.admin', ['title' => 'Tarefas']);
    }
}

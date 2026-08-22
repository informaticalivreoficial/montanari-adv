<?php

namespace App\Http\Livewire\Dashboard\Legal\Tasks;

use Livewire\Component;
use App\Models\Task;
use App\Models\Process;
use App\Models\User;
use App\Traits\HasAlerts;
use App\Traits\HasValidations;

class CreateTask extends Component
{
    use HasAlerts, HasValidations;

    public $process_id = '';
    public $responsible_id = '';
    public $title = '';
    public $description = '';
    public $due_date = '';
    public $due_time = '00:00';
    public $priority = 'normal';
    public $status = 'pending';
    public $notes = '';

    public $processes = [];
    public $team = [];

    public function mount()
    {
        $this->processes = Process::active()->pluck('process_number', 'id')->toArray();
        $this->team = User::team()->pluck('name', 'id')->toArray();
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'priority' => 'required|string',
        ]);

        $dueDateTime = null;
        if ($this->due_date) {
            $dueDateTime = $this->due_date . ' ' . $this->due_time;
        }

        Task::create([
            'process_id' => $this->process_id ?: null,
            'responsible_id' => $this->responsible_id ?: null,
            'title' => $this->title,
            'description' => $this->description ?: null,
            'due_date' => $dueDateTime,
            'priority' => $this->priority,
            'status' => $this->status,
            'notes' => $this->notes ?: null,
        ]);

        return redirect()->route('dashboard.legal.tasks')
            ->with('toast_success', 'Tarefa criada com sucesso!');
    }

    public function render()
    {
        return view('livewire.dashboard.Legal.Tasks.create')
            ->layout('layouts.admin', ['title' => 'Nova Tarefa']);
    }
}

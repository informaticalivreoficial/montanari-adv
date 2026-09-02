<?php

namespace App\Http\Livewire\Dashboard\Legal\Tasks;

use Livewire\Component;
use App\Models\Task;
use App\Models\User;
use App\Models\Event;
use App\Traits\HasAlerts;
use App\Traits\HasValidations;
use App\Notifications\System\TaskCreated;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Gate;

class CreateTask extends Component
{
    use HasAlerts, HasValidations;

    public $process_id = '';
    public $processLabel = '';
    public $responsible_id = '';
    public $title = '';
    public $description = '';
    public $due_date = '';
    public $due_time = '00:00';
    public $priority = 'normal';
    public $status = 'pending';
    public $notes = '';

    public $team = [];

    public function mount()
    {
        Gate::authorize('create', Task::class);

        // Responsável: admin, manager e employee (sem clientes nem super-admin)
        $this->team = User::role(['admin', 'manager', 'employee'])->pluck('name', 'id')->toArray();
    }

    public function updatedProcessId($value)
    {
        if (empty($value)) {
            $this->processLabel = '';
            return;
        }

        $process = \App\Models\Process::with('client')->find($value);
        if ($process) {
            $clientName = $process->client->name ?? 'Sem cliente';
            $this->processLabel = "{$process->process_number} — {$clientName}";
        }
    }

    public function store()
    {
        $rules = static::validationRules()['task'];

        $this->validate($rules, static::validationMessages(), static::validationAttributes());

        $dueDateTime = null;
        if ($this->due_date) {
            $dueDateTime = $this->due_date . ' ' . $this->due_time;
        }

        $task = Task::create([
            'process_id' => $this->process_id ?: null,
            'responsible_id' => $this->responsible_id ?: null,
            'title' => $this->title,
            'description' => $this->description ?: null,
            'due_date' => $dueDateTime,
            'priority' => $this->priority,
            'status' => $this->status,
            'notes' => $this->notes ?: null,
        ]);

        // Espelha a tarefa no calendário (Agenda) quando houver data de vencimento
        if ($dueDateTime) {
            $allDay = $this->due_time === '00:00';

            Event::create([
                'task_id'     => $task->id,
                'process_id'  => $task->process_id,
                'user_id'     => auth()->id(),
                'title'       => $task->title,
                'description' => $task->description,
                'start_date'  => $allDay ? $this->due_date . ' 00:00:00' : $dueDateTime,
                'end_date'    => null,
                'all_day'     => $allDay,
                'event_type'  => 'task',
                'color'       => null, // usa a cor do tipo (verde, legenda "Tarefa")
                'location'    => null,
                'notes'       => $task->notes,
            ]);
        }

        // Notifica admins
        $admins = User::role(['super-admin', 'admin'])->get();
        Notification::send($admins, new TaskCreated(
            taskTitle: $this->title,
            responsibleName: $this->responsible_id ? User::find($this->responsible_id)?->name : null,
            taskId: $task->id,
        ));

        return redirect()->route('dashboard.legal.tasks')
            ->with('toast_success', 'Tarefa criada com sucesso!');
    }

    public function render()
    {
        return view('livewire.dashboard.Legal.Tasks.create')
            ->layout('layouts.admin', ['title' => 'Nova Tarefa']);
    }
}

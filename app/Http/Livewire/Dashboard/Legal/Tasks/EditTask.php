<?php

namespace App\Http\Livewire\Dashboard\Legal\Tasks;

use Livewire\Component;
use App\Models\Task;
use App\Models\User;
use App\Models\Event;
use App\Traits\HasAlerts;
use App\Traits\HasValidations;
use Illuminate\Support\Facades\Gate;

class EditTask extends Component
{
    use HasAlerts, HasValidations;

    public $taskId;

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

    public function mount($id)
    {
        $this->taskId = $id;
        // Responsável: admin, manager e employee (sem clientes nem super-admin)
        $this->team = User::role(['admin', 'manager', 'employee'])->pluck('name', 'id')->toArray();

        $task = Task::findOrFail($this->taskId);
        Gate::authorize('update', $task);

        $this->loadTask();
    }

    public function loadTask()
    {
        $task = Task::with('process.client')->findOrFail($this->taskId);

        $this->process_id = $task->process_id;
        $this->responsible_id = $task->responsible_id;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->priority = $task->priority;
        $this->status = $task->status;
        $this->notes = $task->notes;

        if ($task->process_id && $task->process) {
            $clientName = $task->process->client->name ?? 'Sem cliente';
            $this->processLabel = "{$task->process->process_number} — {$clientName}";
        }

        if ($task->due_date) {
            $this->due_date = $task->due_date->format('Y-m-d');
            $this->due_time = $task->due_date->format('H:i');
        } else {
            $this->due_date = '';
            $this->due_time = '00:00';
        }
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

    public function update()
    {
        $rules = static::validationRules()['task'];

        $this->validate($rules, static::validationMessages(), static::validationAttributes());

        $dueDateTime = null;
        if ($this->due_date) {
            $dueDateTime = $this->due_date . ' ' . $this->due_time;
        }

        $task = Task::findOrFail($this->taskId);
        $task->update([
            'process_id' => $this->process_id ?: null,
            'responsible_id' => $this->responsible_id ?: null,
            'title' => $this->title,
            'description' => $this->description ?: null,
            'due_date' => $dueDateTime,
            'priority' => $this->priority,
            'status' => $this->status,
            'notes' => $this->notes ?: null,
        ]);

        // Mantém o espelho da tarefa no calendário (Agenda) sincronizado
        if ($dueDateTime) {
            $allDay = $this->due_time === '00:00';
            Event::updateOrCreate(
                ['task_id' => $task->id],
                [
                    'process_id' => $task->process_id,
                    'user_id' => auth()->id(),
                    'title' => $task->title,
                    'description' => $task->description,
                    'start_date' => $allDay ? $this->due_date . ' 00:00:00' : $dueDateTime,
                    'end_date' => null,
                    'all_day' => $allDay,
                    'event_type' => 'task',
                    'color' => null,
                    'location' => null,
                    'notes' => $task->notes,
                ]
            );
        } else {
            Event::where('task_id', $task->id)->delete();
        }

        return redirect()->route('dashboard.legal.tasks')
            ->with('toast_success', 'Tarefa atualizada com sucesso!');
    }

    public function render()
    {
        return view('livewire.dashboard.Legal.Tasks.edit')
            ->layout('layouts.admin', ['title' => 'Editar Tarefa']);
    }
}

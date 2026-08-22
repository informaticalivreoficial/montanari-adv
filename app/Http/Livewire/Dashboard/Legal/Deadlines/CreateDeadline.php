<?php

namespace App\Http\Livewire\Dashboard\Legal\Deadlines;

use Livewire\Component;
use App\Models\Deadline;
use App\Models\Process;
use App\Models\User;
use App\Traits\HasAlerts;
use App\Traits\HasValidations;

class CreateDeadline extends Component
{
    use HasAlerts, HasValidations;

    public $process_id = '';
    public $responsible_id = '';
    public $title = '';
    public $description = '';
    public $due_date = '';
    public $due_time = '00:00';
    public $reminder_at = '';
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
            'process_id' => 'required|exists:processes,id',
            'title' => 'required|string|max:255',
            'due_date' => 'required|date',
            'priority' => 'required|string',
        ]);

        $dueDateTime = $this->due_date . ' ' . $this->due_time;

        Deadline::create([
            'process_id' => $this->process_id,
            'responsible_id' => $this->responsible_id ?: null,
            'title' => $this->title,
            'description' => $this->description ?: null,
            'due_date' => $dueDateTime,
            'reminder_at' => $this->reminder_at ?: null,
            'priority' => $this->priority,
            'status' => $this->status,
            'notes' => $this->notes ?: null,
        ]);

        return redirect()->route('dashboard.legal.deadlines')
            ->with('toast_success', 'Prazo criado com sucesso!');
    }

    public function render()
    {
        return view('livewire.dashboard.Legal.Deadlines.create')
            ->layout('layouts.admin', ['title' => 'Novo Prazo']);
    }
}

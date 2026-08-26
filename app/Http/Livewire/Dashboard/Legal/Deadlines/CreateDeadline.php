<?php

namespace App\Http\Livewire\Dashboard\Legal\Deadlines;

use Livewire\Component;
use App\Models\Deadline;
use App\Models\Process;
use App\Models\User;
use App\Models\Event;
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

        $deadline = Deadline::create([
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

        // Espelha o prazo no calendário (Agenda) — event_type 'deadline', cor amber
        $allDay = $this->due_time === '00:00';

        Event::create([
            'deadline_id' => $deadline->id,
            'process_id'  => $deadline->process_id,
            'user_id'     => auth()->id(),
            'title'       => $deadline->title,
            'description' => $deadline->description,
            'start_date'  => $allDay ? $this->due_date . ' 00:00:00' : $dueDateTime,
            'end_date'    => null,
            'all_day'     => $allDay,
            'event_type'  => 'deadline',
            'color'       => null, // usa a cor do tipo (amber #f59e0b, legenda "Prazo")
            'location'    => null,
            'notes'       => $deadline->notes,
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

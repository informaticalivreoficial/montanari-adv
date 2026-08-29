<?php

namespace App\Http\Livewire\Dashboard\Legal\Agenda;

use Livewire\Component;
use App\Models\Event;
use App\Models\Process;
use App\Models\User;
use App\Traits\HasAlerts;
use App\Traits\HasValidations;

class Agenda extends Component
{
    use HasAlerts, HasValidations;

    public $showModal = false;
    public $editingId = null;

    // Form fields
    public $title = '';
    public $description = '';
    public $start_date = '';
    public $start_time = '09:00';
    public $end_date = '';
    public $end_time = '10:00';
    public $all_day = false;
    public $event_type = 'other';
    public $color = '';
    public $process_id = '';
    public $location = '';
    public $notes = '';

    // View modal
    public $showViewModal = false;
    public $viewingEvent = null;

    // Event actions popup
    public $showEventActions = false;
    public $actionsEventId = null;
    public $actionsEventTitle = '';
    public $actionsPopupX = 0;
    public $actionsPopupY = 0;

    public $processes = [];
    public $team = [];
    public $events = [];

    protected $listeners = [
        'openDateModal' => 'openDateModal',
        'openEventModal' => 'openEventModal',
        'openEventActions' => 'openEventActions',
        'updateEventDate' => 'updateEventDate',
        'refreshCalendar' => 'loadEvents',
    ];

    public function mount()
    {
        $this->processes = Process::active()->pluck('process_number', 'id')->toArray();
        $this->team = User::team()->pluck('name', 'id')->toArray();
        $this->loadEvents();
    }

    public function loadEvents()
    {
        $this->events = Event::all()->map(fn($e) => $e->toFullCalendarArray())->toArray();
    }

    public function openDateModal($date)
    {
        $this->resetForm();
        $this->start_date = $date;
        $this->end_date = $date;
        $this->showModal = true;
        $this->editingId = null;
    }

    public function openEventModal($eventId)
    {
        $event = Event::find($eventId);
        if (!$event) return;

        $this->editingId = $event->id;
        $this->title = $event->title;
        $this->description = $event->description;
        $this->start_date = $event->start_date->format('Y-m-d');
        $this->start_time = $event->start_date->format('H:i');
        $this->end_date = $event->end_date?->format('Y-m-d') ?? $this->start_date;
        $this->end_time = $event->end_date?->format('H:i') ?? '10:00';
        $this->all_day = $event->all_day;
        $this->event_type = $event->event_type;
        $this->color = $event->color ?? '';
        $this->process_id = $event->process_id ?? '';
        $this->location = $event->location;
        $this->notes = $event->notes;

        $this->showViewModal = false;
        $this->showModal = true;
    }

    public function updateEventDate($eventId, $start, $end, $allDay)
    {
        $event = Event::find($eventId);
        if (!$event) return;

        $event->update([
            'start_date' => $start,
            'end_date' => $end,
            'all_day' => $allDay,
        ]);

        $this->loadEvents();
        $this->dispatch('loadEvents', $this->events);
        $this->toastSuccess('Evento atualizado!');
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'event_type' => 'required|string',
        ]);

        $startDateTime = $this->all_day
            ? $this->start_date . ' 00:00:00'
            : $this->start_date . ' ' . $this->start_time;

        $endDateTime = null;
        if ($this->end_date) {
            $endDateTime = $this->all_day
                ? $this->end_date . ' 23:59:59'
                : $this->end_date . ' ' . $this->end_time;
        }

        $data = [
            'title' => $this->title,
            'description' => $this->description ?: null,
            'start_date' => $startDateTime,
            'end_date' => $endDateTime,
            'all_day' => $this->all_day,
            'event_type' => $this->event_type,
            'color' => $this->color ?: null,
            'process_id' => $this->process_id ?: null,
            'location' => $this->location ?: null,
            'notes' => $this->notes ?: null,
            'user_id' => auth()->id(),
        ];

        if ($this->editingId) {
            Event::findOrFail($this->editingId)->update($data);
            $this->toastSuccess('Evento atualizado com sucesso!');
        } else {
            Event::create($data);
            $this->toastSuccess('Evento criado com sucesso!');
        }

        $this->showModal = false;
        $this->resetForm();
        $this->loadEvents();
        $this->dispatch('loadEvents', $this->events);
    }

    public function openEventActions($data)
    {
        $this->actionsEventId = $data['id'] ?? null;
        $this->actionsEventTitle = $data['title'] ?? '';
        $this->actionsPopupX = $data['x'] ?? 0;
        $this->actionsPopupY = $data['y'] ?? 0;
        $this->showEventActions = true;
    }

    public function closeEventActions()
    {
        $this->showEventActions = false;
        $this->actionsEventId = null;
    }

    public function editFromActions()
    {
        $id = $this->actionsEventId;
        $this->showEventActions = false;
        if ($id) {
            $this->openEventModal($id);
        }
    }

    public function deleteFromActions()
    {
        $id = $this->actionsEventId;
        $this->showEventActions = false;
        if (!$id) return;

        Event::findOrFail($id)->delete();
        $this->loadEvents();
        $this->dispatch('refreshCalendar');
        $this->toastSuccess('Evento excluído com sucesso!');
    }

    public function deleteEvent()
    {
        if (!$this->editingId) return;

        Event::findOrFail($this->editingId)->delete();
        $this->showModal = false;
        $this->resetForm();
        $this->loadEvents();
        $this->dispatch('refreshCalendar');
        $this->toastSuccess('Evento excluído com sucesso!');
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function closeViewModal()
    {
        $this->showViewModal = false;
        $this->viewingEvent = null;
    }

    protected function resetForm()
    {
        $this->editingId = null;
        $this->title = '';
        $this->description = '';
        $this->start_date = '';
        $this->start_time = '09:00';
        $this->end_date = '';
        $this->end_time = '10:00';
        $this->all_day = false;
        $this->event_type = 'other';
        $this->color = '';
        $this->process_id = '';
        $this->location = '';
        $this->notes = '';
    }

    public function render()
    {
        return view('livewire.dashboard.Legal.Agenda.calendar')
            ->layout('layouts.admin', ['title' => 'Agenda']);
    }
}

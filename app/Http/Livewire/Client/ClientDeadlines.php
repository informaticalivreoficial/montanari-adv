<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Process;
use App\Models\Deadline;

class ClientDeadlines extends Component
{
    public $deadlines = [];
    public $filter = 'upcoming';

    public function mount()
    {
        $this->loadDeadlines();
    }

    public function setFilter($filter)
    {
        $this->filter = $filter;
        $this->loadDeadlines();
    }

    protected function loadDeadlines()
    {
        $userId = Auth::id();
        $processIds = Process::where('client_id', $userId)->pluck('id')->toArray();

        $query = Deadline::whereIn('process_id', $processIds)
            ->with('process');

        if ($this->filter === 'upcoming') {
            $query->where('due_date', '>=', now())->where('status', 'pending');
        } elseif ($this->filter === 'overdue') {
            $query->where('due_date', '<', now())->where('status', 'pending');
        } elseif ($this->filter === 'completed') {
            $query->where('status', 'completed');
        }

        $this->deadlines = $query->orderBy('due_date', 'asc')->get()->toArray();
    }

    public function render()
    {
        return view('livewire.client.client-deadlines')->layout('layouts.client', ['title' => 'Prazos']);
    }
}

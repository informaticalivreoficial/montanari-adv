<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\Process;

class ProcessList extends Component
{
    use WithPagination;

    public $search = '';
    public $statusFilter = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function render()
    {
        $userId = Auth::id();

        $query = Process::where('client_id', $userId)
            ->with(['responsible', 'deadlines', 'documents']);

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('process_number', 'like', "%{$this->search}%")
                  ->orWhere('court_name', 'like', "%{$this->search}%")
                  ->orWhere('opposing_party', 'like', "%{$this->search}%");
            });
        }

        if ($this->statusFilter) {
            $query->where('status', $this->statusFilter);
        }

        $processes = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.client.process-list', [
            'processes' => $processes,
        ])->layout('layouts.client', ['title' => 'Meus Processos']);
    }
}

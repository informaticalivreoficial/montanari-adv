<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Process;
use App\Models\Deadline;
use App\Models\Document;
use App\Models\Message;

class Dashboard extends Component
{
    public $user;
    public $processes = [];
    public $upcomingDeadlines = [];
    public $recentDocuments = [];
    public $recentMessages = [];
    public $unreadCount = 0;
    public $stats = [
        'total' => 0,
        'active' => 0,
        'suspended' => 0,
        'closed' => 0,
        'pendingDocs' => 0,
    ];

    public function mount()
    {
        $this->user = Auth::user();
        $this->loadData();
    }

    protected function loadData()
    {
        $userId = $this->user->id;

        // Processes
        $this->processes = Process::where('client_id', $userId)
            ->with(['responsible', 'deadlines', 'documents'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();

        // Stats
        $this->stats['total'] = count($this->processes);
        $this->stats['active'] = collect($this->processes)->where('status', 'active')->count();
        $this->stats['suspended'] = collect($this->processes)->where('status', 'suspended')->count();
        $this->stats['closed'] = collect($this->processes)->where('status', 'closed')->count();

        // Upcoming deadlines (next 30 days)
        $processIds = collect($this->processes)->pluck('id')->toArray();
        $this->upcomingDeadlines = Deadline::whereIn('process_id', $processIds)
            ->where('status', 'pending')
            ->where('due_date', '>=', now())
            ->where('due_date', '<=', now()->addDays(30))
            ->with('process')
            ->orderBy('due_date', 'asc')
            ->limit(10)
            ->get()
            ->toArray();

        // Recent documents requested
        $this->recentDocuments = Document::whereIn('process_id', $processIds)
            ->where('uploaded_by', '!=', $userId)
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->with('process')
            ->get()
            ->toArray();

        $this->stats['pendingDocs'] = Document::whereIn('process_id', $processIds)
            ->where('category', 'requested')
            ->count();

        // Recent messages (hub de comunicação com o escritório)
        $this->recentMessages = Message::where('sender_id', $userId)
            ->orWhere('recipient_id', $userId)
            ->with(['sender', 'recipient'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get()
            ->toArray();

        $this->unreadCount = Message::where('recipient_id', $userId)
            ->where('is_read', false)
            ->count();
    }

    public function render()
    {
        return view('livewire.client.dashboard')->layout('layouts.client', ['title' => 'Dashboard']);
    }
}

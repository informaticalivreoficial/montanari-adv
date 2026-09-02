<?php

namespace App\Http\Livewire\Dashboard\Legal\Processes;

use Livewire\Component;
use App\Models\Process;
use Illuminate\Support\Facades\Gate;

class ShowProcess extends Component
{
    public $processId;
    public $process = null;

    public function mount($id)
    {
        $this->processId = $id;
        $this->loadProcess();

        Gate::authorize('view', $this->process);
    }

    protected function loadProcess()
    {
        $this->process = Process::with([
            'client',
            'responsible',
            'documents.uploader',
            'deadlines.responsible',
        ])->findOrFail($this->processId);
    }

    public function render()
    {
        return view('livewire.dashboard.Legal.Processes.show')
            ->layout('layouts.admin', ['title' => 'Visualizar Processo']);
    }
}

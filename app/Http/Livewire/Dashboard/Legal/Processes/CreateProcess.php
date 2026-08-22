<?php

namespace App\Http\Livewire\Dashboard\Legal\Processes;

use Livewire\Component;
use App\Models\Process;
use App\Models\User;
use App\Traits\HasAlerts;
use App\Traits\HasValidations;

class CreateProcess extends Component
{
    use HasAlerts, HasValidations;

    public $client_id = '';
    public $responsible_id = '';
    public $process_number = '';
    public $court_name = '';
    public $court_variable = '';
    public $case_type = '';
    public $case_area = '';
    public $opposing_party = '';
    public $opposing_lawyer = '';
    public $description = '';
    public $status = 'active';
    public $client_interest = '';
    public $contract_value = '';
    public $internal_notes = '';

    public $clients = [];
    public $team = [];

    public function mount()
    {
        $this->clients = User::role('client')->pluck('name', 'id')->toArray();
        $this->team = User::team()->pluck('name', 'id')->toArray();
    }

    public function store()
    {
        $this->validate([
            'client_id' => 'required|exists:users,id',
            'process_number' => 'required|string|max:255|unique:processes,process_number',
            'case_type' => 'required|string',
            'court_name' => 'nullable|string|max:255',
            'status' => 'required|string',
        ]);

        Process::create([
            'client_id' => $this->client_id,
            'responsible_id' => $this->responsible_id ?: null,
            'process_number' => $this->process_number,
            'court_name' => $this->court_name ?: null,
            'court_variable' => $this->court_variable ?: null,
            'case_type' => $this->case_type,
            'case_area' => $this->case_area ?: null,
            'opposing_party' => $this->opposing_party ?: null,
            'opposing_lawyer' => $this->opposing_lawyer ?: null,
            'description' => $this->description ?: null,
            'status' => $this->status,
            'client_interest' => $this->client_interest ?: null,
            'contract_value' => $this->contract_value ?: null,
            'internal_notes' => $this->internal_notes ?: null,
        ]);

        return redirect()->route('dashboard.legal.processes')
            ->with('toast_success', 'Processo criado com sucesso!');
    }

    public function render()
    {
        return view('livewire.dashboard.Legal.Processes.create')
            ->layout('layouts.admin', ['title' => 'Novo Processo']);
    }
}

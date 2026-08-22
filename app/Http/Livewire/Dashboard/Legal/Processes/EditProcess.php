<?php

namespace App\Http\Livewire\Dashboard\Legal\Processes;

use Livewire\Component;
use App\Models\Process;
use App\Models\User;
use App\Traits\HasAlerts;
use App\Traits\HasValidations;

class EditProcess extends Component
{
    use HasAlerts, HasValidations;

    public $processId;
    public $process = null;

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

    public function mount($id)
    {
        $this->processId = $id;
        $this->clients = User::role('client')->pluck('name', 'id')->toArray();
        $this->team = User::team()->pluck('name', 'id')->toArray();
        $this->loadProcess();
    }

    public function loadProcess()
    {
        $this->process = Process::findOrFail($this->processId);

        $this->client_id = $this->process->client_id;
        $this->responsible_id = $this->process->responsible_id;
        $this->process_number = $this->process->process_number;
        $this->court_name = $this->process->court_name;
        $this->court_variable = $this->process->court_variable;
        $this->case_type = $this->process->case_type;
        $this->case_area = $this->process->case_area;
        $this->opposing_party = $this->process->opposing_party;
        $this->opposing_lawyer = $this->process->opposing_lawyer;
        $this->description = $this->process->description;
        $this->status = $this->process->status;
        $this->client_interest = $this->process->client_interest;
        $this->contract_value = $this->process->contract_value;
        $this->internal_notes = $this->process->internal_notes;
    }

    public function update()
    {
        $this->validate([
            'client_id' => 'required|exists:users,id',
            'process_number' => 'required|string|max:255|unique:processes,process_number,' . $this->processId,
            'case_type' => 'required|string',
            'status' => 'required|string',
        ]);

        $this->process->update([
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

        $this->toastSuccess('Processo atualizado com sucesso!');
        $this->loadProcess();
    }

    public function render()
    {
        return view('livewire.dashboard.Legal.Processes.edit')
            ->layout('layouts.admin', ['title' => 'Editar Processo']);
    }
}

<?php

namespace App\Http\Livewire\Dashboard\Legal\Processes;

use Livewire\Component;
use App\Models\Process;
use App\Models\User;
use App\Services\DatajudService;
use App\Exceptions\DatajudException;
use App\Traits\HasAlerts;
use App\Traits\HasValidations;

class CreateProcess extends Component
{
    use HasAlerts, HasValidations;

    // Básicos
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

    // Números
    public $cnj_number = '';
    public $legacy_number = '';
    public $external_number = '';

    // Datajud (consulta)
    public $datajud_tribunal = '';
    public $tribunais = [];
    public $datajud_error = '';

    // Origem / Tribunal
    public $court_acronym = '';
    public $justice_segment = '';
    public $instance_level = '';
    public $state = '';
    public $judicial_district = '';
    public $judicial_district_code = '';
    public $forum = '';
    public $forum_code = '';
    public $court_division_code = '';
    public $judicial_unit = '';

    // Classificação
    public $case_class = '';
    public $case_class_code = '';
    public $main_subject = '';
    public $main_subject_code = '';
    public $action_type = '';
    public $nature = '';

    // Fase / Situação
    public $process_phase = '';
    public $court_status = '';
    public $situation = '';
    public $situation_reason = '';

    // Datas
    public $distribution_date = '';
    public $filing_date = '';
    public $start_date = '';
    public $summons_date = '';
    public $sentence_date = '';
    public $res_judicata_date = '';
    public $closure_date = '';
    public $archival_date = '';
    public $unarchival_date = '';
    public $last_movement_date = '';

    // Valores
    public $cause_value = '';
    public $updated_cause_value = '';
    public $conviction_value = '';
    public $executed_value = '';
    public $received_value = '';
    public $pending_value = '';
    public $currency = 'BRL';

    // Segredo / prioridades
    public $secret_of_justice = false;
    public $free_justice = false;
    public $priority = false;
    public $priority_type = '';
    public $elderly = false;
    public $disabled = false;
    public $serious_illness = false;

    // Liminar / tutela
    public $has_injunction = false;
    public $has_preliminary_injunction = false;
    public $has_urgency = false;
    public $injunction_notes = '';

    // Audiências
    public $has_hearing = false;
    public $next_hearing_at = '';
    public $next_hearing_type = '';
    public $next_hearing_location = '';
    public $hearing_notes = '';

    // Sentença / recurso
    public $has_sentence = false;
    public $sentence_result = '';
    public $has_appeal = false;
    public $appeal_type = '';
    public $appeal_result = '';

    // Controle interno
    public $internal_title = '';
    public $internal_code = '';
    public $folder = '';
    public $folder_number = '';
    public $notes = '';

    // Sincronização / Metadados
    public $source = 'manual';
    public $source_provider = '';
    public $source_id = '';
    public $last_synced_at = '';
    public $next_sync_at = '';
    public $sync_error = '';
    public $sync_attempts = 0;
    public $auto_sync = true;
    public $source_data = '';
    public $metadata = '';

    public $clients = [];
    public $team = [];

    public function mount()
    {
        $this->clients = User::role('client')->pluck('name', 'id')->toArray();
        $this->team = User::team()->pluck('name', 'id')->toArray();
        $this->tribunais = config('datajud.tribunais', []);
    }

    /**
     * Consulta o Datajud (CNJ) pelo número do processo e pré-preenche o formulário.
     */
    public function consultarDatajud()
    {
        $this->datajud_error = '';

        $this->validate([
            'datajud_tribunal' => 'required|string',
            'process_number'   => 'required|string',
        ], [], [
            'datajud_tribunal' => 'Tribunal (Datajud)',
            'process_number'   => 'Número do processo',
        ]);

        try {
            $svc    = new DatajudService();
            $source = $svc->findByNumero($this->datajud_tribunal, $this->process_number);

            if (!$source) {
                $this->datajud_error = 'Processo não encontrado no Datajud para o tribunal informado.';
                return;
            }

            $map = $svc->normalize($source);

            // Preenche as propriedades do formulário com os dados retornados
            foreach ($map as $field => $value) {
                if (property_exists($this, $field) && $value !== null) {
                    $this->$field = $value;
                }
            }

            // Marca a origem como Datajud/API
            $this->source          = 'api';
            $this->source_provider = 'datajud';
            $this->source_id       = $map['cnj_number'];
            $this->last_synced_at  = now()->format('Y-m-d H:i');

            // Guarda o JSON bruto da fonte para auditoria
            $this->source_data = json_encode($source, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

            $this->toastSuccess('Dados importados do Datajud. Revise e salve o processo.');
        } catch (DatajudException $e) {
            $this->datajud_error = $e->getMessage();
        }
    }

    public function store()
    {
        $rules = static::validationRules()['process'];

        $this->validate($rules, static::validationMessages(), static::validationAttributes());

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

            'cnj_number' => $this->cnj_number ?: null,
            'legacy_number' => $this->legacy_number ?: null,
            'external_number' => $this->external_number ?: null,
            'court_acronym' => $this->court_acronym ?: (trim($this->datajud_tribunal) ? strtoupper($this->datajud_tribunal) : null),
            'justice_segment' => $this->justice_segment ?: null,
            'instance_level' => $this->instance_level ?: null,
            'state' => $this->state ?: null,
            'judicial_district' => $this->judicial_district ?: null,
            'judicial_district_code' => $this->judicial_district_code ?: null,
            'forum' => $this->forum ?: null,
            'forum_code' => $this->forum_code ?: null,
            'court_division_code' => $this->court_division_code ?: null,
            'judicial_unit' => $this->judicial_unit ?: null,
            'case_class' => $this->case_class ?: null,
            'case_class_code' => $this->case_class_code ?: null,
            'main_subject' => $this->main_subject ?: null,
            'main_subject_code' => $this->main_subject_code ?: null,
            'action_type' => $this->action_type ?: null,
            'nature' => $this->nature ?: null,
            'process_phase' => $this->process_phase ?: null,
            'court_status' => $this->court_status ?: null,
            'situation' => $this->situation ?: null,
            'situation_reason' => $this->situation_reason ?: null,
            'distribution_date' => $this->distribution_date ?: null,
            'filing_date' => $this->filing_date ?: null,
            'start_date' => $this->start_date ?: null,
            'summons_date' => $this->summons_date ?: null,
            'sentence_date' => $this->sentence_date ?: null,
            'res_judicata_date' => $this->res_judicata_date ?: null,
            'closure_date' => $this->closure_date ?: null,
            'archival_date' => $this->archival_date ?: null,
            'unarchival_date' => $this->unarchival_date ?: null,
            'last_movement_date' => $this->last_movement_date ?: null,
            'cause_value' => $this->cause_value ?: null,
            'updated_cause_value' => $this->updated_cause_value ?: null,
            'conviction_value' => $this->conviction_value ?: null,
            'executed_value' => $this->executed_value ?: null,
            'received_value' => $this->received_value ?: null,
            'pending_value' => $this->pending_value ?: null,
            'currency' => $this->currency ?: 'BRL',
            'secret_of_justice' => $this->secret_of_justice,
            'free_justice' => $this->free_justice,
            'priority' => $this->priority,
            'priority_type' => $this->priority_type ?: null,
            'elderly' => $this->elderly,
            'disabled' => $this->disabled,
            'serious_illness' => $this->serious_illness,
            'has_injunction' => $this->has_injunction,
            'has_preliminary_injunction' => $this->has_preliminary_injunction,
            'has_urgency' => $this->has_urgency,
            'injunction_notes' => $this->injunction_notes ?: null,
            'has_hearing' => $this->has_hearing,
            'next_hearing_at' => $this->next_hearing_at ?: null,
            'next_hearing_type' => $this->next_hearing_type ?: null,
            'next_hearing_location' => $this->next_hearing_location ?: null,
            'hearing_notes' => $this->hearing_notes ?: null,
            'has_sentence' => $this->has_sentence,
            'sentence_result' => $this->sentence_result ?: null,
            'has_appeal' => $this->has_appeal,
            'appeal_type' => $this->appeal_type ?: null,
            'appeal_result' => $this->appeal_result ?: null,
            'internal_title' => $this->internal_title ?: null,
            'internal_code' => $this->internal_code ?: null,
            'folder' => $this->folder ?: null,
            'folder_number' => $this->folder_number ?: null,
            'notes' => $this->notes ?: null,

            'source' => $this->source ?: 'manual',
            'source_provider' => $this->source_provider ?: null,
            'source_id' => $this->source_id ?: null,
            'last_synced_at' => $this->last_synced_at ?: null,
            'next_sync_at' => $this->next_sync_at ?: null,
            'sync_error' => $this->sync_error ?: null,
            'sync_attempts' => $this->sync_attempts ?: 0,
            'auto_sync' => $this->auto_sync ? 1 : 0,
            'source_data' => $this->source_data ? json_decode($this->source_data, true) : null,
            'metadata' => $this->metadata ? json_decode($this->metadata, true) : null,
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

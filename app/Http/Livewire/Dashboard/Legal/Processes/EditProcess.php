<?php

namespace App\Http\Livewire\Dashboard\Legal\Processes;

use Livewire\Component;
use App\Models\Process;
use App\Models\User;
use App\Services\DatajudService;
use App\Services\DjenService;
use App\Exceptions\DatajudException;
use App\Exceptions\DjenException;
use App\Traits\HasAlerts;
use App\Traits\HasValidations;
use Illuminate\Support\Facades\Gate;

class EditProcess extends Component
{
    use HasAlerts, HasValidations;

    public $processId;
    public $process = null;

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
    public $source_data = '';
    public $metadata = '';
    public $auto_sync = true;

    public $clients = [];
    public $team = [];
    public $activeTab = 'geral';

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function mount($id)
    {
        $this->processId = $id;
        $this->clients = User::role('client')->pluck('name', 'id')->toArray();
        // Responsável: apenas admin e manager (sem clientes nem super-admin)
        $this->team = User::role(['admin', 'manager'])->pluck('name', 'id')->toArray();
        $this->tribunais = config('datajud.tribunais', []);
        $this->loadProcess();

        Gate::authorize('update', $this->process);
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

    /**
     * Sincroniza as publicações/intimações do DJEN para este processo (on-demand).
     */
    public function syncDjen()
    {
        try {
            $svc = new DjenService();
            $n = $svc->syncPublications($this->process);

            // Recarrega o modelo (incluindo a relação publications) para a view.
            $this->loadProcess();

            if ($n > 0) {
                $this->toastSuccess("{$n} publicação(ões) do DJEN sincronizada(s).");
            } else {
                $this->toastSuccess('Nenhuma publicação nova encontrada no DJEN.');
            }
        } catch (DjenException $e) {
            $this->toastError('Erro ao sincronizar DJEN: ' . $e->getMessage());
        }
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

        $this->cnj_number = $this->process->cnj_number;
        $this->legacy_number = $this->process->legacy_number;
        $this->external_number = $this->process->external_number;
        $this->court_acronym = $this->process->court_acronym;
        $this->datajud_tribunal = strtolower(trim((string) $this->process->court_acronym));
        $this->justice_segment = $this->process->justice_segment;
        $this->instance_level = $this->process->instance_level;
        $this->state = $this->process->state;
        $this->judicial_district = $this->process->judicial_district;
        $this->judicial_district_code = $this->process->judicial_district_code;
        $this->forum = $this->process->forum;
        $this->forum_code = $this->process->forum_code;
        $this->court_division_code = $this->process->court_division_code;
        $this->judicial_unit = $this->process->judicial_unit;
        $this->case_class = $this->process->case_class;
        $this->case_class_code = $this->process->case_class_code;
        $this->main_subject = $this->process->main_subject;
        $this->main_subject_code = $this->process->main_subject_code;
        $this->action_type = $this->process->action_type;
        $this->nature = $this->process->nature;
        $this->process_phase = $this->process->process_phase;
        $this->court_status = $this->process->court_status;
        $this->situation = $this->process->situation;
        $this->situation_reason = $this->process->situation_reason;
        $this->distribution_date = $this->process->distribution_date?->format('Y-m-d');
        $this->filing_date = $this->process->filing_date?->format('Y-m-d');
        $this->start_date = $this->process->start_date?->format('Y-m-d');
        $this->summons_date = $this->process->summons_date?->format('Y-m-d');
        $this->sentence_date = $this->process->sentence_date?->format('Y-m-d');
        $this->res_judicata_date = $this->process->res_judicata_date?->format('Y-m-d');
        $this->closure_date = $this->process->closure_date?->format('Y-m-d');
        $this->archival_date = $this->process->archival_date?->format('Y-m-d');
        $this->unarchival_date = $this->process->unarchival_date?->format('Y-m-d');
        $this->last_movement_date = $this->process->last_movement_date?->format('Y-m-d');
        $this->cause_value = $this->process->cause_value;
        $this->updated_cause_value = $this->process->updated_cause_value;
        $this->conviction_value = $this->process->conviction_value;
        $this->executed_value = $this->process->executed_value;
        $this->received_value = $this->process->received_value;
        $this->pending_value = $this->process->pending_value;
        $this->currency = $this->process->currency ?: 'BRL';
        $this->secret_of_justice = $this->process->secret_of_justice;
        $this->free_justice = $this->process->free_justice;
        $this->priority = $this->process->priority;
        $this->priority_type = $this->process->priority_type;
        $this->elderly = $this->process->elderly;
        $this->disabled = $this->process->disabled;
        $this->serious_illness = $this->process->serious_illness;
        $this->has_injunction = $this->process->has_injunction;
        $this->has_preliminary_injunction = $this->process->has_preliminary_injunction;
        $this->has_urgency = $this->process->has_urgency;
        $this->injunction_notes = $this->process->injunction_notes;
        $this->has_hearing = $this->process->has_hearing;
        $this->next_hearing_at = $this->process->next_hearing_at?->format('Y-m-d H:i');
        $this->next_hearing_type = $this->process->next_hearing_type;
        $this->next_hearing_location = $this->process->next_hearing_location;
        $this->hearing_notes = $this->process->hearing_notes;
        $this->has_sentence = $this->process->has_sentence;
        $this->sentence_result = $this->process->sentence_result;
        $this->has_appeal = $this->process->has_appeal;
        $this->appeal_type = $this->process->appeal_type;
        $this->appeal_result = $this->process->appeal_result;
        $this->internal_title = $this->process->internal_title;
        $this->internal_code = $this->process->internal_code;
        $this->folder = $this->process->folder;
        $this->folder_number = $this->process->folder_number;
        $this->notes = $this->process->notes;

        $this->source = $this->process->source ?: 'manual';
        $this->source_provider = $this->process->source_provider;
        $this->source_id = $this->process->source_id;
        $this->last_synced_at = $this->process->last_synced_at?->format('Y-m-d H:i');
        $this->next_sync_at = $this->process->next_sync_at?->format('Y-m-d H:i');
        $this->sync_error = $this->process->sync_error;
        $this->sync_attempts = $this->process->sync_attempts ?: 0;
        $this->source_data = $this->process->source_data ? json_encode($this->process->source_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : '';
        $this->metadata = $this->process->metadata ? json_encode($this->process->metadata, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) : '';
        $this->auto_sync = $this->process->auto_sync ?: true;
    }

    public function update()
    {
        $rules = static::validationRules()['process'];
        $rules['process_number'] = 'required|string|max:255|unique:processes,process_number,' . $this->processId;
        $rules['cnj_number'] = 'nullable|string|max:30|unique:processes,cnj_number,' . $this->processId;
        $rules['internal_code'] = 'nullable|string|max:100|unique:processes,internal_code,' . $this->processId;

        $this->validate($rules, static::validationMessages(), static::validationAttributes());

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

        $this->toastSuccess('Processo atualizado com sucesso!');
        $this->loadProcess();
    }

    public function render()
    {
        return view('livewire.dashboard.Legal.Processes.edit')
            ->layout('layouts.admin', ['title' => 'Editar Processo']);
    }
}

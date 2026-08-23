<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Process extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'responsible_id',
        'process_number',
        'court_name',
        'court_variable',
        'case_type',
        'case_area',
        'opposing_party',
        'opposing_lawyer',
        'description',
        'status',
        'client_interest',
        'contract_value',
        'internal_notes',

        // Detalhes do sistema externo (inglês)
        'cnj_number',
        'legacy_number',
        'external_number',
        'court_acronym',
        'justice_segment',
        'instance_level',
        'state',
        'judicial_district',
        'judicial_district_code',
        'forum',
        'forum_code',
        'court_division_code',
        'judicial_unit',
        'case_class',
        'case_class_code',
        'main_subject',
        'main_subject_code',
        'action_type',
        'nature',
        'process_phase',
        'court_status',
        'situation',
        'situation_reason',
        'distribution_date',
        'filing_date',
        'start_date',
        'summons_date',
        'sentence_date',
        'res_judicata_date',
        'closure_date',
        'archival_date',
        'unarchival_date',
        'last_movement_date',
        'cause_value',
        'updated_cause_value',
        'conviction_value',
        'executed_value',
        'received_value',
        'pending_value',
        'currency',
        'secret_of_justice',
        'free_justice',
        'priority',
        'priority_type',
        'elderly',
        'disabled',
        'serious_illness',
        'has_injunction',
        'has_preliminary_injunction',
        'has_urgency',
        'injunction_notes',
        'has_hearing',
        'next_hearing_at',
        'next_hearing_type',
        'next_hearing_location',
        'hearing_notes',
        'has_sentence',
        'sentence_result',
        'has_appeal',
        'appeal_type',
        'appeal_result',
        'internal_title',
        'internal_code',
        'folder',
        'folder_number',
        'notes',

        // Controle de sincronização
        'source',
        'source_provider',
        'source_id',
        'last_synced_at',
        'next_sync_at',
        'sync_error',
        'sync_attempts',
        'source_data',
        'metadata',
    ];

    protected $casts = [
        'client_interest' => 'decimal:2',
        'cause_value' => 'decimal:2',
        'updated_cause_value' => 'decimal:2',
        'conviction_value' => 'decimal:2',
        'executed_value' => 'decimal:2',
        'received_value' => 'decimal:2',
        'pending_value' => 'decimal:2',
        'distribution_date' => 'date',
        'filing_date' => 'date',
        'start_date' => 'date',
        'summons_date' => 'date',
        'sentence_date' => 'date',
        'res_judicata_date' => 'date',
        'closure_date' => 'date',
        'archival_date' => 'date',
        'unarchival_date' => 'date',
        'last_movement_date' => 'date',
        'next_hearing_at' => 'datetime',
        'secret_of_justice' => 'boolean',
        'free_justice' => 'boolean',
        'priority' => 'boolean',
        'elderly' => 'boolean',
        'disabled' => 'boolean',
        'serious_illness' => 'boolean',
        'has_injunction' => 'boolean',
        'has_preliminary_injunction' => 'boolean',
        'has_urgency' => 'boolean',
        'has_hearing' => 'boolean',
        'has_sentence' => 'boolean',
        'has_appeal' => 'boolean',
        'last_synced_at' => 'datetime',
        'next_sync_at' => 'datetime',
        'sync_attempts' => 'integer',
        'source_data' => 'array',
        'metadata' => 'array',
    ];

    // Relationships
    public function client()
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function responsible()
    {
        return $this->belongsTo(User::class, 'responsible_id');
    }

    public function deadlines()
    {
        return $this->hasMany(Deadline::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeByType($query, $type)
    {
        return $query->where('case_type', $type);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('process_number', 'like', "%{$search}%")
              ->orWhere('court_name', 'like', "%{$search}%")
              ->orWhere('opposing_party', 'like', "%{$search}%")
              ->orWhereHas('client', function ($cq) use ($search) {
                  $cq->where('name', 'like', "%{$search}%");
              });
        });
    }

    // Accessors
    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'active' => 'Ativo',
            'suspended' => 'Suspenso',
            'archived' => 'Arquivado',
            'closed' => 'Encerrado',
            default => $this->status,
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match($this->status) {
            'active' => 'green',
            'suspended' => 'yellow',
            'archived' => 'gray',
            'closed' => 'red',
            default => 'gray',
        };
    }

    public function getCaseTypeLabelAttribute(): string
    {
        return match($this->case_type) {
            'civil' => 'Cível',
            'criminal' => 'Criminal',
            'family' => 'Família',
            'labor' => 'Trabalhista',
            'administrative' => 'Administrativo',
            'tax' => 'Tributário',
            'consumer' => 'Consumidor',
            'other' => 'Outro',
            default => $this->case_type,
        };
    }
}

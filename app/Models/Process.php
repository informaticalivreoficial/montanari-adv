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
    ];

    protected $casts = [
        'client_interest' => 'decimal:2',
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

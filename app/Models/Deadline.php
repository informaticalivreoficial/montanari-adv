<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deadline extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'process_id',
        'responsible_id',
        'title',
        'description',
        'due_date',
        'reminder_at',
        'priority',
        'status',
        'notes',
    ];

    protected $casts = [
        'due_date' => 'datetime',
        'reminder_at' => 'datetime',
    ];

    // Relationships
    public function process()
    {
        return $this->belongsTo(Process::class);
    }

    public function responsible()
    {
        return $this->belongsTo(User::class, 'responsible_id');
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('due_date', '>=', now())->where('status', 'pending');
    }

    public function scopeOverdue($query)
    {
        return $query->where('due_date', '<', now())->where('status', 'pending');
    }

    // Accessors
    public function getPriorityLabelAttribute(): string
    {
        return match($this->priority) {
            'low' => 'Baixa',
            'normal' => 'Normal',
            'high' => 'Alta',
            'urgent' => 'Urgente',
            default => $this->priority,
        };
    }

    public function getPriorityColorAttribute(): string
    {
        return match($this->priority) {
            'low' => 'gray',
            'normal' => 'blue',
            'high' => 'orange',
            'urgent' => 'red',
            default => 'gray',
        };
    }

    public function getStatusLabelAttribute(): string
    {
        return match($this->status) {
            'pending' => 'Pendente',
            'completed' => 'Concluído',
            'expired' => 'Expirado',
            default => $this->status,
        };
    }

    public function getIsOverdueAttribute(): bool
    {
        return $this->due_date < now() && $this->status === 'pending';
    }
}

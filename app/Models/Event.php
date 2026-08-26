<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'task_id',
        'deadline_id',
        'process_id',
        'user_id',
        'title',
        'description',
        'start_date',
        'end_date',
        'all_day',
        'event_type',
        'color',
        'location',
        'notes',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'all_day' => 'boolean',
    ];

    // Relationships
    public function process()
    {
        return $this->belongsTo(Process::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function deadline()
    {
        return $this->belongsTo(Deadline::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Scopes
    public function scopeUpcoming($query)
    {
        return $query->where('start_date', '>=', now());
    }

    public function scopeByType($query, $type)
    {
        return $query->where('event_type', $type);
    }

    // Accessors
    public function getEventTypeLabelAttribute(): string
    {
        return match($this->event_type) {
            'hearing' => 'Audiência',
            'meeting' => 'Reunião',
            'deadline' => 'Prazo',
            'task' => 'Tarefa',
            'other' => 'Outro',
            default => $this->event_type,
        };
    }

    public function getEventTypeColorAttribute(): string
    {
        return match($this->event_type) {
            'hearing' => '#dc2626',
            'meeting' => '#2563eb',
            'deadline' => '#f59e0b',
            'task' => '#10b981',
            'other' => '#6b7280',
            default => '#6b7280',
        };
    }

    /**
     * Convert to FullCalendar event format
     */
    public function toFullCalendarArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'start' => $this->start_date->toIso8601String(),
            'end' => $this->end_date?->toIso8601String(),
            'allDay' => $this->all_day,
            'color' => $this->color ?? $this->event_type_color,
            'extendedProps' => [
                'description' => $this->description,
                'event_type' => $this->event_type,
                'location' => $this->location,
                'process_id' => $this->process_id,
            ],
        ];
    }
}

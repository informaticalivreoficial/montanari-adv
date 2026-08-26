<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProcessMovement extends Model
{
    use HasFactory;

    protected $fillable = [
        'process_id',
        'data_hora',
        'codigo',
        'nome',
        'complementos',
        'orgao_julgador',
    ];

    protected $casts = [
        'data_hora'   => 'datetime',
        'complementos' => 'array',
    ];

    public function process(): BelongsTo
    {
        return $this->belongsTo(Process::class);
    }
}

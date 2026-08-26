<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProcessParty extends Model
{
    use HasFactory;

    protected $fillable = [
        'process_id',
        'tipo',
        'nome',
        'documento',
        'categoria',
    ];

    public function process(): BelongsTo
    {
        return $this->belongsTo(Process::class);
    }
}

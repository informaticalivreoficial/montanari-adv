<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProcessPublication extends Model
{
    use HasFactory;

    protected $fillable = [
        'process_id',
        'djen_id',
        'numero_processo',
        'sigla_tribunal',
        'tipo',
        'documento_tipo',
        'texto',
        'texto_html',
        'data_disponibilizacao',
        'data_publicacao',
        'orgao_julgador',
        'classe',
        'assuntos',
        'cancelado',
        'motivo_cancelamento',
        'certidao_url',
        'source_data',
    ];

    protected $casts = [
        'data_disponibilizacao' => 'date',
        'data_publicacao' => 'date',
        'cancelado' => 'boolean',
        'source_data' => 'array',
    ];

    public function process()
    {
        return $this->belongsTo(Process::class);
    }
}

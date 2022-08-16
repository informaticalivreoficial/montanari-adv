<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cidades extends Model
{
    protected $fillable = [
        'estado_id',
        'cidade_nome',
        'cidade_uf'
    ];
    
    public $timestamps = false;

    public function estado()
    {
        return $this->belongsTo('App\Models\Estados');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    protected $fillable = [
        'estado_nome',
        'estado_uf',
        'estado_regiao'
    ];    
    
    public $timestamps = false;
    
    public function municipios()
    {
      return $this->hasMany('App\Models\Cidades');
    }
}

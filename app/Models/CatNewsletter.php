<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatNewsletter extends Model
{
    protected $fillable = [
        'titulo',
        'content',
        'status',
        'servidor_smtp',
        'servidor_porta',
        'servidor_senha',
        'servidor_email',
        'sistema'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PostGb extends Model
{
    use HasFactory;

    protected $table = 'posts_gb';

    protected $fillable = [
        'post',
        'path',
        'cover',
        'order',
        'thumb_caption',
    ];

    /**
     * Accerssors and Mutators
     */

    public function getUrlCroppedAttribute()
    {
        return Storage::url($this->path);
    }

    public function getUrlImageAttribute()
    {
        return Storage::url($this->path);
    }
}

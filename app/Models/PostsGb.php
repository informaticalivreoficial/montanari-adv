<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Support\Cropper;

class PostsGb extends Model
{
    protected $table = 'posts_gb'; 

    protected $fillable = [
        'post',
        'path',
        'cover'
    ];

    /**
     * Accerssors and Mutators
     */

    public function getUrlCroppedAttribute()
    {
        return Storage::url(Cropper::thumb($this->path, 1366, 768));
    }

    public function getUrlImageAttribute()
    {
        return Storage::url($this->path);
    }
}
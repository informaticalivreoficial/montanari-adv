<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Slide extends Model
{
    use HasFactory;

    protected $table = 'slides';

    protected $fillable = [
        'title',
        'image',
        'content',
        'link',
        'target',
        'slug',
        'category',
        'expired_at',
        'status',
        'view_title',
    ];

    protected $casts = [
        'target' => 'boolean',
        'status' => 'boolean',
        'view_title' => 'boolean',
        'expired_at' => 'date',
    ];

    /**
     * Scopes
     */
    public function scopeAvailable($query)
    {
        return $query->where('status', 1);
    }

    public function scopeUnavailable($query)
    {
        return $query->where('status', 0);
    }

    /**
     * Accessors & Mutators
     */
    public function getImageAttribute()
    {
        if (empty($this->attributes['image'])) {
            return url(asset('backend/assets/images/image.jpg'));
        }
        return \App\Services\Asset::url($this->attributes['image']);
    }

    public function getUrlImageAttribute()
    {
        if (!empty($this->attributes['image'])) {
            return \App\Services\Asset::url($this->attributes['image']);
        }
        return '';
    }

    public function setExpiredAtAttribute($value)
    {
        $this->attributes['expired_at'] = (!empty($value) ? $this->convertStringToDate($value) : null);
    }

    public function getExpiredAtAttribute($value)
    {
        if (empty($value)) {
            return null;
        }
        return date('d/m/Y', strtotime($value));
    }

    public function setTargetAttribute($value)
    {
        $this->attributes['target'] = ($value == '1' || $value === true ? 1 : 0);
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = ($value == '1' || $value === true ? 1 : 0);
    }

    public function setViewTitleAttribute($value)
    {
        $this->attributes['view_title'] = ($value == '1' || $value === true ? 1 : 0);
    }

    public function getCreatedAtAttribute($value)
    {
        if (empty($value)) {
            return null;
        }
        return date('d/m/Y', strtotime($value));
    }

    public function setSlug()
    {
        if (!empty($this->title)) {
            $slide = Slide::where('title', $this->title)->first();
            if (!empty($slide) && $slide->id != $this->id) {
                $this->attributes['slug'] = Str::slug($this->title) . '-' . $this->id;
            } else {
                $this->attributes['slug'] = Str::slug($this->title);
            }
            $this->save();
        }
    }

    private function convertStringToDate(?string $param)
    {
        if (empty($param)) {
            return null;
        }
        list($day, $month, $year) = explode('/', $param);
        return (new \DateTime($year . '-' . $month . '-' . $day))->format('Y-m-d');
    }
}

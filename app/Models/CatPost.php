<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CatPost extends Model
{
    use HasFactory;

    protected $table = 'cat_post';

    // $fillable usa nomes REAIS do banco (português)
    protected $fillable = [
        'id_pai',
        'titulo',
        'content',
        'slug',
        'tags',
        'views',
        'tipo',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected static function booted()
    {
        static::saving(function ($catpost) {
            $catpost->setSlug();
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /*
    |--------------------------------------------------------------------------
    | Relacionamentos
    |--------------------------------------------------------------------------
    */
    public function parent()
    {
        return $this->belongsTo(CatPost::class, 'id_pai');
    }

    public function children()
    {
        return $this->hasMany(CatPost::class, 'id_pai', 'id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'categoria');
    }

    public function countposts()
    {
        return $this->hasMany(Post::class, 'categoria')->count();
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors (inglês para compatibilidade com admin/Livewire)
    |--------------------------------------------------------------------------
    */
    public function getTitleAttribute(): string
    {
        return $this->attributes['titulo'] ?? '';
    }

    public function getTypeAttribute(): string
    {
        return $this->attributes['tipo'] ?? '';
    }

    /*
    |--------------------------------------------------------------------------
    | Mutator: mapeia nomes em inglês para colunas reais do banco (português)
    |--------------------------------------------------------------------------
    */
    public function setAttribute($key, $value)
    {
        $map = [
            'title' => 'titulo',
            'type'  => 'tipo',
        ];

        if (isset($map[$key])) {
            $key = $map[$key];
        }

        parent::setAttribute($key, $value);
    }

    /*
    |--------------------------------------------------------------------------
    | Slug
    |--------------------------------------------------------------------------
    */
    public function setSlug()
    {
        if (!empty($this->titulo)) {
            $baseSlug = Str::slug($this->titulo);
            $slug = $baseSlug;
            $count = 1;

            while (
                CatPost::where('slug', $slug)
                    ->where('id', '!=', $this->id)
                    ->exists()
            ) {
                $slug = $baseSlug . '-' . str_pad($count, 2, '0', STR_PAD_LEFT);
                $count++;
            }

            $this->attributes['slug'] = $slug;
        }
    }
}

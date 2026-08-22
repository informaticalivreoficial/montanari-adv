<?php

namespace App\Models;

use App\Support\Cropper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    // $fillable usa nomes REAIS do banco (português)
    protected $fillable = [
        'autor',
        'tipo',
        'titulo',
        'content',
        'slug',
        'tags',
        'views',
        'readingTime',
        'metaDescription',
        'excerpt',
        'categoria',
        'comments',
        'highlight',
        'cat_pai',
        'status',
        'menu',
        'thumb_caption',
        'publish_at',
    ];

    protected $casts = [
        'status' => 'boolean',
        'comments' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
    }

    protected static function booted()
    {
        static::saving(function ($post) {
            $post->setSlug();
        });

        static::deleting(function ($post) {
            Storage::disk('public')->deleteDirectory("posts/{$post->id}");
            $post->images()->delete();
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */
    public function scopePostson($query)
    {
        return $query->where('status', 1);
    }

    public function scopePostsoff($query)
    {
        return $query->where('status', 0);
    }

    /*
    |--------------------------------------------------------------------------
    | Relacionamentos
    |--------------------------------------------------------------------------
    */
    public function user()
    {
        return $this->belongsTo(User::class, 'autor', 'id');
    }

    public function category()
    {
        return $this->hasOne(CatPost::class, 'id', 'categoria');
    }

    public function categoriaObject()
    {
        return $this->hasOne(CatPost::class, 'id', 'categoria');
    }

    public function categoryObject()
    {
        return $this->hasOne(CatPost::class, 'id', 'categoria');
    }

    public function userObject()
    {
        return $this->hasOne(User::class, 'id', 'autor');
    }

    public function countposts()
    {
        return $this->hasMany(Post::class, 'categoria')->count();
    }

    public function images()
    {
        return $this->hasMany(PostGb::class, 'post', 'id')->orderBy('cover', 'ASC');
    }

    public function countimages()
    {
        return $this->hasMany(PostGb::class, 'post', 'id')->count();
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

    public function getCategoryAttribute()
    {
        return $this->attributes['categoria'] ?? null;
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors de conteúdo
    |--------------------------------------------------------------------------
    */
    public function getContentWebAttribute()
    {
        return Str::words($this->content, '20', ' ...');
    }

    public function getContentWebSiteAttribute()
    {
        return Str::words($this->content, '40', ' ...');
    }

    /*
    |--------------------------------------------------------------------------
    | Capa
    |--------------------------------------------------------------------------
    */
    public function cover()
    {
        $images = $this->images();
        $cover = $images->where('cover', 1)->first(['path']) ??
                $images->first(['path']);

        if (!$cover || empty($cover->path)) {
            return asset('theme/images/image.jpg');
        }

        return Storage::url(Cropper::thumb($cover['path'], 720, 480));
    }

    public function nocover()
    {
        $images = $this->images();
        $cover = $images->where('cover', 1)->first(['path'])
            ?? $images->first(['path']);

        if (empty($cover['path']) || !Storage::disk()->exists($cover['path'])) {
            return asset('theme/images/image.jpg');
        }

        return Storage::url($cover['path']);
    }

    /*
    |--------------------------------------------------------------------------
    | Mutator: mapeia nomes em inglês para colunas reais do banco (português)
    |--------------------------------------------------------------------------
    */
    public function setAttribute($key, $value)
    {
        $map = [
            'title'    => 'titulo',
            'type'     => 'tipo',
            'category' => 'categoria',
        ];

        if (isset($map[$key])) {
            $key = $map[$key];
        }

        parent::setAttribute($key, $value);
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = ($value == '1' ? 1 : 0);
    }

    public function setPublishAtAttribute($value)
    {
        $this->attributes['publish_at'] = (!empty($value) ? $this->convertStringToDate($value) : null);
    }

    public function setSlug()
    {
        if (!empty($this->titulo)) {
            $baseSlug = Str::slug($this->titulo);
            $slug = $baseSlug;
            $count = 1;

            while (
                Post::where('slug', $slug)
                    ->where('id', '!=', $this->id)
                    ->exists()
            ) {
                $slug = $baseSlug . '-' . str_pad($count, 2, '0', STR_PAD_LEFT);
                $count++;
            }

            $this->attributes['slug'] = $slug;
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

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

    // $fillable usa nomes em inglês (padrão do banco)
    protected $fillable = [
        'autor',
        'type',
        'title',
        'content',
        'slug',
        'tags',
        'views',
        'readingTime',
        'metaDescription',
        'excerpt',
        'category',
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
        'publish_at' => 'datetime',
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
        return $this->hasOne(CatPost::class, 'id', 'category');
    }

    public function categoriaObject()
    {
        return $this->hasOne(CatPost::class, 'id', 'category');
    }

    public function categoryObject()
    {
        return $this->hasOne(CatPost::class, 'id', 'category');
    }

    public function userObject()
    {
        return $this->hasOne(User::class, 'id', 'autor');
    }

    public function countposts()
    {
        return $this->hasMany(Post::class, 'category')->count();
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
        $cover = $this->images()->where('cover', 1)->first(['path']) ??
                 $this->images()->latest('id')->first(['path']);

        if (!$cover || empty($cover->path)) {
            return asset('theme/images/image.jpg');
        }

        return Storage::url(Cropper::thumb($cover['path'], 720, 480));
    }

    public function nocover()
    {
        $cover = $this->images()->where('cover', 1)->first(['path'])
            ?? $this->images()->latest('id')->first(['path']);

        if (empty($cover['path']) || !Storage::disk('public')->exists($cover['path'])) {
            return asset('theme/images/image.jpg');
        }

        return Storage::url($cover['path']);
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = ($value == '1' ? 1 : 0);
    }

    public function setPublishAtAttribute($value)
    {
        if (empty($value)) {
            $this->attributes['publish_at'] = null;
            return;
        }

        if ($value instanceof \DateTimeInterface) {
            $this->attributes['publish_at'] = $value->format('Y-m-d');
            return;
        }

        if (is_string($value) && str_contains($value, '/')) {
            [$day, $month, $year] = explode('/', $value);
            $this->attributes['publish_at'] = (new \DateTime("{$year}-{$month}-{$day}"))->format('Y-m-d');
            return;
        }

        $this->attributes['publish_at'] = $value;
    }

    public function setSlug()
    {
        if (!empty($this->title)) {
            $baseSlug = Str::slug($this->title);
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Post;

class CatPost extends Model
{
    protected $table = 'cat_posts';

    protected $fillable = [
        'titulo',
        'content',
        'slug',
        'tags',
        'tipo',
        'status',
        'id_pai'
    ];

    /**
     * A Category has many child categories
     *
     * @return void
     */
    public function children()
    {
        return $this->hasMany(CatPost::class, 'id_pai', 'id');
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = ($value == '1' ? 1 : 0);
    }

    public function countposts()
    {
        return $this->hasMany(Post::class, 'categoria', 'id')->count();
    }

    public function setSlug()
    {
        if(!empty($this->titulo)){
            $categoria = CatPost::where('titulo', $this->titulo)->first(); 
            if(!empty($categoria) && $categoria->id != $this->id){
                $this->attributes['slug'] = Str::slug($this->titulo) . '-' . $this->id;
            }else{
                $this->attributes['slug'] = Str::slug($this->titulo);
            }            
            $this->save();
        }
    }
}

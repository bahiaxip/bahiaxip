<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable=[
        "user_id","category_id","title","slug","body_main", "body_plus","status","file"
    ];
    
    protected $hidden=[
        "post_id","user_id"
    ];
    
    public function tags()
    {
        //el model Post debería ser singular como recomienda laravel, en este caso
        //debemos indicar el nombre de la tabla y el campo ya que al no indicarlo
        //laravel busca la tabla posts_tag (en plural) y busca posts_id (tb en plural)
        //y marca error
        
        return $this->belongsToMany(Tag::class,"post_tag","post_id");
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    
    public function ima_post()
    {
        return $this->hasMany(ImaPost::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function scopeSearch($query,$search)
    {
        //dd($search);
        if(trim($search) != "")
        {
            $query->where("title","LIKE","%$search%");
        }
    }
}

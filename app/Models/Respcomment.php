<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respcomment extends Model
{
    use HasFactory;

    protected $table="respcomments";
    protected $fillable=[
        "body","user_id","post_id","status","fecha","hora","comment_id"
    ];
    
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function post()
    {
        return $this->belongsTo(Posts::class);
    }
}

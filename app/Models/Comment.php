<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=[
        "body", "user_id","post_id","fecha","hora","status","answer","comment_id"
    ];
    
    protected $hidden=[
      
    ];
    
    public function post()
    {
        return $this->belongsTo(Posts::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function respComments()
    {
        return $this->hasMany(RespComment::class)
                ->where("status","PUBLISHED ");
    }
}

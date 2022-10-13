<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    protected $table="images";
    
    protected $fillable=[
        "title","detail","width","height","path","user_id"
    ];
    
    protected $hidden = [
        "user_id"
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class,"id");
    }
}

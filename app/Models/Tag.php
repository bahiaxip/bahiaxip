<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable=[
        "name","slug",'status','statusint','user_id'
    ];
    
    public function posts()
    {
        return $this->belongsToMany(Posts::class);
    }
}

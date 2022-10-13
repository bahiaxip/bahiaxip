<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ima_post extends Model
{
    use HasFactory;

    protected $table = "ima_posts";
    
    protected $fillable = [
      "title", "detail", "width", "height" , "path", "post_id" 
    ];
}

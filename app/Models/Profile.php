<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable=[
        "surnames","province","country","sex","birth_date","newsletter","file","user_id"
    ];
    
    //necesario convertir a Carbon para hacer uso de format en el controlador
    protected $dates=["birth_date"];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function roleuser()
    {
        return $this->belongsTo(RoleUser::class);
    }
}

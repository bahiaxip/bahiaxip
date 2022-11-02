<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\MyResetPassword;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'code'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function images()
    {
        return $this->hasMany(Images::class);
    }
    
    public function posts()
    {
        return $this->hasMany(Posts::class);
    }
    
    public function roleuser()
    {
        return $this->hasOne(RoleUser::class);
    }
    
    public function scopeSearch($query,$search)
    {
        if(trim($search) != "")
        {
            //método sencillo solo una palabra
            //$query->where("name",$search);
            //método concatenar 2 campos
            //$query->where(\DB::raw("CONCAT(first_name,' ', last_name"),$search);
            //método concatenar 2 campos y buscar parte de palabra
            //$query->where(\DB::raw("CONCAT(first_name,' ', last_name)"),"LIKE","%$search%");
            $query->where("name", "LIKE", "%$search%");
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MyResetPassword($token));
    }
}

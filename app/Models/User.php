<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
    use HasFactory,Notifiable;

    protected $attributes=[
        'role'=>'guest',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
    ];


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



    public function user_details(){
    return $this->hasOne(User_details::class);
}

public function posts(){
    return $this->hasMany(Posts::class);
    }

    public function replies(){
        return $this->hasMany(Replies::class);
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return[];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    

    protected $fillable = [
        'user_id',
        'title',
        'description',
    ];
    public function user(){
        return $this->hasOne(User::class);
    }

    public function replies(){
        return $this->hasMany(Replies::class);
    }
}

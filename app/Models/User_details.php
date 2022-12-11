<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_details extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company',
        'address',
        'city',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

}

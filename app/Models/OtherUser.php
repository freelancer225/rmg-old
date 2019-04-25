<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherUser extends Model
{
    protected $fillable = [
        'name', 'email', 'password','role'
    ];
}

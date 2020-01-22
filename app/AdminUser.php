<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    protected $table = "admins";
    protected $fillable = [
        'name',
        'family',
        'username',
        'password'
    ];
}

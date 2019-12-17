<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanUser extends Model
{
    protected $table = 'plan_user';

    protected $fillable = [
        'plan_id',
        'user_id',
        'expireTime',
        'expire'
    ];

    public function plan(){
        return $this->hasMany('App\Plan');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}

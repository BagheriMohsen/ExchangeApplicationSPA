<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanUserExpire extends Model
{
    protected $table = 'plan_user_expire';
    public $timestamps = false;
    protected $fillable = [
        'type',
        'plan_id',
        'user_id',
        'expireTime',
    ];

    public function plan(){
        return $this->belongsTo('App\Plan','plan_id','id');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}

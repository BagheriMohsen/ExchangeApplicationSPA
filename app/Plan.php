<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'type',
        'title',
        'price',
        'expireTime',
        'desc'
    ];

    public function users(){
        return $this->hasMany('App\PlanUser','plan_id','id');
    }
}

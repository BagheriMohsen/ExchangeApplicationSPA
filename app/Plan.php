<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'type',
        'title',
        'image',
        'price',
        'expire_day',
        'desc'
    ];

    public function users(){
        return $this->hasMany('App\PlanUser','plan_id','id');
    }
}

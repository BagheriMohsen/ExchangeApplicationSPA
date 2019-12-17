<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'type',
        'title',
        'price',
        'expireDay',
        'desc'
    ];

    public function users(){
        return $this->hasMany('App\PlanUser');
    }
}

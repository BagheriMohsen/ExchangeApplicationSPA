<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanUser extends Model
{
    protected $table = 'plan_user';
    public $timestamps = false;
    protected $fillable = [
        'type',
        'plan_id',
        'user_id',
        'track_id',
        'id_pay_unique_id',
        'card_number',
        'hashed_card',
        
        'expireTime',
    ];

    public function plan(){
        return $this->belongsTo('App\Plan','plan_id','id');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CurrnecyType extends Model
{
    protected $table = 'currency_types';

    protected $fillable =[
        'name'
    ];
    /*
    |--------------------------------------------------------------------------
    | Releate with Currency Model
    |--------------------------------------------------------------------------
    */
    public function currency(){
        return $this->hasMany('App\Currency','type_id','id');
    }
}
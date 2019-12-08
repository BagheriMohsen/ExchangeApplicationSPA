<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Currency extends Model
{
    protected $table = 'currency';
    protected $fillable = [
        'name',
        'currency_type_id'
    ];
    /*
    |--------------------------------------------------------------------------
    | Releate with CurrnecyType Model
    |--------------------------------------------------------------------------
    */
    public function type(){
        return $this->belongsTo('App\CurrnecyType','type_id','id');
    }
}
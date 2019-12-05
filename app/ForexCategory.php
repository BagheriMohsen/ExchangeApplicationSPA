<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ForexCategory extends Model
{
    protected $table = 'forexCategories';
    protected $fillable = [
        'name'
    ];
    /*
    |--------------------------------------------------------------------------
    | Releate with Forex
    |--------------------------------------------------------------------------
    */
    public function forexes(){
        return $this->hasMany('App\Forex','forex_category_id','id');
    }
}
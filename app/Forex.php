<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Forex extends Model
{
    protected $table = 'forex';
    protected $fillable = [
        'forex_category_id',
        'pair',
        'startingPrice',
        'tp',
        'sl',
        'buy&sell',
        'expire',
        'close',
        'desc'
    ];
     /*
    |--------------------------------------------------------------------------
    | Releate with Forex Category
    |--------------------------------------------------------------------------
    */
    public function forexCategory(){
        return $this->belongsTo('App\ForexCategory','forex_category_id','id');
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    protected $table = 'binary_option';
    protected $fillable = [
        'pair',
        'buy_sell',
        'time_expire',
        'endTime',
        'close'
    ];

}
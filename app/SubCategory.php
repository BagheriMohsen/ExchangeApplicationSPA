<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SubCategory extends Model
{
    protected $table = 'subCategories';
    protected $fillable = [
        'name',
        'category_id'
    ];

}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SubCategory extends Model
{
    protected $table = 'subCategories';
    protected $fillable = [
        'name',
        'ar_name',
        'en_name',
        'category_id'
    ];
    /*
    |--------------------------------------------------------------------------
    | Releate with SubCategory Model
    |--------------------------------------------------------------------------
    */
    public function articles(){
        return $this->hasMany('App\Article','subCategory_id','id');
    }
    /*
    |--------------------------------------------------------------------------
    | Releate with SubCategory Model
    |--------------------------------------------------------------------------
    */
    public function category(){
        return $this->belongsTo('App\ArticleCategory','category_id','id');
    }
}
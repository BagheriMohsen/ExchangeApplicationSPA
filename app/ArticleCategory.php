<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ArticleCategory extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name',
    ];
    /*
    |--------------------------------------------------------------------------
    | Releate with SubCategory Model
    |--------------------------------------------------------------------------
    */
    public function SubCategories(){
        return $this->hasMany('App\SubCategory','category_id','id');
    }

}
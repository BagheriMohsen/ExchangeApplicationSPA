<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = [
        'title',
        'subCategory_id',
        'body'
    ];
    /*
    |--------------------------------------------------------------------------
    | Releate with SubCategory Model
    |--------------------------------------------------------------------------
    */
    public function SubCategory(){
        return $this->belongsTo('App\SubCategory','subCategory_id','id');
    }


}
<?php

namespace App\Http\Controllers;


class ArticleAndCategoryController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Store Articles
    |--------------------------------------------------------------------------
    */
    public function ArticleStore(Request $request){
        'App\Article'::create([
            'title'             =>  $request->title,
            'subCategory_id'    =>  $request->sub_category,
            'body'              =>  $request->body
        ]);

        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json('مقاله با موفقیت ذخیره شد',200, array($header),JSON_UNESCAPED_UNICODE); 

    }
    /*
    |--------------------------------------------------------------------------
    | Edit Articles
    |--------------------------------------------------------------------------
    */
    public function ArticleEdit($id){
        $artilce = 'App\Article'::findOrFail($id);

        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($artilce,200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | Update Articles
    |--------------------------------------------------------------------------
    */
    public function ArticleUpdate(Request $request,$id){
        $artilce = 'App\Article'::findOrFail($id);
        $artilce->update([
            'title'             =>  $request->title,
            'subCategory_id'    =>  $request->sub_category,
            'body'              =>  $request->body
        ]);

        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json('مقاله با موفقیت ویرایش شد',200, array($header),JSON_UNESCAPED_UNICODE);

    }
    /*
    |--------------------------------------------------------------------------
    | All Article Categories
    |--------------------------------------------------------------------------
    */
    public function index(){
        $categories = 'App\Category'::latest()->get();
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($categories,200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | All Sub Categories List
    |--------------------------------------------------------------------------
    */
    public function AllSubCategoriesList($id){
        
        $category = 'App\Category'::findOrFail($id);
        $subCategories = $category->SubCategories;

        $subCategories = 'App\SubCategory'::with(array('articles'=>function($query){
            $query->select('subCategory_id','title');
        }))->where('category_id',$id)->get(['id','name']);

        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($subCategories,200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | All SubCategories List
    |--------------------------------------------------------------------------
    */
    public function AllSubCategoryList(){

        $categories = 'App\Category'::with(array('SubCategories'=>function($query){
            $query->select('category_id','name');
        }))->latest()->get(['id','name']);

        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($categories,200, array($header),JSON_UNESCAPED_UNICODE);
    }

}
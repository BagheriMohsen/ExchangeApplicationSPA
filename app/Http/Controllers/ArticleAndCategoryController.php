<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

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
            'body'              =>  $request->body,
            'lang'              =>  $request->lang
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
            'body'              =>  $request->body,
            'lang'              =>  $request->lang
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
        $categories = 'App\ArticleCategory'::latest()->get();
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($categories,200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | All Sub Categories List
    |--------------------------------------------------------------------------
    */
    public function AllSubCategoriesList($id,$user_id){
        
        $user = 'App\User'::findOrFail($user_id);

        $category = 'App\ArticleCategory'::findOrFail($id);
        $subCategories = $category->SubCategories;

        $subCategories = 'App\SubCategory'::with(array('articles'=>function($query){
            $query->select('subCategory_id','id','title');
        }))->where([
            ['category_id','=',$id],
            ['lang','=',$user->language]
        ])->get(['id','name']);

        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($subCategories,200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | All SubCategories List
    |--------------------------------------------------------------------------
    */
    public function AllSubCategoryList(){
       
        $categories = 'App\ArticleCategory'::with(array('SubCategories'=>function($query){
            $query->select('category_id','name');
        }))->latest()->get(['id','name']);
       
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($categories,200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | Article Single
    |--------------------------------------------------------------------------
    */
    public function ArticleSingle($id){
        $article = 'App\Article'::with(array('SubCategory'=>function($query){
            $query->select('id','name');
        }))->findOrFail($id);

        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($article,200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | Article Delete
    |--------------------------------------------------------------------------
    */
    public function ArticleDelete($id){

        $article = 'App\Article'::destroy($id);

        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json('مقاله با موفقیت حذف شد',200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | Show All Articles
    |--------------------------------------------------------------------------
    */
    public function showAllArticles(){
        $articles = 'App\Article'::with([
            'SubCategory'=>function($query){
                $query->select('id','name','category_id')
                ->with(array('category'=>function($query){
                    $query->select('id','name');
                }));
            }
        ])->get();
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($articles,200, array($header),JSON_UNESCAPED_UNICODE);
    }

}
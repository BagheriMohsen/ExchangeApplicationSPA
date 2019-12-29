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
        $lang = $user->language;
  
        // $subCategories = 'App\SubCategory'::with(array('articles'=>function($query){

        //     $query->select('subCategory_id','id','title','lang');

        // }))->where('category_id',$id)->get(['id','name']);
        
        $items = array();
        foreach($category->SubCategories as $subcategory){
            
            $articles = 'App\Article'::where([
                ['subCategory_id','=',$subcategory->id],
                ['lang','=',$lang]
            ])->get();
            
            if(empty($articles)){
                continue;
            }
            foreach($articles as $article){

                
                if($lang = "fa"){
                        $items[] = [
                            'id'                =>  $subcategory->id,
                            'name'              =>  $subcategory->name,
                            'article_id'        =>  $article[0]['id'],
                            'title'             =>  $article[0]['title'],
                            
                        ];
                }elseif($lang = "ar"){
                        $items[] = [
                            'id'                =>  $subcategory->id,
                            'name'              =>  $subcategory->ar_name,
                            'article_id'        =>  $article[0]['id'],
                            'title'             =>  $article[0]['title'],
                            
                        ];
                }else{
                        $items[] = [
                            'id'                =>  $subcategory->id,
                            'name'              =>  $subcategory->en_name,
                            'article_id'        =>  $article[0]['id'],
                            'title'             =>  $article[0]['title'],
                            
                        ];
                }
            }
            

            
            
        }

     
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($items,200, array($header),JSON_UNESCAPED_UNICODE);
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
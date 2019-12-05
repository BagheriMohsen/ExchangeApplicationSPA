<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ForexController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Forex Categories
    |--------------------------------------------------------------------------
    */
    public function forexCategories(){
        
        $categories = 'App\ForexCategory'::latest()->get(['id','name']);

        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($categories,200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | Forex store
    |--------------------------------------------------------------------------
    */
    public function forexStore(Request $request){

        'App\Forex'::create([
            'forex_category_id' =>  $request->forex_category_id,
            'pair'              =>  $request->pair,
            'startingPrice'     =>  $request->startingPrice,
            'tp'                =>  $request->tp,
            'sl'                =>  $request->sl,
            'buy_sell'          =>  $request->buy_sell,
            'expire'            =>  $request->expire,
            'close'             =>  $request->close
        ]);

        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json('با موفقیت ذخیره شد',200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | Forex Edit
    |--------------------------------------------------------------------------
    */
    public function forexEdit($id){
        
        $forex = 'App\Forex'::with(array('forexCategory'=>function($query){
            $query->select('id','name');
        }))->findOrFail($id);

        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($forex,200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | Forex Update
    |--------------------------------------------------------------------------
    */
    public function forexUpdate(Request $request,$id){

        $forex = 'App\Forex'::findOrFail($id);
        $forex->update([
            'forex_category_id' =>  $request->forex_category_id,
            'pair'              =>  $request->pair,
            'startingPrice'     =>  $request->startingPrice,
            'tp'                =>  $request->tp,
            'sl'                =>  $request->sl,
            'buy_sell'          =>  $request->buy_sell,
            'expire'            =>  $request->expire,
            'close'             =>  $request->close
        ]);

        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json('با موفقیت به روز رسانی شد',200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | Forex Expire
    |--------------------------------------------------------------------------
    */
    public function forexExpire(Request $request,$id){
        $forex = 'App\Forex'::findOrFail($id);
        $forex->update(['expire'=>$request->expire]);

        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json('منقضی شد',200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | Forex Close
    |--------------------------------------------------------------------------
    */
    public function forexClose(Request $request,$id){
        $forex = 'App\Forex'::findOrFail($id);
        $forex->update(['close'=>$request->close]);

        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json('بسته شد',200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | Forex Delete
    |--------------------------------------------------------------------------
    */
    public function forexDelete(Request $request,$id){
        $forex = 'App\Forex'::destroy($id);
       
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json('عملیات حذف با موفقیت انجام شد',200, array($header),JSON_UNESCAPED_UNICODE);
    }

}
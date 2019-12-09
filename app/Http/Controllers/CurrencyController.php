<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Currency;
use App\CurrnecyType;
class CurrencyController extends Controller
{

    
    /*
    |--------------------------------------------------------------------------
    | Currency Index
    |--------------------------------------------------------------------------
    */ 
    public function index(){
        $Allcurrency = CurrnecyType::with(array('currency'=>function($query){
            $query->select('id','name','type_id');
        }))->latest()->get(['id','name']);

        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($Allcurrency,200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | Currency Index
    |--------------------------------------------------------------------------
    */ 
    public function store(Request $request,$id){

        Currency::create([
            'name'      =>  $request->name ,
            'type_id'   =>  $id,
        ]);
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json('موفقیت آمیز بود ',200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | Currency Edit
    |--------------------------------------------------------------------------
    */ 
    public function edit($id){
        $currency = Currency::findOrFail($id);

        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($currency,200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | Currency Update
    |--------------------------------------------------------------------------
    */ 
    public function update(Request $request,$id){
        $currency = Currency::findOrFail($id);
        $currency->update([
            'name'      =>  $request->name,
            'type_id'   =>  $id,
        ]);
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json('با موفقیت به روز رسانی شد',200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | Currency Delete
    |--------------------------------------------------------------------------
    */ 
    public function destroy($id){
        $currency = Currency::destroy($id);

        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json('با موفقیت حذف شد',200, array($header),JSON_UNESCAPED_UNICODE);
    }
    
}
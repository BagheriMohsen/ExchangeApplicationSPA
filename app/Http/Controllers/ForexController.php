<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
class ForexController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Forex Index
    |--------------------------------------------------------------------------
    */
    public function index(){

        $Forex = 'App\Forex'::with(array('forexCategory'=>function($query){
            $query->select('id','name');
        }))
        ->where([
            ['close','=',0],
            ['expire','=',0]
        ])
        ->latest()->get();
        

        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($Forex,200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | All Forex
    |--------------------------------------------------------------------------
    */
    public function AllForex(){
       
        $Forex = 'App\Forex'::with(array('forexCategory'=>function($query){
            $query->select('id','name');
        }))->latest('updated_at')->get();

        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($Forex,200, array($header),JSON_UNESCAPED_UNICODE);
    }
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

        $new_forex = 'App\Forex'::create([
            'forex_category_id' =>  $request->forex_category_id,
            'pair'              =>  $request->pair,
            'startingPrice'     =>  $request->startingPrice,
            'tp'                =>  $request->tp,
            'sl'                =>  $request->sl,
            'buy_sell'          =>  $request->buy_sell,
            'fa_desc'           =>  $request->fa_desc,
            'ar_desc'           =>  $request->ar_desc,
            'en_desc'           =>  $request->en_desc
        ]);


      /** Find User who but binary plan  */
      $user_ids = "App\PlanUser"::where("type","forex")
      ->orWhere("type","both")
      ->get("user_id");
      $users_id = "App\User"::where("freeTime",True)->get("id");
      $user_ids = $user_ids->merge($users_id);
      $user_ids = $user_ids->all();

      $users = array();
      foreach( $user_ids as $user_id ) {

          if( isset( $user_id->user_id ) ){
              $users[] = "App\User"::findOrFail($user_id->user_id);
          }elseif( isset( $user_id->id ) ) {
              $users[] = "App\User"::findOrFail($user_id->id);
          }
          
      }

      /**  send push notif with one signal */
      if( $new_forex->buy_sell == "sell" ) {
          $status = "B/S/E : Sell "; 
      }elseif( $new_forex->buy_sell == "buy" ) {
          $status = "B/S/E : Buy ";
      }else{
          $status = "Ready";
      }
      
      $title      =   "Forex : ".$new_forex->pair;
      $content    =   "Trading Info : T.T.:".$new_forex->time_expire." min ".$status;
      
      return app('App\Http\Controllers\FCM\FcmController')
       ->send_notif_with_php($users , $title , $content);

        $Forex = 'App\Forex'::with(array('forexCategory'=>function($query){
            $query->select('id','name');
        }))->latest('updated_at')->get();
        event(new \App\Events\ForexNotifEvent($Forex));

        
        
        
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
            'close'             =>  $request->close,
            'fa_desc'           =>  $request->fa_desc,
            'ar_desc'           =>  $request->ar_desc,
            'en_desc'           =>  $request->en_desc

        ]);



    /** Find User who but binary plan  */
    $user_ids = "App\PlanUser"::where("type","forex")
    ->orWhere("type","both")
    ->get("user_id");
    $users_id = "App\User"::where("freeTime",True)->get("id");
    $user_ids = $user_ids->merge($users_id);
    $user_ids = $user_ids->all();

    $users = array();
    foreach( $user_ids as $user_id ) {

        if( isset( $user_id->user_id ) ){
            $users[] = "App\User"::findOrFail($user_id->user_id);
        }elseif( isset( $user_id->id ) ) {
            $users[] = "App\User"::findOrFail($user_id->id);
        }
        
    }

      /**  send push notif with one signal */
  
      $status = $forex->forexCategory->name;
     
      
      $title      =   "Forex : ".$forex->pair;
      $content    =   "Trading Info : T.T.:".$forex->time_expire." min ".$status;
      
      return app('App\Http\Controllers\FCM\FcmController')
       ->send_notif_with_php($users , $title , $content);






        $Forex = 'App\Forex'::with(array('forexCategory'=>function($query){
            $query->select('id','name');
        }))->latest('updated_at')->get();
        event(new \App\Events\ForexNotifEvent($Forex));
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
        $forex->update(['expire'=>1]);



       /** Find User who but binary plan  */
       $user_ids = "App\PlanUser"::where("type","forex")
       ->orWhere("type","both")
       ->get("user_id");
       $users_id = "App\User"::where("freeTime",True)->get("id");
       $user_ids = $user_ids->merge($users_id);
       $user_ids = $user_ids->all();
 
       $users = array();
       foreach( $user_ids as $user_id ) {
 
           if( isset( $user_id->user_id ) ){
               $users[] = "App\User"::findOrFail($user_id->user_id);
           }elseif( isset( $user_id->id ) ) {
               $users[] = "App\User"::findOrFail($user_id->id);
           }
           
       }

      /**  send push notif with one signal */
     
      $status = "Expire";
  
      $title      =   "Forex : ".$forex->pair;
      $content    =   "Trading Info : T.T.:".$forex->time_expire." min ".$status;
      
      return app('App\Http\Controllers\FCM\FcmController')
       ->send_notif_with_php($users , $title , $content);








        $Forex = 'App\Forex'::with(array('forexCategory'=>function($query){
            $query->select('id','name');
        }))->latest('updated_at')->get();
        event(new \App\Events\ForexNotifEvent($Forex));

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
        $forex->update(['close'=>1]);





      /** Find User who but binary plan  */
      $user_ids = "App\PlanUser"::where("type","forex")
      ->orWhere("type","both")
      ->get("user_id");
      $users_id = "App\User"::where("freeTime",True)->get("id");
      $user_ids = $user_ids->merge($users_id);
      $user_ids = $user_ids->all();

      $users = array();
      foreach( $user_ids as $user_id ) {

          if( isset( $user_id->user_id ) ){
              $users[] = "App\User"::findOrFail($user_id->user_id);
          }elseif( isset( $user_id->id ) ) {
              $users[] = "App\User"::findOrFail($user_id->id);
          }
          
      }

      /**  send push notif with one signal */
     
      $status = "close";
  
      $title      =   "Forex : ".$forex->pair;
      $content    =   "Trading Info : T.T.:".$forex->time_expire." min ".$status;
      
      return app('App\Http\Controllers\FCM\FcmController')
       ->send_notif_with_php($users , $title , $content);







        $Forex = 'App\Forex'::with(array('forexCategory'=>function($query){
            $query->select('id','name');
        }))->latest('updated_at')->get();
        event(new \App\Events\ForexNotifEvent($Forex));

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
    /*
    |--------------------------------------------------------------------------
    | Forex Event
    |--------------------------------------------------------------------------
    */
    public function forexEvent(){
        $Forex = 'App\Forex'::latest()->get();
        event(new \App\Events\ForexNotifEvent($Forex));
        return "Event has been sent!";
       
    }
    /*
    |--------------------------------------------------------------------------
    | close and expire Forex list
    |--------------------------------------------------------------------------
    */
    public function close_expire_list(){

        $Forex = 'App\Forex'::with(array('forexCategory'=>function($query){
            $query->select('id','name');
        }))->latest('updated_at')->get();
        // event(new \App\Events\ForexNotifEvent($Forex));
        
        $forex = 'App\Forex'::with(array('forexCategory'=>function($query){
            $query->select('id','name');
        }))
        ->where([
            ['expire','=',1],
        ])
        ->orWhere([
            ['close','=',1],
        ])->latest()->get();
       
        
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($forex,200, array($header),JSON_UNESCAPED_UNICODE);
    }

}
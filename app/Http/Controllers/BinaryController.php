<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BinaryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Binary Index
    |--------------------------------------------------------------------------
    */
    public function index(){
        $binaries = 'App\Binary'::where([
            ['close','=',0]
        ])->latest()->get();

        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($binaries,200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | All Binaries
    |--------------------------------------------------------------------------
    */
    public function AllBinaries(){
        $binaries = $binaries = 'App\Binary'::latest('updated_at')->get();

        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($binaries,200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | Binary Store
    |--------------------------------------------------------------------------
    */
    public function store(Request $request) {

        $binary = 'App\Binary'::create([
            'pair'          =>  $request->pair,
            'buy_sell'      =>  $request->buy_sell,
            'time_expire'   =>  $request->time_expire,
            'endTime'       =>  $request->endTime,
            'close'         =>  $request->close
        ]); 
       
        /**  send push notif with one signal */

        
        $users = "App\User"::latest()->get();
      
        $status = "Ready";
        
        $title      =   "Binary : ".$binary->pair;
        $content    =   "Trading Info : T.T.:".$binary->time_expire." min ".$status;
        
        
        return app('App\Http\Controllers\FCM\FcmController')
         ->send_notif_with_php($users , $title , $content);

        /** send pusher */

        $Binary = 'App\Binary'::latest('updated_at')->get();
        event(new \App\Events\BinaryNotif($Binary));

        
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json('باینری با موفقیت ذخیره شد',200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | Binary Edit
    |--------------------------------------------------------------------------
    */
    public function edit($id){
        $binary = 'App\Binary'::findOrFail($id);

        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($binary,200, array($header),JSON_UNESCAPED_UNICODE);
        
    }
    /*
    |--------------------------------------------------------------------------
    | Binary Update
    |--------------------------------------------------------------------------
    */
    public function update(Request $request,$id){
        $binary = 'App\Binary'::findOrFail($id);
        $binary->update([
            'pair'          =>  $request->pair,
            'buy_sell'      =>  $request->buy_sell,
            'time_expire'   =>  $request->time_expire,
            'endTime'       =>  $request->endTime,
            'close'         =>  $request->close
        ]);
        $Binary = 'App\Binary'::latest('updated_at')->get();
        
        /**  send push notif with one signal */
        $users = "App\User"::latest()->get();
  
        if( $binary->buy_sell == "sell" ) {
            $status = "B/S/E : Sell "; 
        }elseif( $binary->buy_sell == "buy" ) {
            $status = "B/S/E : Buy ";
        }else{
            $status = "Ready";
        }
        
        $title      =   "Binary : ".$binary->pair;
        $content    =   "Trading Info : T.T.:".$binary->time_expire." min ".$status;
        
        
        return app('App\Http\Controllers\FCM\FcmController')
         ->send_notif_with_php($users , $title , $content);
        
        
        event(new \App\Events\BinaryNotif($Binary));
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json('با موفقیت به روز رسانی شد',200, array($header),JSON_UNESCAPED_UNICODE);
        
    }
    /*
    |--------------------------------------------------------------------------
    | Binary Delete
    |--------------------------------------------------------------------------
    */
    public function delete($id){
        $binary = 'App\Binary'::destroy($id);
        $Binary = 'App\Binary'::latest()->get();
        event(new \App\Events\BinaryNotif($Binary));
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json('با موفقیت حذف شد',200, array($header),JSON_UNESCAPED_UNICODE);
        
    }
    /*
    |--------------------------------------------------------------------------
    | Binary close
    |--------------------------------------------------------------------------
    */
    public function close(Request $request,$id){
        $binary = 'App\Binary'::findOrFail($id);
        $binary->update(['close'=>1]);
        

        /**  send push notif with one signal */
        $users      =   "App\User"::latest()->get();
        $status     =   "B/S/E : Expire ";
        $title      =   "Binary : ".$binary->pair;
        $content    =   "Trading Info : T.T.:".$binary->time_expire." min ".$status;
        
        
        return app('App\Http\Controllers\FCM\FcmController')
         ->send_notif_with_php($users , $title , $content);


        $Binary = 'App\Binary'::latest('updated_at')->get();
        event(new \App\Events\BinaryNotif($Binary));


        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json('با موفقیت حذف شد',200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | List of binary close
    |--------------------------------------------------------------------------
    */
    public function closeBinaries(){
        $binaries = 'App\Binary'::where([
            ['close','=',1]
        ])->latest()->get();
        $Binary = 'App\Binary'::latest('updated_at')->get();
        // event(new \App\Events\BinaryNotif($Binary));
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($binaries,200, array($header),JSON_UNESCAPED_UNICODE);
    }

}
<?php

namespace App\Http\Controllers;
use App\User;
use App\Binary;
use App\PlanUser;
use App\Events\BinaryNotif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class BinaryController extends Controller
{

    public $url;
    public $header;

    public function __construct() {
        $this->header = ['Content-Type' => 'application/json;charset=utf8'];
        $this->url    =   "https://app.utsignal.com/#/binary";
    }


    /** 
     * @Author: Mohsen bagheri 
     * @Date: 2020-08-31 05:47:58 
     * @Desc: binary users
     */
    public function binary_users() {

        /** find binary user id  */
        $user_ids = PlanUser::where("type","binary")
            ->orWhere("type","both")
            ->get("user_id");
        
        // find and merge users have free time 
        $users_id = User::where("freeTime",True)->get("id");
        $user_ids = $user_ids->merge($users_id);
        $user_ids = $user_ids->all();

        // find binary users by id
        $users = array();
        foreach( $user_ids as $user_id ) {

            if( isset( $user_id->user_id ) ){
                $users[] = User::findOrFail($user_id->user_id);
            }elseif( isset( $user_id->id ) ) {
                $users[] = User::findOrFail($user_id->id);
            }
            
        }

        return $users;
    }

    /** 
     * @Author: Mohsen bagheri 
     * @Date: 2020-08-31 05:50:39 
     * @Desc: send fcm => one signal
     */
    public function send_fcm($binary, $status) {

        $users      =   $this->binary_users();
        $title      =   "Binary : ".$binary->pair;
        $content    =   "Trading Info : T.T.:".$binary->time_expire." min ".$status;

        app('App\Http\Controllers\FCM\FcmController')
            ->send_notif_with_php($users , $title , $content, $this->url);
    }

    /** 
     * @Author: Mohsen bagheri 
     * @Date: 2020-08-31 05:53:25 
     * @Desc: update binary event
     */
    public function event_update() {

        $Binary = Binary::latest('updated_at')->get();
        event(new BinaryNotif($Binary));

    }

    /*
    |--------------------------------------------------------------------------
    | Binary Index
    |--------------------------------------------------------------------------
    */
    public function index(){
        $binaries = Binary::where([
            ['close','=',false]
        ])->latest()->get();

        return response()->json($binaries,200, array($this->header),JSON_UNESCAPED_UNICODE);
    }

    /*
    |--------------------------------------------------------------------------
    | All Binaries
    |--------------------------------------------------------------------------
    */
    public function AllBinaries(){
        $binaries = Binary::latest('updated_at')->get();

        return response()->json($binaries,200, array($this->header),JSON_UNESCAPED_UNICODE);
    }

    /*
    |--------------------------------------------------------------------------
    | Binary Store
    |--------------------------------------------------------------------------
    */
    public function store(Request $request) {

        $data = $request->all();
        $binary = Binary::create($data); 

        /**  send push notif with one signal */
        $status = "Ready";
        $this->send_fcm($binary, $status);

        /** send pusher */
        $this->event_update();

        return response()->json('باینری با موفقیت ذخیره شد',200, array($this->header),JSON_UNESCAPED_UNICODE);
    }

    /*
    |--------------------------------------------------------------------------
    | Binary Edit
    |--------------------------------------------------------------------------
    */
    public function edit($id){

        $binary = Binary::findOrFail($id);

        return response()->json($binary,200, array($this->header),JSON_UNESCAPED_UNICODE);
        
    }

    /*
    |--------------------------------------------------------------------------
    | Binary Update
    |--------------------------------------------------------------------------
    */
    public function update(Request $request,$id){

        $binary = Binary::findOrFail($id);

        $data = $request->all();
        $binary->update($data);

        /**  send push notif with one signal */
        if( $binary->buy_sell == "sell" ) {
            $status = "B/S/E : Sell "; 
        } elseif ( $binary->buy_sell == "buy" ) {
            $status = "B/S/E : Buy ";
        } else {
            $status = "Ready";
        }

        $this->send_fcm($binary, $status);

        /** send pusher */
        $this->event_update();

        return response()->json('با موفقیت به روز رسانی شد',200, array($this->header),JSON_UNESCAPED_UNICODE);
        
    }
    
    /*
    |--------------------------------------------------------------------------
    | Binary Delete
    |--------------------------------------------------------------------------
    */
    public function delete($id){

        $binary = Binary::destroy($id);

        /** send pusher */
        $this->event_update();

        return response()->json('با موفقیت حذف شد',200, array($this->header),JSON_UNESCAPED_UNICODE);
        
    }

    /*
    |--------------------------------------------------------------------------
    | Binary close
    |--------------------------------------------------------------------------
    */
    public function close(Request $request,$id){
        $binary = Binary::findOrFail($id);
        $binary->update(['close'=>true]);
        
        $status     =   "B/S/E : Expire ";
        $this->send_fcm($binary, $status);

        /** send pusher */
        $this->event_update();

        return response()->json('با موفقیت حذف شد',200, array($this->header),JSON_UNESCAPED_UNICODE);
    }
    
    /*
    |--------------------------------------------------------------------------
    | List of binary close
    |--------------------------------------------------------------------------
    */
    public function closeBinaries(){

        $binaries = Binary::where([
            ['close','=',true]
        ])->latest()->get();

        $Binary = Binary::latest('updated_at')->get();
        // event(new \App\Events\BinaryNotif($Binary));
        
        return response()->json($binaries,200, array($this->header),JSON_UNESCAPED_UNICODE);
    }

}
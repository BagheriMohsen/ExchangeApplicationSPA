<?php

namespace App\Http\Controllers;
use App\User;
use App\Forex;
use App\PlanUser;
use App\ForexCategory;
use Illuminate\Http\Request;
use App\Events\ForexNotifEvent;
use Illuminate\Support\Facades\Event;

class ForexController extends Controller
{

    public $url;

    public $header;

    /** 
     * @Author: Mohsen bagheri 
     * @Date: 2020-08-31 05:43:40 
     * @Desc: construct function
     */
    public function __construct() {
        $this->url = "https://app.utsignal.com/#/farx";
        $this->header = ['Content-Type' => 'application/json;charset=utf8'] ;
    }

    /** 
     * @Author: Mohsen bagheri 
     * @Date: 2020-08-31 05:20:52 
     * @Desc: find user who buys forex
     * @return $users json array 
     */
    public function binary_users() {

        // find all forex user id
        $user_ids = PlanUser::where("type","forex")
            ->orWhere("type","both")
            ->get("user_id");

        // find and merge free time true users
        $users_id = User::where("freeTime",True)->get("id");
        $user_ids = $user_ids->merge($users_id);
        $user_ids = $user_ids->all();

        // find all user by id
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
     * @Date: 2020-08-31 05:18:55 
     * @Desc: farex trading info for one signal
     */
    public function send_fcm($forex, $status) {

        $users  = $this->binary_users();

        $title      =   "Forex : ".$forex->pair;
        $content    =   "Trading Info : T.T.:".$forex->time_expire." min ".$status;
      
        app('App\Http\Controllers\FCM\FcmController')
            ->send_notif_with_php($users , $title , $content, $this->url);

    }



    /** 
     * @Author: Mohsen bagheri 
     * @Date: 2020-08-31 05:26:55 
     * @Desc:  update forex event
     */
    public function update_event() {

        $Forex = Forex::with(['forexCategory' => function($query) {
            $query->select('id','name');
        }])->latest('updated_at')->get();

        event(new ForexNotifEvent($Forex));
    }

    /*
    |--------------------------------------------------------------------------
    | Forex Index
    |--------------------------------------------------------------------------
    */
    public function index(){

        $Forex = Forex::with(['forexCategory'=>function($query){
            $query->select('id','name');
        }])
        ->where([
            ['close','=',false],
            ['expire','=',false]
        ])
        ->latest()->get();

        return response()->json($Forex,200, array($this->header),JSON_UNESCAPED_UNICODE);
    }

    /*
    |--------------------------------------------------------------------------
    | All Forex
    |--------------------------------------------------------------------------
    */
    public function AllForex(){
       
        $Forex = Forex::with(['forexCategory'=>function($query){
            $query->select('id','name');
        }])->latest('updated_at')->get();

        return response()->json($Forex,200, array($this->header),JSON_UNESCAPED_UNICODE);
    }

    /*
    |--------------------------------------------------------------------------
    | Forex Categories
    |--------------------------------------------------------------------------
    */
    public function forexCategories(){
        
        $categories = ForexCategory::latest()->get(['id','name']);

        return response()->json($categories,200, array($this->header),JSON_UNESCAPED_UNICODE);
    }

    /* 
    |--------------------------------------------------------------------------
    | Forex store
    |--------------------------------------------------------------------------
    */
    public function forexStore(Request $request){

        $data = $request->all();
        $new_forex = Forex::create($data);

        /**  check forex status */
        if( $new_forex->buy_sell == "sell" ) {
            $status = "B/S/E : Sell "; 
        }elseif( $new_forex->buy_sell == "buy" ) {
            $status = "B/S/E : Buy ";
        }else{
            $status = "Ready";
        }

        $this->send_fcm($new_forex, $status);

        $this->update_event();

        return response()->json('با موفقیت ذخیره شد',200, array($this->header),JSON_UNESCAPED_UNICODE);
    }

    /*
    |--------------------------------------------------------------------------
    | Forex Edit
    |--------------------------------------------------------------------------
    */
    public function forexEdit($id){
        
        $forex = Forex::with(array('forexCategory'=>function($query){
            $query->select('id','name');
        }))->findOrFail($id);

        return response()->json($forex,200, array($this->header),JSON_UNESCAPED_UNICODE);
    }

    /*
    |--------------------------------------------------------------------------
    | Forex Update
    |--------------------------------------------------------------------------
    */
    public function forexUpdate(Request $request,$id){

        $forex = Forex::findOrFail($id);
        
        $data = $request->all();

        $forex->update($data);

        $status = $forex->forexCategory->name;
        $this->send_fcm($forex, $status);

        $this->update_event();

        return response()->json('با موفقیت به روز رسانی شد',200, array($this->header),JSON_UNESCAPED_UNICODE);
    }

    /*
    |--------------------------------------------------------------------------
    | Forex Expire
    |--------------------------------------------------------------------------
    */
    public function forexExpire(Request $request,$id){

        $forex = Forex::findOrFail($id);
        $forex->update(['expire'=>true]);

        $status = "Expire";
        $this->send_fcm($forex, $status);

        $this->update_event();

        return response()->json('منقضی شد',200, array($this->header),JSON_UNESCAPED_UNICODE);
    }

    /*
    |--------------------------------------------------------------------------
    | Forex Close
    |--------------------------------------------------------------------------
    */
    public function forexClose(Request $request,$id){

        $forex = Forex::findOrFail($id);
        $forex->update(['close'=>true]);
     
        $status = "close";
        $this->send_fcm($forex, $status);

        $this->update_event();

        return response()->json('بسته شد',200, array($this->header),JSON_UNESCAPED_UNICODE);

    }

    /*
    |--------------------------------------------------------------------------
    | Forex Delete
    |--------------------------------------------------------------------------
    */
    public function forexDelete(Request $request,$id){
        $forex = Forex::destroy($id);

        return response()->json('عملیات حذف با موفقیت انجام شد',200, array($this->header),JSON_UNESCAPED_UNICODE);
    }

    /*
    |--------------------------------------------------------------------------
    | close and expire Forex list
    |--------------------------------------------------------------------------
    */
    public function close_expire_list(){

        $Forex = Forex::with(array('forexCategory'=>function($query){
            $query->select('id','name');
        }))->latest('updated_at')->get();
        // event(new \App\Events\ForexNotifEvent($Forex));
        
        $forex = Forex::with(array('forexCategory'=>function($query){
            $query->select('id','name');
        }))
        ->where([
            ['expire','=',1],
        ])
        ->orWhere([
            ['close','=',1],
        ])->latest()->get();

        return response()->json($forex,200, array($this->header),JSON_UNESCAPED_UNICODE);
    }

   
}
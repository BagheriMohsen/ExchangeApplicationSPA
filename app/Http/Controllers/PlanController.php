<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\PlanUser;
use Carbon\Carbon;
class PlanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | All Plan
    |--------------------------------------------------------------------------
    */
    public function index(){
        $plans = Plan::latest()->get();
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($plans,200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | Store
    |--------------------------------------------------------------------------
    */
    public function PlanStore(Request $request){

        Plan::create([
            'currency_type_id'  =>  $request->currency_type_id,
            'title'             =>  $request->title,
            'price'             =>  $request->price,
            'expireDay'         =>  $request->expireDay,
            'desc'              =>  $request->desc
        ]);
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json('پلن با موفقیت ذخیره شد',200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | Plan Edit
    |--------------------------------------------------------------------------
    */
    public function PlanEdit($id){
        $plan = Plan::findOrFail($id);
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($plan,200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | Plan UPdate
    |--------------------------------------------------------------------------
    */
    public function PlanUpdate(Request $request,$id){
        $plan = Plan::findOrFail($id);
        $plan->update([
            'type'              =>  $request->type,
            'title'             =>  $request->title,
            'price'             =>  $request->price,
            'expireDay'         =>  $request->expireDay,
            'desc'              =>  $request->desc
        ]);
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json('موفقیت آمیز بود',200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | Plan Delete
    |--------------------------------------------------------------------------
    */
    public function PlanDelete($id){
        $plan = Plan::destroy($id);
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json('موفقیت آمیز بود',200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | Store Plan For User
    |--------------------------------------------------------------------------
    */
    public function StorePlanForUser(Request $request,$id){
        $plan = Plan::findOrFind($request->plan_id);
        $expireTime = Carbon::now()->addDays($plan->expireDay);
        
        PlanUser::create([
            'plan_id'       =>  $request->plan_id,
            'user_id'       =>  $id,
            'expireTime'    =>  $expireTime,
        ]);
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json('پلن با موفقیت به این کاربر اختصاص یافت',200, array($header),JSON_UNESCAPED_UNICODE);
    }
    /*
    |--------------------------------------------------------------------------
    | Store All User Plan
    |--------------------------------------------------------------------------
    */
    public function AllUserPlan($user_id){
        $planUsers = PlanUser::with('plan')->where('user_id',$user_id)->latest()->get();
    
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        return response()->json($planUsers,200, array($header),JSON_UNESCAPED_UNICODE);
    }
    
    
}

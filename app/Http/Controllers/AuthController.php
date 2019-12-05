<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
class AuthController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    public function register(Request $request){
        $status = 'App\User'::where('phoneNumber',$request->phoneNumber)->exists();
        $header = ['Content-Type' => 'application/json;charset=utf8'];

        if($status == True){
            return response()->json('کاربری با این شماره قبلا ثبت نام کرده',200, array($header),JSON_UNESCAPED_UNICODE);
        }

        $user = 'App\User'::create([
            'FullName'      =>  $request->FullName,
            'phoneNumber'   =>  $request->phoneNumber
        ]);
       
        Auth::loginUsingId($user->id);
        $message = 'ثبت نام شما با موفقیت انجام شد';
        return response()->json($message,200, array($header),JSON_UNESCAPED_UNICODE);
         
    }

    public function login(){
        
        // $user = 'App\User'::where('email', $request->input('email'))->first();
        $_SESSION["userLoginStatus"] = 'ok';
        // $apikey = uniqid();

        // 'App\User'::where('phoneNumber','09102222222')->update(['api_key' => "$apikey"]);;
        
        // return response()->json(['status' => 'success','api_key' => $apikey]);
           
    }

    public function logout(){
        return response()->json('logout');
    }

}
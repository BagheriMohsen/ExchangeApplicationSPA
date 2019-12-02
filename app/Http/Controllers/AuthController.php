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
        return response()->json('login');
    }

    public function logout(){
        return response()->json('logout');
    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | show all users
    |--------------------------------------------------------------------------
    */
    public function all_users() {

        $users = User::latest()->paginate(5);
        $header = ['Content-Type' => 'application/json;charset=utf8'];

        return response()->json($users,200, array($header),JSON_UNESCAPED_UNICODE);

    }

    /*
    |--------------------------------------------------------------------------
    | Users who buied
    |--------------------------------------------------------------------------
    */
    public function users_who_buied() {

        $users = "App\PlanUser"::with(["user","plan"])->latest()->paginate(5);

        $header = ['Content-Type' => 'application/json;charset=utf8'];

        return response()->json($users,200, array($header),JSON_UNESCAPED_UNICODE);

    }

    /*
    |--------------------------------------------------------------------------
    | Logout Users
    |--------------------------------------------------------------------------
    */
    public function logout_users($user_id) {

        $user = User::findOrFail($user_id);
        $user->update([
            "login_status" => False
        ]);

        return response()->json("user logout now",200, array($header),JSON_UNESCAPED_UNICODE);


    }

}

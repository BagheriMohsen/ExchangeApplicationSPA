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

        $users = User::latest()->paginate(15);
        $header = ['Content-Type' => 'application/json;charset=utf8'];

        return response()->json($users,200, array($header),JSON_UNESCAPED_UNICODE);

    }

    /*
    |--------------------------------------------------------------------------
    | Users who buied
    |--------------------------------------------------------------------------
    */
    public function users_who_buied() {

        $users = "App\PlanUser"::with(["user","plan"])->latest()->get();

        $header = ['Content-Type' => 'application/json;charset=utf8'];

        return response()->json($users,200, array($header),JSON_UNESCAPED_UNICODE);

    }


}

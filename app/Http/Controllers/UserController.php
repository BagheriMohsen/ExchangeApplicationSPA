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

<<<<<<< HEAD
        $users = "App\PlanUser"::with(["plan","user"])->latest()->get();

=======
        $users = "App\PlanUser"::with(["user","plan"])->latest()->paginate(5);
>>>>>>> 702f70ca708e34aaa83569bc1b769f09193fc900

        $header = ['Content-Type' => 'application/json;charset=utf8'];

        return response()->json($users,200, array($header),JSON_UNESCAPED_UNICODE);

    }


}

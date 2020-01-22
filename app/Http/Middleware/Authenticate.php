<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class Authenticate
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        
        if(!isset($_SESSION['user_id'])){
            return redirect('admin-login');
        }
       
        // $user_id = $_SESSION['user_id'];
        // $user_status = 'App\AdminUser'::where('username',$req->username)->exists();

        // if (!$user_status) {

        //     return redirect('admin_login');
            
        // }

        return $next($request);
    }
}

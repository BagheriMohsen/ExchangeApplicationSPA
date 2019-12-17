<?php

namespace App\Http\Controllers;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Exception;
use App\User;
use Laravel\Lumen\Routing\Controller as BaseController;

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

    protected function jwt($user) {
        $payload = [
            'iss' => "lumen-jwt", // Issuer of the token
            'sub' => $user->id, // Subject of the token
            'iat' => time(), // Time when JWT was issued. 
            'exp' => time() + ((60*60)*24)*365 // Expiration time
        ];
        
        // As you can see we are passing `JWT_SECRET` as the second parameter that will 
        // be used to decode the token in the future.
        return JWT::encode($payload, env('JWT_SECRET'));
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
       
        return response()->json([
            'token' => $this->jwt($user)
        ], 200);
        
    }

    public function login(Request $request){
        
        $user = 'App\User'::where('phoneNumber', $request->input('phoneNumber'))->firstOrFail();
       
        return response()->json([
            'token' => $this->jwt($user)
        ], 200);
           
    }

    public function logout(){
        return response()->json('logout');
    }

    public function token(Request $request){
        $token = $request->get('token');
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        if(!$token) {
            // Unauthorized response if token not there
            return response()->json([
                'خطا' => 'توکنی برای پردازش دریافت نشده'
            ], 401,array($header),JSON_UNESCAPED_UNICODE);
        }
        try {
            $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
        } catch(ExpiredException $e) {
            return response()->json([
                'خطا' => 'توکن دریافتی منقضی شده است'
            ], 400,array($header),JSON_UNESCAPED_UNICODE);
        } catch(Exception $e) {
            return response()->json([
                'خطا' => 'در پردازش توکن مشکلی وجود دارد'
            ], 400,array($header),JSON_UNESCAPED_UNICODE);
        }
        $user = User::with('plans')->find($credentials->sub);
        // Now let's put the user in the request class so that you can grab it from there
        $request->auth = $user;
        // return $next($request);
        // $users = app('db')->table('users')
        // ->select('select * from users where id = ?', [$user->id])
        // ->join('roles', 'users.role_id', '=', 'roles.id')
        // ->get();

       
        return response()->json($user,200, array($header),JSON_UNESCAPED_UNICODE);
    }

}
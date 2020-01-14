<?php

namespace App\Http\Controllers;


use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Exception;
use App\User;
use Carbon\Carbon;
use Session;
use Artisaninweb\SoapWrapper\SoapWrapper;



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
            'phoneNumber'   =>  $request->phoneNumber,
            'role_id'       =>  $request->role_id,
            'language'      =>  $request->lang
        ]);
       
        $FourDigitRandom = rand(1000,9999);

        try{
            
            $client = new \nusoap_client('http://api.payamak-panel.com/post/send.asmx?wsdl',true);
            $err = $client->getError();
    
            if ($err){
            
            return 'ارسال پیام با مشکل مواجه شده است' . $err;
        
            }
    
            $parameters['username'] =   "09388387058";
            $parameters['password'] =   "3907";
            $parameters['to']       =   $user->phoneNumber;
            $parameters['from']     =   "50001060689251";
            $parameters['text']     =   $FourDigitRandom;
            $parameters['isflash']  =   false;
    
    
            $result = $client->call('SendSimpleSMS2', $parameters);
        }
        catch(Exception $e){
            $e->getMessage();
        }
        
    
        
        $response = array (
            'DigitValidate' => $FourDigitRandom,
            'user_id'       => $user->id 
        );
        
        return response()->json($response,200, array($header),JSON_UNESCAPED_UNICODE);

        
    }

    public function sendVerfySms(Request $request){
        // turn off the WSDL cache
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        // $DigitValidate  =   $request->FourDigitRandom;
        $user_id        =   $request->user_id;   
        $user = 'App\User'::findOrFail($request->user_id);
            return response()->json([
                'token' => $this->jwt($user)
            ], 200);
        // if($DigitValidate == $request->DigitValidate){
        //     $user = 'App\User'::findOrFail($request->user_id);
        //     return response()->json([
        //         'token' => $this->jwt($user)
        //     ], 200);
        // }else{
        //     return response()->json('شماره درست نیست',200, array($header),JSON_UNESCAPED_UNICODE);
        // }
        
        
        
    }

    public function login(Request $request){
        
        $status = 'App\User'::where('phoneNumber',$request->phoneNumber)->exists();
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        if($status !=True){
            return response()->json('همچین شماره ای در سیستم ثبت نشده',200, array($header),JSON_UNESCAPED_UNICODE);
        }

        $user   = 'App\User'::where('phoneNumber',$request->phoneNumber)->firstOrFail();
       
        
        $FourDigitRandom = rand(1000,9999);
        
        
        try{
            
            $client = new \nusoap_client('http://api.payamak-panel.com/post/send.asmx?wsdl',true);
            $err = $client->getError();
    
            if ($err){
            
            return 'ارسال پیام با مشکل مواجه شده است' . $err;
        
            }
    
            $parameters['username'] =   "09388387058";
            $parameters['password'] =   "3907";
            $parameters['to']       =   $user->phoneNumber;
            $parameters['from']     =   "50001060689251";
            $parameters['text']     =   $FourDigitRandom;
            $parameters['isflash']  =   false;
    
    
            $result = $client->call('SendSimpleSMS2', $parameters);
        }
        catch(Exception $e){
            $e->getMessage();
        }

        $response = array (
            'DigitValidate' => $FourDigitRandom,
            'user_id'       => $user->id 
        );  

        return response()->json($response,200, array($header),JSON_UNESCAPED_UNICODE);

           
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
       
        $user = User::with(['plans'=>function($query){
            $query->select('id','plan_id','user_id','expireTime')
            ->with('plan')->get();
        }])->find($credentials->sub);

        
        // Now let's put the user in the request class so that you can grab it from there
        $request->auth = $user;
        // return $next($request);
        // $users = app('db')->table('users')
        // ->select('select * from users where id = ?', [$user->id])
        // ->join('roles', 'users.role_id', '=', 'roles.id')
        // ->get();
        $thisUser = $user;
        $now    =   Carbon::now();
        $diff   =   $user->created_at->diffInDays($now);

        // store token into api-key 
        $user->update([
            'api_key'   =>  $token
        ]);

        // for user free trial
        if($diff > 14){
            $user->update([
                'freeTime'  =>  False
            ]);
        }
        // for user plan expire
       
        foreach($user->plans as $plan){
            $planExpireTime = Carbon::parse($plan->expireTime);
            $diffPlan = $planExpireTime->diffForHumans($now); 

            if(strpos($diffPlan, 'before') == True){
                
                'App\PlanUserExpire'::create([
                    'plan_id'       =>  $plan->plan_id,
                    'user_id'       =>  $plan->user_id,
                    'expireTime'    =>  $plan->expireTime,
                ]);
               
                $result ='App\PlanUser'::destroy($plan->id);
            } 


            
            
        }
        return response()->json($thisUser,200, array($header),JSON_UNESCAPED_UNICODE);
    }

    public function user_guide_check($user_id){


        $header = ['Content-Type' => 'application/json;charset=utf8'];
        $user = User::findOrFail($user_id);
     
        $user->update([
            'guide_check'       =>  True,
            'guide_check_date'  =>  Carbon::now()
        ]);

        $result = array(
            'message'   =>  'چک شد'
        );
        return response()->json($result,200, array($header),JSON_UNESCAPED_UNICODE);
    }

}
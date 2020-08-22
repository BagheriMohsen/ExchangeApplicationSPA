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
    
    public $username;
    public $password;
    public $from;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->username =    "09388387058"; // sms username
       $this->password =    "3907";  // sms password
       $this->from     =    "50001060689251"; //
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

    /** 
     * @Author: mohsen bagheri 
     * @Date: 2020-08-16 02:21:28 
     * @Desc:  this function is register user into site
     */
    public function register(Request $request){
        
        $status = 'App\User'::where('phoneNumber',$request->phoneNumber)->exists();
        $header = ['Content-Type' => 'application/json;charset=utf8'];

        if($status == True){
            return response()->json('کاربری با این شماره قبلا ثبت نام کرده',200, array($header),JSON_UNESCAPED_UNICODE);
        }

        $user = 'App\User'::create([
            'FullName'      =>  $request->FullName,
            'phoneNumber'   =>  $request->phoneNumber,
            'language'      =>  $request->lang
        ]);
       
        $FourDigitRandom = rand(1000,9999);

        // try with nosoup library
        try{
            
            $client = new \nusoap_client('http://api.payamak-panel.com/post/send.asmx?wsdl',true);
            $err = $client->getError();
    
            if ($err){
            
                return 'ارسال پیام با مشکل مواجه شده است' . $err;
        
            }
            
            // all paramters for sending sms
            $parameters['username'] =   $this->username;
            $parameters['password'] =   $this->password;
            $parameters['to']       =   $user->phoneNumber;
            $parameters['from']     =   $this->from;
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

    /** 
     * @Author: Mohsen bagheri 
     * @Date: 2020-08-23 00:39:37
     * @param Request $request
     * @Desc: when user filled digital number and submit then 
     */
    public function sendVerfySms(Request $request){
        
        // find user bu user_id
        $user_id        =   $request->user_id;   
        $user = 'App\User'::findOrFail($request->user_id);

        // change login status to true and response token for js local storage
        $user->update(['login_status'=>True]);
            return response()->json([
                'token' => $this->jwt($user)
            ], 200);
        
    }

    /** 
     * @Author: Mohsen bagheri 
     * @Date: 2020-08-23 00:42:20 
     * @Desc: Login 
     */
    public function login(Request $request){
        
        $status = 'App\User'::where('phoneNumber',$request->phoneNumber)
            ->exists(); // check this phone number is exists or not

        $header = ['Content-Type' => 'application/json;charset=utf8'];

        //if this number is exists in users table
        if($status !=True){
            return response()->json('همچین شماره ای در سیستم ثبت نشده',200, array($header),JSON_UNESCAPED_UNICODE);
        }

        // select user by user phone number
        $user   = 'App\User'::where('phoneNumber',$request->phoneNumber)->firstOrFail();
        
        // message for user login in another device
        if($user->login_status){
            $login_status_message  = 'این کاربر با یک دیوایس دیگر به سیستم وارد شده است.';
            $login_status_message .= 'لطفا ابتدا از گوشی قبلی خارج شوید تا بتوانید لاگین کنید';
            $login_status_message .= 'لطفا در صورت بروز مشکل با بخش پشتیبانی اپلیکیشن تماس بگیرید';
            return response()->json($login_status_message,200, array($header),JSON_UNESCAPED_UNICODE);
        }
       
        //create random four digit number for verify user
        $FourDigitRandom = rand(1000,9999);
        
        //send sms with nusoap protocol
        try{
            
            $client = new \nusoap_client('http://api.payamak-panel.com/post/send.asmx?wsdl',true);
            $err = $client->getError();
    
            if ($err){
            
                return 'ارسال پیام با مشکل مواجه شده است' . $err;
        
            }
    
            $parameters['username'] =   $this->username;
            $parameters['password'] =   $this->password;
            $parameters['to']       =   $user->phoneNumber;
            $parameters['from']     =   $this->from;
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

    /** 
     * @Author: Mohsen bagheri 
     * @Date: 2020-08-23 00:44:19 
     * @Desc: Logout 
     */
    public function logout($user_id){
        $user = User::findOrFail($user_id);
        $user->update(['login_status'=>False]);//now user can login another device
        return response()->json('logout');//remove user token
    }


    /** 
     * @Author: Mohsen bagheri 
     * @Date: 2020-08-23 00:44:29 
     * @Desc: check token is valid or not
     */
    public function token(Request $request){
        $token = $request->get('token');
        $header = ['Content-Type' => 'application/json;charset=utf8'];

        // if token not found then
        if(!$token) {
            
            // Unauthorized response if token not there
            return response()->json([
                'خطا' => 'توکنی برای پردازش دریافت نشده'
            ], 401,array($header),JSON_UNESCAPED_UNICODE);
        }
        try {
            // decode jwt token for proccess
            $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);

            // if token is expire
        } catch(ExpiredException $e) {
            return response()->json([
                'خطا' => 'توکن دریافتی منقضی شده است'
            ], 400,array($header),JSON_UNESCAPED_UNICODE);

            // if token decode is not true
        } catch(Exception $e) {
            return response()->json([
                'خطا' => 'در پردازش توکن مشکلی وجود دارد'
            ], 400,array($header),JSON_UNESCAPED_UNICODE);
        }
       
        // find logged in user with plans
        $user = User::with(['plans'=>function($query){
            $query->select('id','plan_id','user_id','expireTime')
            ->with('plan')->get();
        }])->find($credentials->sub);

        
        // Now let's put the user in the request class so that you can grab it from there
        $request->auth = $user;

        $thisUser   =   $user;
        $now        =   Carbon::now();
        $diff       =   $user->created_at->diffInDays($now);

        // check user free trial and when user register time is more than 7
        // then change freeTime field to False
        if($diff > 7){
            $user->update([
                'freeTime'  =>  False
            ]);
        }

        // check user plan expire
        foreach($user->plans as $plan){
            $planExpireTime = Carbon::parse($plan->expireTime);
            $diffPlan = $planExpireTime->diffForHumans($now); 

            if(strpos($diffPlan, 'before') == True){
                
                'App\PlanUserExpire'::create([
                    'type'          =>  $plan->type,
                    'plan_id'       =>  $plan->plan_id,
                    'user_id'       =>  $plan->user_id,
                    'expireTime'    =>  $plan->expireTime,
                ]);
               
                $result ='App\PlanUser'::destroy($plan->id);
            } 


            
            
        }
        return response()->json($thisUser,200, array($header),JSON_UNESCAPED_UNICODE);
    }


    /** 
     * @Author: Mohsen bagheri 
     * @Date: 2020-08-23 00:46:58 
     * @Desc: User guide check
     */
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


    /** 
     * @Author: Mohsen bagheri 
     * @Date: 2020-08-23 00:47:18 
     * @Desc: Admin login
     */
    public function admin_login(Request $req){

        $user_status = 'App\AdminUser'::where('username',$req->username)->exists();

        // if username dosent exists
        if(!$user_status){
            return redirect('/admin-login');
        }

        // find user by username and set the custom session for authentication
        $user = 'App\AdminUser'::where('username',$req->username)->firstOrFail();
        if (Hash::check($req->pass, $user->password)) {
            $_SESSION['user_id'] = $user->id;
            return redirect('/admin');
        }else{
            return redirect('/admin-login');
        }
    }


}
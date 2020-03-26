<?php
namespace App\Http\Controllers\IDPay;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\User;
use App\Plan;
use App\PlanUser;

class IDPayController extends Controller
{
    
    public function transaction(Request $req, $user_id, $plan_id) {
      
      $_SESSION["user_id"] =  $user_id;


  
      $user    =   User::findOrFail($user_id);
      $plan    =   Plan::findOrFail($plan_id);



      $params = array(
        'order_id'  => $plan->id,
        'amount'    => 50000,
        'name'      => $user->fullName,
        'phone'     => $user->phoneNumber,
        'mail'      => 'my@site.com',
        'desc'      => $plan->type,
        'callback'  => 'https://app.utsignal.com/idPays/successfull_pay',
        'reseller'  => null,
      );
      
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment');
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'X-API-KEY: 8986a61e-805d-4061-ae26-df9e61441dcc'
      ));
      
      $result = curl_exec($ch);
      curl_close($ch);

      return $result;
            
          
    }


    public function successfull_pay(Request $req) {


        
        $callback = array(
            "status"            =>  $req->status,
            "track_id"          =>  $req->track_id,
            "id_pay_unique_id"  =>  $req->id,
            "order_id"          =>  $req->order_id,
            "amount"            =>  $req->amount,
            "card_number"       =>  $req->card_no,
            "hashed_card"       =>  $req->hashed_card_no,
            "date"              =>  $req->date
        );
    
          //   
          $header = ['Content-Type' => 'application/json;charset=utf8'];
          if($req->status == 100) {
    
            return $this->store_plan($callback);
          }
          
          elseif($req->status == 10) {
            
            $this->verify_tracking($req);
            // var_dump($result);
            return $this->store_plan($callback);            
          }
          else{  
            return response()
              ->json('متاسفانه پرداخت ناموفق بود',200,
              array($header),JSON_UNESCAPED_UNICODE);
          }

     

    }
    
    public function verify_tracking($req) {
        
            $params = array(
              'id' => $req->id,
              'order_id' => $req->order_id,
            );
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment/verify');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json',
              'X-API-KEY: 8986a61e-805d-4061-ae26-df9e61441dcc'
            ));
            
            $result = curl_exec($ch);
            curl_close($ch);
            
    }
    
    public function store_plan($callback) {
    
          $plan = Plan::findOrFail($callback['order_id']);
          $expireTime = Carbon::now()->addDays($plan->expire_day);
          
    
          $user_id = $_SESSION["user_id"];
          $user = User::findOrFail(75);
          $user->update(['freeTime'=>False]);
    
          PlanUser::create([
              'type'            =>  $plan->type,
              'plan_id'         =>  $plan->id,
              'user_id'         =>  $user->id,
              'expireTime'      =>  $expireTime,
              'track_id'        =>  $callback['track_id'],
              'id_pay_unique_id'=>  $callback['id_pay_unique_id'],
              'card_number'     =>  $callback['card_number'],
              'hashed_card'     =>  $callback['hashed_card'],
    
    
          ]);
          session_destroy($_SESSION['user_id']);
          return response()
            ->json('پرداخت شما موفقیت آمیز بود',200,
            array($header),JSON_UNESCAPED_UNICODE);
    
    
        }
        
        
        
        public function find_user_with_token($token) {
            
            
          
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
       
         $user = User::find($credentials->sub);
        return $user->id;
        
        
        }


}

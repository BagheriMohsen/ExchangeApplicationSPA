<?php

namespace App\Http\Controllers\OneSignal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OneSignalController extends Controller
{

  /*
  |--------------------------------------------------------------------------
  | Take App Token
  |--------------------------------------------------------------------------
  */
  public function take_app_token(Request $req, $user_id) {

    $user = "App\User"::findOrFail($user_id);

    $user->update(['api_key'=>$req->api_key]);

    return response()->json("its done !");

  }
  /*
  |--------------------------------------------------------------------------
  | User Panel Routes
  |--------------------------------------------------------------------------
  */
  public function sendMessage($users){
      $content = array(
        "en" => 'English Message'
        );

      $users_app_id = array();

      foreach($users as $user) {
          $users_app_id[] = $user->api_key;
      }


      $fields = array(
        'app_id' => "5eb5a37e-b458-11e3-ac11-000c2940e62c",
        'include_player_ids' => array($app_ids),
        'data' => array("foo" => "bar"),
        'contents' => $content
      );
      
      $fields = json_encode($fields);
        print("\nJSON sent:\n");
        print($fields);
      
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ch, CURLOPT_HEADER, FALSE);
      curl_setopt($ch, CURLOPT_POST, TRUE);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  
      $response = curl_exec($ch);
      curl_close($ch);
      
      return $response;
    }
      
    


}

<?php

namespace App\Http\Controllers\FCM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class FcmController extends Controller
{
    public function send_notif() {
        
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder('my title');
        $notificationBuilder->setBody('Hello world')
                            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJsdW1lbi1qd3QiLCJzdWIiOjE3LCJpYXQiOjE1ODI0NTg4NzgsImV4cCI6MTYxMzk5NDg3OH0.xMqz3wMWcGgiQe_MPv836EnRhIop3ayVi2ZxuNYvPxo";
       
        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);
        
        $success    =   $downstreamResponse->numberSuccess();
        $failure    =   $downstreamResponse->numberFailure();
        $modify     =   $downstreamResponse->numberModification();
      
        return response()->json([
            'success    number :'  =>  $success,
            'failure    number :'  =>  $failure,
            'modify     number :'   =>  $modify
        ]);

    }

    public function take_token(Request $req) {
        return response()->json([
            'messsage'      =>  'token save',
            'token is :'    =>  $req->token
        ]);
    }

}

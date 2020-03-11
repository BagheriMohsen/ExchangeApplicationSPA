<?php

namespace App\Http\Controllers\FCM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use LaravelFCM\Message\Topics;

class FcmController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Send Notification
    |--------------------------------------------------------------------------
    */
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

        $token = "e67DTUwiBXeqrKmB8b_Teb:APA91bGIR6Wz2WLHBZ7PF2XIxo-TsWA7wnPo3ynX5UXJwbrzIzEoyAPieMcJ5uG3cK60Rzo3oYr6QJDrRrBJwM5zbgZp_VOr7Fz7VRWtR9lxjJPeHZz15UweZTIKoSpu93Age_70aUnU";
       
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

    /*
    |--------------------------------------------------------------------------
    | Send Notification to topic
    |--------------------------------------------------------------------------
    */
    public function send_notif_topic($body,$title) {


        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder->setBody($body)
                            ->setSound('default');

        $notification = $notificationBuilder->build();

        $topic = new Topics();
        $topic->topic('allDevices');

        $topicResponse = FCM::sendToTopic($topic, null, $notification, null);

        echo $topicResponse->isSuccess();
        echo $topicResponse->shouldRetry();
        echo $topicResponse->error();

        
    }


    public function take_token(Request $req) {
        app('db')->table('tokens')->insert([
            'token'=>$req->token
        ]);
    }


    public function send_notif_with_php($users , $title , $body) {
        $url = "https://fcm.googleapis.com/fcm/send";
    
        $tokens = array();

        foreach( $users as $user ) {
            $tokens[] = $user->api_key;
        }
        

        $image = base_path()."/img/logo-for-splash-screen.png";

        $serverKey = 'AAAAWFyvqJk:APA91bHUHAGKsvl-2SM5G34-RJYJOCHNWN2-zbwQLAKm1bOxFp6Lpd-AemvClgJUbzsGb-_-8x2DVUfW9_PqpFvA_v3lCRrO4ulP-prB75uCqXDV-yCLu1m4S8hGjzvgX2V2pw4JEHya';

        $notification = array(
            'title'         =>  $title ,
            'body'          =>  $body,
            "icon"          =>  "ic_launcher",
            'sound'         =>  'default',
            'badge'         =>  '1',
            'click_action'  =>  '',
            'image'         =>  $image
        );

        $data = array(
            'image' => $title 
        );

        $arrayToSend = array(
            'registration_ids'  =>  $tokens,
             'notification'     =>  $notification,
             "data"             =>  $data,
             'priority'         =>  'high'
        );
        $json = json_encode($arrayToSend);
        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: key='. $serverKey;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
        //Send the request
        $response = curl_exec($ch);
        //Close request
        if ($response === FALSE) {
        die('FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);

    }



}

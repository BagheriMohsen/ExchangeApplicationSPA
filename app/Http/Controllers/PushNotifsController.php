<?php

namespace App\Http\Controllers;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Carbon\Carbon;
class PushNotifsController extends Controller
{


    public function send_for_push($title_text,$body_text,$uri){
        
        $header = ['Content-Type' => 'application/json;charset=utf8'];
        
        /*******************    Create Push Notif   ***************/

        
        $client = new Client();
       
        $uri = 'https://app.najva.com/api/v1/notifications/';//url for store notif to najva table
        $body = array(
            "api_key"=> "e6b6f3a2-7ecb-4faa-978e-e827ff85f55b",//our najva api-key
            "title"=> $title_text,
            "body"=> $body_text,
            "url"=> $uri,
            'onclick_action'=>'open-app',
            "sent_time"=> "2020-1-24T22:55:00"
           
        );
        
        $body = json_encode($body,JSON_UNESCAPED_UNICODE);

        $res = $client->request('POST',$uri,
        [
            'headers'=> [
                'Authorization' => 'Token b72b5df05b96b314319b57d074c8c9e6c1830974',//our najva token
                'Content-Type'  => 'application/json'

            ],
            'body'=>$body,

        ]
        
        );
        $res = $res->getBody()->getContents();//store data from guzzle
        $res = json_decode($res);
        $notif_id = $res->result->id;//store notification id from najva notif table


        /******************     Create Token    ********************/


        $uri = 'https://auth2.yektanet.com/api/v1/token/access/?rt=3tjDwBpeH92Y5Jd2yiT7gXdsOKjr4ZsUlLvY1UCIapQ';
        $res = $client->request('GET',$uri);//store token from najva
        $res = $res->getBody()->getContents();
        $res = json_decode($res);
        $token = $res->token;


        /******************     Send Notif    ********************/


        // send notif 
        $uri = 'https://app.najva.com/api/v2/website/9584/notification/'.$notif_id.'/send';
        $JWT = 'JWT '.$token;

        $res = $client->request('POST',$uri,//send notification
        [
            'headers'=> [
                'Authorization' => $JWT,
                'Content-Type'  => 'application/json'

            ]
        ]
        
        );
      
        $res = $res->getBody()->getContents();
        $res = json_decode($res);

        return response()->json('نوتیفیکیشن ارسال شد',200, array($header),JSON_UNESCAPED_UNICODE);

        
    }


    public function call_python(){
      
        $path = '/usr/bin/python3.7 /opt/lampp/htdocs/python-http-request/index.py';
        $result = shell_exec($path);

        echo $result;
    }

}

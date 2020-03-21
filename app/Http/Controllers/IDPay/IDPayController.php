<?php

namespace App\Http\Controllers\IDPay;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IDPayController extends Controller
{
    
    public function transaction() {

        $params = array(
            'order_id' => '101',
            'amount' => 1000,
            'name' => 'محسن باقری',
            'phone' => '09106769465',
            'mail' => 'unique-trade@gmail.com',
            'desc' => 'توضیحات پرداخت کننده',
            'callback' => 'http://localhost:8000/idPays/successfull_pay',
            'reseller' => null,
          );
          
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, 'https://api.idpay.ir/v1.1/payment');
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'X-API-KEY: b5a098ee-422b-4f36-8ef8-143a19ef89c9',
            'X-SANDBOX: 1'
          ));
          
          $result = curl_exec($ch);
          curl_close($ch);
     
          return $result;

          
          
    }


    public function successfull_pay(Request $req) {

         $callback = array(
            "status"            =>  $req->status,
            "traching_id"       =>  $req->track_id,
            "id pay unique_id"  =>  $req->id,
            "order_id"          =>  $req->order_id,
            "amount"            =>  $req->amount,
            "card number"       =>  $req->card_no,
            "hashed card"       =>  $req->hashed_card_no,
            "data"              =>  $req->date
         );

         return $callback;


    }


}

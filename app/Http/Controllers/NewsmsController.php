<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsmsController extends Controller
{
    
    function techno_bulk_sms($sender_id,$apiKey,$mobileNo,$message)
    {
        $url = 'https://24smsbd.com/api/bulkSmsApi';
        $data = array('sender_id' => $sender_id,
         'apiKey' => $apiKey,
         'mobileNo' => $mobileNo,
         'message' =>$message	
         );
        
         $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);     
            $output = curl_exec($curl);
            curl_close($curl);
        
            return $output;
    }
}

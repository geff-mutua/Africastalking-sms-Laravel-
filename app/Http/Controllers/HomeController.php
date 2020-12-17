<?php

namespace App\Http\Controllers;
use AfricasTalking\SDK\AfricasTalking;
use App\Misc\Constants;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //install the composer sdk for africas talking in your projest
    //*composer require africastalking/africastalking*
    //create a custom class that you set up the api keys and username, or pass them directly *Misc/Constants*

        public function sendPaymentNotification(){

            $sms_recipients="0712345648";//empty string
            $username = Constants::$username;
            $apiKey   = Constants::$apiKey;
            $from       = Constants::$from;
            // dd($apiKey);

            $AT       = new AfricasTalking($username, $apiKey);
            // // Get one of the services
            $recipients="";
            $sms      = $AT->sms();
            //user has a valid mobile number
            $phone = substr($sms_recipients,1);
            $recipients='+254'.$phone;//$data['phone'];//'+254712345678'
            // dd($recipients);

            // // Set the numbers you want to send to in international format
            
            // // Set your message
            $message    = "Testing SMS.";

            // // Set your shortCode or senderId
           
            // Get one of the services
            try {
                // Thats it, hit send and we'll take care of the rest
                $result = $sms->send([
                    'to'      => $recipients,
                    'message' => $message,
                    'from'    => $from
                ]);

                print_r($result);
                    
            } catch (Exception $e) {
                //echo "Error: ".$e->getMessage();
                $result=$e->getMessage();
                print_r($result);
            }

        
    }
}

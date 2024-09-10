<?php 


namespace App\Libraries;

use App\Libraries\Interfaces\PaymentInterface;


class Payment 
{

    public function pay(PaymentInterface $payment){

        $payment->pay();
        
    }


}
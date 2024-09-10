<?php 


namespace App\Libraries;

use App\Libraries\Interfaces\PaymentInterface;


class PaymentPaypal implements PaymentInterface
{

    public function pay(){

        var_dump('paid with Paypal');

    }


}
<?php 


namespace App\Libraries;

use App\Libraries\Interfaces\PaymentInterface;


class PaymentPagseguro implements PaymentInterface
{

    public function pay(){

        var_dump('paid with Pagseguro');

    }


}
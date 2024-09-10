<?php

namespace Config;

use App\Libraries\Interfaces\PaymentInterface;
use App\Libraries\Payment;
use App\Libraries\PaymentPagseguro;
use App\Libraries\PaymentPaypal;
use CodeIgniter\Events\Events;
use CodeIgniter\Exceptions\FrameworkException;

/*
 * --------------------------------------------------------------------
 * Application Events
 * --------------------------------------------------------------------
 * Events allow you to tap into the execution of the program without
 * modifying or extending core files. This file provides a central
 * location to define your events, though they can always be added
 * at run-time, also, if needed.
 *
 * You create code that can execute by subscribing to events with
 * the 'on()' method. This accepts any form of callable, including
 * Closures, that will be executed when the event is triggered.
 *
 * Example:
 *      Events::on('create', [$myInstance, 'myMethod']);
 */

Events::on('pre_system', static function () {
    if (ENVIRONMENT !== 'testing') {
        if (ini_get('zlib.output_compression')) {
            throw FrameworkException::forEnabledZlibOutputCompression();
        }

        while (ob_get_level() > 0) {
            ob_end_flush();
        }

        ob_start(static fn ($buffer) => $buffer);
    }

    /*
     * --------------------------------------------------------------------
     * Debug Toolbar Listeners.
     * --------------------------------------------------------------------
     * If you delete, they will no longer be collected.
     */
    if (CI_DEBUG && ! is_cli()) {
        Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect');
        Services::toolbar()->respond();
    }
});


/* Events::on('post_system',function(){

    var_dump('SEGUNDO');

});

Events::on('post_system',function(){

    var_dump('PRIMEIRO');

}, Events::PRIORITY_HIGH);

Events::on('email_send', function($array){

    var_dump($array);

});

Events::on('payment', function(PaymentInterface $paymentInterface){

    $payment = new Payment;
    $payment->pay($paymentInterface);

}); */
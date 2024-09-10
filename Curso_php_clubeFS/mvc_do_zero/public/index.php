<?php 

require './bootstrap.php';

use App\Classes\Uri;
use Core\Controller;
use Core\Method;
use Core\Parameters;


try{
    $controller = new Controller;
    $controller = $controller->load();

    $method = new Method;
    $method = $method->load($controller);

    $paarameters = new Parameters();
    $paarameters = $paarameters->load();

    $controller->$method($paarameters);

}catch(\Exception $e){
    dd($e->getMessage());
}


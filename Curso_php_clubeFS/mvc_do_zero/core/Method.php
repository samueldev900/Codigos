<?php


namespace Core;

use App\Classes\Uri;
use App\Classes\Exceptions\MethodNotExistException;

class Method
{

    private $uri;

    public function __construct(){

        $this->uri = Uri::uri();
    }

    public function load($controller)
    {
        $method = $this->getMethod();

        if(!method_exists($controller, $method)){
            throw new MethodNotExistException("Esse methodo não existe:  {$method}");
        }

        return $method;
    }

    public function getMethod(){

        if(substr_count($this->uri, '/') > 1)
        {   

            list($controller,$method) = array_values(array_filter(explode('/', $this->uri)));;
            return $method;

        }

        return 'index';
    }
}
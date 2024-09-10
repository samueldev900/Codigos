<?php

namespace App\Classes;

class Crud
{

    public string $field;

    public function read(){

        var_dump($this->field);

    }

    public function delete(){

            return "deletando";
    }
}
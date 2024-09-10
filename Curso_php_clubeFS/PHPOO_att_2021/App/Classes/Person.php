<?php

namespace App\Classes;

class Person
{


    public function __construct(public string $name, public string $email)
    {


    }

    public function info()
    {
        return "Meu nome é $this->name e meu email é $this->email";
    }

    public function teste()
    {

    }
}
<?php

namespace App\Classes;

class Login{

    //public string $email;
    //public string $password;

    public function auth(Crud $crud):string|int
    {

        return $crud->delete();

    }

    
}
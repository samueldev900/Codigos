<?php

namespace App\Classes;

class Abajur extends Product
{
    public bool $isOn = false;

    public function execute():string 
    {
        return 'O produto e um abajur com o nome' . $this->name;
    }
}
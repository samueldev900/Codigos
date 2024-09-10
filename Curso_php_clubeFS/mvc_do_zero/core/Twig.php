<?php 

namespace Core;


class Twig
{
    private $twig;
    private $function = [];


    public function load()
    {

        $this->twig = new \Twig\Environment($this->loadViews(), [

            'debug' => true,
            'cache' => '/cache',
            'auto_reload' => true,
        
        ]);
        
    }

    private function loadViews()
    {
        return new \Twig_Loader_Filesystem('../app/views');
    }
}
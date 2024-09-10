<?php

namespace App\Controllers\Portal;
use App\Controllers\ContainerController;


class CursoController extends ContainerController
{
    public function show($request){
        $this->view([
            'curso' => 'PHP MVC'
        ], 'portal/cursos');
    }
}



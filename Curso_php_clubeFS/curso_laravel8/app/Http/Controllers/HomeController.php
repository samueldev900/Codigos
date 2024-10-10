<?php 

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Support\Facades\View as FacadesView;

class HomeController
{
    public function index()
    {
        //return view('welcome');
        return view('home',[
            //'title' => 'Laravel'
        ]);
    }

    public function show(){
        
    }
    public function edit(){
        
    }
    public function update(){
        
    }
    public function create(){
        
    }
    public function store(){
        
    }
    public function destroy(){
        
    }
}
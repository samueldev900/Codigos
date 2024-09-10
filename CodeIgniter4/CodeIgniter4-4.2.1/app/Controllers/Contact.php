<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Debug\Toolbar\Collectors\Events;

class Contact extends Controller{
    public function index(){

        $data = [

            'title' => 'CodeIgniter4',
            'name' => 'Samuel'

        ];

       
        return view('contact',$data);
  /*       echo view('partials/header',$data);
        echo view('contact');
        echo view('partials/footer'); */
    }

    public function edit(){
        //var_dump($param1, $param2);
        var_dump('Hello EDIT');
    }

    public function store(){
        $validation = false;
        if(!$validation){
            //return redirect()->back();
            //return redirect()->route('product');
           \CodeIgniter\Events\Events::trigger('email_send',['email@gmail.com', 'assunto teste']);
        }
        //return $this->response->setJSON('stored')->setStatusCode(200);

    }
}
<?php

namespace App\Controllers;

use App\Libraries\Payment;

use App\Libraries\PaymentPagseguro;
use App\Libraries\PaymentPaypal;
use CodeIgniter\Config\Services;
use CodeIgniter\Events\Events;
use Config\Database;

class Home extends BaseController
{ 
    public function index()
    {   


        $db = \Config\Database::connect();

        $data = [
            'nome' => 'samuelOliveira',
            'email' => 'samuel@teste.com',
            'senha' => password_hash('86375297', PASSWORD_DEFAULT)
        ];

        $interted = $db->table('users')->insert($data);

        var_dump($interted);

        //$builder = $db->table('users');
        //$users = $builder->select('id,nome')->like('nome', 'samuel', 'both')->get();
        //var_dump($users->getResult());




        //$auth1 = Services::auth();
        //var_dump($auth1);
        //Events::trigger('payment', new PaymentPaypal);
        //die();
        //helper(['array','teste','html']);
        //var_dump(strtoupper($this->request->getMethod()));
        
/*         $db = db_connect();
        $sql = "SELECT * FROM users WHERE id > ?";
        $result = $db->query($sql, [
            10,
        ]); */

/*         $db = db_connect();
        $sql = "DELETE FROM users WHERE id = :id:";
        $result = $db->query($sql, [
            'id' => '21',
        ]);

       $db = db_connect();
        $sql = "UPDATE users SET email = :email: WHERE id = :id:";
        $result = $db->query($sql, [
            'id' => '22',
            'email' => 'samueloliveira900@gmail.com',
        ]);
        //var_dump($result

        $db = db_connect();
        $sql = "INSERT INTO users (nome, email, senha)
        VALUES (:nome:, :email:, :senha:) ";
        $result = $db->query($sql, [
            'nome' => 'samuel',
            'email' => 'samueloliveira900@gmail.com',
            'senha' => password_hash('Samuel100%', PASSWORD_DEFAULT)
        ]); */
        //var_dump($result->getResultObject());
        //var_dump($result->getResultObject());

        //return view('home');
    }
}
 
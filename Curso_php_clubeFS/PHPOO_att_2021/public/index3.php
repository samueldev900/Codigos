<?php
declare(strict_types=1);

use FTP\Connection;

require "./vendor/autoload.php";


class Cart
{
    public function add($product): void
    {
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        }

        !isset($_SESSION['cart'][$product]) ?
        $_SESSION['cart'][$product] = 1 :
        $_SESSION['cart'][$product] ++;
        
    }

    public function clear(): void
    {
        if(count($this->cart()) > 0)
            unset($_SESSION['cart']);
    }

    public function cart(): array
    {
        if(isset($_SESSION['cart'])){
            return $_SESSION['cart'];
        }
        return [];
    }
}


$cart = new Cart();

$cart->add('product');
$cart->clear();
var_dump($cart->cart());
interface TesteInterface
{
    public function executeTeste():string;
}

class Teste
{
    public function execute(TesteInterface $testeInterface): string
    {
        return $testeInterface->executeTeste();
    }

}

class Teste2 implements TesteInterface
{
    public function executeTeste(): string
    {
        return 'execute teste 2';
    }
}

class Teste3 implements TesteInterface
{
    public function executeTeste(): string
    {
        return 'execute Teste3';
    }
}

$teste = new Teste();
var_dump($teste->execute(new Teste2));


abstract class Checkout
{
    abstract public function pay($payment):array;
}

class PaypalCheckout extends Checkout
{
    public function pay($payment):array
    {
        return [];
    }
}


class PagSeguroCheckout extends Checkout
{
    public function pay($payment):array
    {
        return [];
    }
}


class Teste
{
    public function t($param1, $param2):string
    {
        return 'teste na classe pai';
    }
}


class TesteSub extends Teste
{
    public function t($param1, $param2):string
    {
        return 'teste na classe filha';
    }

}



abstract class Model
{
    public function all(){

        return 'all';
        
    }
    
    public function update(){
        
        return 'update';
    }
    
    public function delete(){
        
        return 'delete';
    }

    abstract public function setEntity(string $entity): string;

}


class User extends Model{

    public function setEntity(string $entity): string
    {
        return 'd';
    }   

}




/**
 * 
 * Classe de Conecction
 * 
 * 
 * @package Classes
 * @author Samuel Oliveira <samueloliveira900@gmail.com>
 * 
 * 
 */
class Connection2
{
    /**
     * Summary of connect
     * @var string
     * 
     */
    private static $connect = null;
    public static function connect()
    {
        try{
            if(!self::$connect){
                self::$connect = new PDO("mysql:host=localhost;dbname=cadastro", "root", "86375297",[
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ]);
            }
            return self::$connect;
        }catch(PDOException $e){
            var_dump($e->getMessage());
        }

    }
}

class Model
{
    protected $connection;

    public function __construct()
    {
        $this->connection = Connection2::connect();
    }

    public function all()
    {
        $sql = "SELECT * FROM {$this->table}";
        $query = $this->connection->query($sql);
        $query->execute();
        return $query->fetchAll();
    }
}

class User extends Model
{
    protected $table = 'users';
}

$user = new User();

var_dump($user->all());

/* class Product
{

    private $priceProduct;
    private $discontProduct = 10;


    public function getPriceProduct()
    {
        return $this->priceProduct;
    }


    public function setPriceProduct($priceProduct)
    {
        $this->priceProduct = $priceProduct - $this->discontProduct;

        return $this;
    }


    public function getDiscontProduct()
    {
        return $this->discontProduct;
    }


    public function setDiscontProduct($discontProduct)
    {
        $this->discontProduct = $discontProduct;

        return $this;
    }


}



$product = new Product();

$product->setPriceProduct(20);

echo $product->getPriceProduct();
 */



/* use App\Model\User;

use App\Classes\User as ModelUser;



$user = new User;

$userModel = new ModelUser; */

/* use App\Classes\{Book, Crud, Login};


$book = new Book;

$crud = new Crud;

$login = new Login; */



/* class Template 
{
    const PATH = 'app/views';


    public static function load(){
        return self::PATH;
    }
}

echo Template::load();
 */

/* 
class User
{
    public static function info()
    {
        return __CLASS__;
    }
}

class User2 extends User
{
    public static function info()
    {
        return __CLASS__;
    }

    public static function teste()
    {
        var_dump(static::info());
        var_dump(self::info());
        var_dump(parent::info());
    }

}

echo User2::teste(); */


/* class Person
{
    public static string $name = 'Samuel';
    public static function info()
    {
        return 'person info';
    }

    public function data()
    {
        return 'data classe pai';
    }
}

class User extends Person
{
    public function teste()
    {
        return parent::data();
    }
}


$user = new User;

echo (new User)->teste();
 */

/* class User
{
    public static function info()
    {
        return __CLASS__;
    }

}

class User2 extends User
{

    public static function info()
    {
        return __CLASS__;
    }

    public function teste()
    {
        return parent::info();
    }

}

$user2 = new User2;

echo $user2->teste();
 */



/* class User
{
    public static string $name;

    public static function userInfo()
    {
        return 'teste modo estático';
    }
}

User::$name = 'Samuel';
echo User::userInfo();
echo User::$name;
 */

/* class User 
{
    public string $name;
    public int $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getUserInfo()
    {
        return $this->name . ' ' . $this->age;
    }
}

class User2 extends User
{
    public function __construct(string $name, int $age){
        //var_dump(__CLASS__);
        parent::__construct($name,$age);
    }

    
}

$user2 = new User2('Samuel' , 24); */

//echo $user2->getUserInfo();




/* use App\Classes\Person;


$person = new Person('Samuel de Oliveira', 'samueloliveira900@gmail.com');
echo $person->info(); */


/* use App\Classes\Abajur;
use App\Classes\Book;


$book = new Book;
$book->name = 'Meu Livro';
$book->description = 'Aute in eiusmod ad aliqua ullamco eiusmod cillum aliqua velit.';
$book->pages = 300;
$book->author = 'Samuel de Oliveira';

$abajur = new Abajur;
$abajur->name = 'Abajur';
$abajur->description = 'Aliquip incididunt duis et ea.';
$abajur->isOn = true;

echo json_encode($abajur->execute()); */
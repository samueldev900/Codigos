<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductStoreController;
use App\Http\Controllers\ProtectedController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserStoreController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class, 'index'])->name('home');


Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login.post');
Route::get('/signup', [SignUpController::class, 'index'])->name('signup.index');


/* Route::post('/login',[LoginController::class, 'store'])->name('login.store');
Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::get('/protected',[ProtectedController::class, 'index'])->name('protected');
Route::get('/protected/create',[ProtectedController::class, 'create'])->name('protected.create');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class,'index'])->name('admin.home')->withoutMiddleware('auth');
    Route::get('/clients', [ClientController::class,'index'])->name('admin.client');
});
 */

/* Route::get('/user/create',[UserController::class, 'create']);
Route::post('/user', UserStoreController::class);
Route::resource('/product', ProductController::class)->except('store');
Route::post('/product', ProductStoreController::class)->name('product.store'); */


/* Route::resource('user', UserController::class); */
/* Route::get('/user/create',[UserController::class, 'create'])->name('user.create');
Route::get('/user/{id}',[UserController::class, 'show'])->name('user.edit');
Route::get('/user/{id}/edit',[UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class,'update'])->name('user.update');
Route::post('/user', [UserController::class,'store'])->name('user.store');
Route::delete('/user/{id}', [UserController::class,'destroy'])->name('user.destroy');
 */

/* Route::post('/login', function(){
    return redirect('/')->withInput()->with('message', 'Error ao fazer login');
})->name('login');
 */
/* Route::get('product/{id}', [ProductController::class, 'edit'])->name('product.edit');

Route::get('/teste', function(){

    return redirect()->away('http://www.google.com');

})->name('teste');
 */
 
/* Route::get('/', function(){
    dd(route('home'));
    //return view('welcome');
})->name('home');


Route::get('/contact', function(){
    dd('contact');
})->name('contatct');


Route::prefix('blog')->group(function(){

    Route::get('/', function(){
        dd('blog');
    });

    Route::get('/post/{slug}', function($slug){
        dd($slug);
    });

});

Route::get('/user/{name}/age/{age}', function($name,$age){
    dd("Nome: $name, idade: $age");
})->where('name','[a-zA-Z\-]+')->whereNumber('age');

Route::get('/contact/{id}', function($id){
    dd('contact ' . $id);
});

Route::match(['get','post'], '/user/teste', function(){

    dd('teste');

});

Route::post('/create/user', function(){
    dd('create');
});

Route::put('/update/user', function(){
    dd('update');
});

Route::delete('/delete/user', function(){
    dd('delete');
}); */
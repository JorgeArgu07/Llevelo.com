<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//DIEGO
Route::get('/carrito', "PagoController@Pago");


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ProductosPublicados', 'ProductoController@viewProductosPublicadosUsuario');

// Route::get('/', function () {
// 	return view('welcome');
// });
Route::get('/','Index@inicio');
// Route::get('/buscar','Index@buscar');
Route::get('/producto','Index@productos');
Route::get('/categorias','Index@categorias');


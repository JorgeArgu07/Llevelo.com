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

Route::get('/home', 'HomeController@index')->name('ho
me');
route::get('/buscados', 'buscados@vistaMasbuscados');
route::get('/pedidos', 'controllerpedidos@masPedidos');
route::get('/consulta','controllerpedidos@consulta');
route::get('/productos', 'controllerproductos@masProductos');
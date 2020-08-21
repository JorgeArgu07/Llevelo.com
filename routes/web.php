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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ProductosPublicados', 'ProductoController@viewProductosPublicadosUsuario');
Route::get('/PublicarProducto', 'ProductoController@viewPublicarProducto');
Route::post('/setProducto', 'ProductoController@setProducto');
Route::post('setEstadoProducto','ProductoController@setEstadoProducto');
Route::post('/updateProducto','ProductoController@updateProducto');
Route::post('/ModificarProducto', 'ProductoController@viewModificarProducto');
Route::get('/buscarProducto', 'ProductoController@buscarProducto');
// Route::get('/', function () {
// 	return view('welcome');
// });
Route::get('/','Index@inicio');
// Route::get('/buscar','Index@buscar');
Route::get('/producto','Index@productos');
Route::get('/categorias','Index@categorias');


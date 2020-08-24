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


Route::get('/hola', function () {
    return view('welcome');

    $user=Auth::user();
if ($user->vendedor()){
    echo "Eres vendedor";
}
else{
    echo 'eres comprador';
}
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//DIEGO
#Route::get('/carrito', "PagoController@Pago");
Route::get('/carrito', "PagoController@carrito");
Route::post('/productoaeliminar','PagoController@productoaeliminar');
Route::post('/eliminarproducto','PagoController@eliminarproducto');
Route::post('/eliminarcarrito','PagoController@eliminarcarrito');

Route::post('/agregarmarca','PagoController@agregar');
Route::post('/actualizarcantidad','PagoController@actualizar');
Route::post('/editar','PagoController@editar');

 

//route::get('/productos', 'PagoController@Productos');
 


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ProductosPublicados', 'ProductoController@viewProductosPublicadosUsuario');
Route::get('/PublicarProducto', 'ProductoController@viewPublicarProducto');
Route::post('/setProducto', 'ProductoController@setProducto');
Route::post('setEstadoProducto','ProductoController@setEstadoProducto');
Route::post('/updateProducto','ProductoController@updateProducto');
Route::post('/ModificarProducto', 'ProductoController@viewModificarProducto');
Route::get('/buscarProducto', 'ProductoController@buscarProducto');
Route::get('/ProductosVendidos', 'ProductoController@viewProductosVendidos');
Route::post('/setEstadoVendido', 'ProductoController@setEstadoVendido');
Route::get('/getInfoComprador', 'PersonaController@getInfoComprador');

Route::get('/','Index@inicio');
// Route::get('/buscar','Index@buscar');

// Route::post('/categorias','CategoriasController@ViewCategorias');
Route::get('/categorias','CategoriasController@ViewCategorias');

Route::get('/productos','ProductosController@ViewProductos');

// Route::get('/productos','CategoriasController@ViewProductos');



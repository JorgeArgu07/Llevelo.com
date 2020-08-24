<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;
use App\CarritoProducto;
use App\Producto;
use App\Carrito;
use App\Persona;

class CategoriasController extends Controller
{

    function ViewCategorias(Request $request)
    {
        $pro = Producto::all();
        $valor=$request->subject;
        $numero=(int)$valor;
        $productxcat = DB::table('productos')
        ->where([['categorias.id','=',$numero], ['estado','=','activo']])
        ->join('categorias','categorias.id','=','productos.id_categoria')
        ->get();

        $cat=DB::table('categorias')
        ->where('categorias.id','=', $numero)
        ->select('categorias.categoria')
        ->get();
        // dd($productxcat,$cat);
        // dd($cat);
        return view('categorias',compact('productxcat','cat','pro'));

    }

    function CatProductos(Request $request)
    {
    	
    	dd($datos);

    	// $productxcat = DB::table('productos')
    	// ->where('categorias.categoria','=',request()->id)
    	// ->join('productos','categorias.id','=','productos.id_categoria')
    	// ->select('productos.producto','productos.precio','categorias.categoria')
    	// ->get();
    }
    function productos(Request $request)
    {
    $pro = Producto::all();
    $personas = DB::table('carrito_producto')
                ->select('productos.precio','productos.ruta_img' ,'carrito_producto.id','carrito_producto.precio','carrito_producto.cantidad' ,'productos.detalles')
                ->join('productos', 'productos.id', '=', 'carrito_producto.id_producto')
                ->get();
    return view('categorias', compact("pro", "personas"));
    }
    
    
    
    function añadiralcarro(Request $request){
        $producto = Producto::find($request->id);
        $carro = new CarritoProducto();     
        $carro->precio = $producto->precio;
        $carro->cantidad = $producto->cantidad;
        $carro->id_producto = $producto->id;
        $carro->save();
        \Session::flash('eliminado',$carro);
        return $carro;
        
     
     }
     
     function carro(Request $request){
        $edit = Producto::all();
        return $edit;
     }
    
}
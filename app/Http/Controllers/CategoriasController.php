<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoriasController extends Controller
{

    function ViewCategorias(Request $request)
    {
        $valor=$request->subject;
        $numero=(int)$valor;
        $productxcat = DB::table('productos')
        ->where('categorias.id','=',$numero)
        ->join('categorias','categorias.id','=','productos.id_categoria')
        ->select('productos.id','productos.producto','productos.precio','productos.ruta_img','categorias.categoria')
        ->get();

        $cat=DB::table('categorias')
        ->where('categorias.id','=', $numero)
        ->select('categorias.categoria')
        ->get();
        // dd($productxcat,$cat);
        // dd($cat);
        return view('categorias',compact('productxcat','cat'));

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
}

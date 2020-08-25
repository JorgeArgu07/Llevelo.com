<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class controllerproductos extends Controller
{
	
	function masProductos()
	{
		$pedidos=DB::table('personas')
        ->where('personas.nombre','=',"luis")
        ->join('productos','productos.id','=','productos.id_persona')
        ->select('productos.fecha_publicacion','productos.detalles','productos.ruta_img','personas.nombre')
        ->get();
        return view('productos')->with('productos',$productos);
    }
}
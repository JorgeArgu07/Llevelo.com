<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class controllerpedidos extends Controller
{
	
	function masPedidos()
	{
		$pedidos=DB::table('personas')
        ->where('personas.nombre','=',"luis")
        ->join('pedidos','personas.id','=','pedidos.id_persona')
        ->select('pedidos.fecha_pedido','pedidos.subtotal','pedidos.estatus','personas.nombre')
        ->get();
        return view('pedidos')->with('pedidos',$pedidos);

		//$personav =DB::table('personas')
		//->where('personas.nombre','=',"LUIS")
		//->join('vendidos','personas.id','=','vendidos.id_persona')
		//->select('personas.nombre','vendidos.producto')
		//SELECT ('pedidos.fecha_pedido','pedidos.estatus','pedidos.id')
	    //('personas INNER JOIN pedidos ON personas.id = pedidos.id_persona
		//->get();
		//dd($personav);
		//return view('pedidos',compact('personav') );
	}
    
}

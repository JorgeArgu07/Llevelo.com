<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    function ViewProductos(Request $request)
    {
        $num = $request->id;
        $val = (int)$num;
        //dd($request);

        
        $pto = DB::table('productos')->where('id','=',$val)->get();

        //dd($val);
    	return view('productos',compact('pto'));
    }


    function traer_productos(Request $request)
    {
        dd($request);
        // $product=DB::table('productos')
        // ->where('categorias.categoria','=','Juguetes Infantiles')
        // ->join('categorias','productos.id_categoria','=','categorias.id')
        // ->select('productos.producto','productos.precio','categorias.categoria')
        // ->get();
        // // dd($product);
        // return view('productos',compact('product'));
    }

}
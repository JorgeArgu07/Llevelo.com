<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProductosController extends Controller
{
    function ViewProductos(Request $request)
    {
        $num=$request->subject;
        $val=(int)$num;
        
        $pto=DB::table('productos')
        ->where('productos.id','=',$val)
        ->select('productos.producto','productos.precio','productos.detalles','productos.ruta_img','productos.visitas')
        ->get();
        $v=$pto[0]->visitas + 1;
        // dd($v);
        // Actializar vista
        $update = DB::table('productos')->where('productos.id',$val)->update(['visitas'=>$v]);
        

        // dd($val);
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Productos;
use DB;

class Index extends Controller
{
    function inicio()
    {
    	$cate = DB::table('categorias')->get();
    	$cat = $cate->shuffle();
    	// dd($cat->first()->id,$cat->last());
    	$pdo = DB::table('productos')->where([['productos.estado','=','activo'],['categorias.id','=',1]])
    	->join('categorias','categorias.id','productos.id_categoria')
        ->select('productos.id','productos.ruta_img')
        ->get();
    	// dd($pdo);
    	$sh = $pdo->shuffle();
    	$product = [];
    	for ($i=0; $i<3; $i++ ) {

    		array_push($product, $sh[$i]);
    	}
    	$pro = DB::table('productos')->where([['productos.estado','=','activo'],['categorias.id','=',4]])
    	->join('categorias','categorias.id','productos.id_categoria')
        ->select('productos.id','productos.ruta_img')
        ->get();
    	// dd($pro);
    	$s = $pro->shuffle();
    	$produ = [];
    	for ($i=0; $i<3; $i++ ) {

    		array_push($produ, $s[$i]);
    	}
    	return view('inicio',compact('product','produ'));
    }
}

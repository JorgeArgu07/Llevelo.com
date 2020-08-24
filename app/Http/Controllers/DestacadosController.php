<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DestacadosController extends Controller
{
    protected function ViewDestacados()
    {
    	$visitas = DB::table('productos')->orderBy('productos.visitas','desc')->limit(5)->get();
    	return view('destacados',compact('visitas'));
    }
}

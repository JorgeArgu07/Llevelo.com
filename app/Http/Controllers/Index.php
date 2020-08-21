<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Productos;
use DB;

class Index extends Controller
{
    function inicio()
    {
    	return view('inicio');
    }

    // function Paleatorios()
    // {
    // 	$producto = DB::table()
    	
    // }
}

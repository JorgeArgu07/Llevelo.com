<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modelos\Productos;

class Index extends Controller
{
    public function inicio()
    {
    	return view('inicio');
    }

    public function productos()
    {
    	return view('productos');
    }

    public function buscar(Request $request)
    {
    	dd($request);
    }

    public function categorias()
    {
        return view('categorias');
    }
}

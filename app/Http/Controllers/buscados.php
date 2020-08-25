<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class buscados extends Controller
{
    public function vistaMasbuscados()
    {
    	return view('mas_buscados');
    }
}

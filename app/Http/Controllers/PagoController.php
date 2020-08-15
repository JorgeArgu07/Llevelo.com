<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App;
use App\Carrito;
class PagoController extends Controller
{
   

    function Pago(Request $request)
    {
        #$pagos = Carrito::all();
        $pagos = Carrito::sum('subtotal');
        return view('carrito')->with(compact("pagos")); 
    }
    function PagoIndividual(Request $request)
    {
        $indiv = Carrito::all();
        return view('carrito')->with(compact("indiv")); 
    }
}

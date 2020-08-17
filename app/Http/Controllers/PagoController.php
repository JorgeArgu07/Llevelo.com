<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App;
use App\Carrito;
use App\Persona;
class PagoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    function Pago(Request $request)
    {
        $p = Persona::all();
        $persona = Carrito::where('id', $request->id)->with('p')->get();
        $personas = Carrito::all();
        $pagos = Carrito::sum('subtotal');
        return view('carrito')->with(compact("pagos", "personas", "persona", "p")); 
    }
   
        function Personas(Request $request)
        { 
            $personas = Persona::all();
            return view('carrito', compact("personas"));
        }
    

}

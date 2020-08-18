<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App;
use App\CarritoProducto;
use App\Carrito;
use App\Persona;
class PagoController extends Controller
{
    
    function Pago(Request $request)
    {
        
        $ventas = DB::table('carrito_producto')
        ->select(DB::raw('sum(total * cantidad) as ventas'))
        ->groupBy('id')
        ->get();
        $p = Persona::all();
        #$persona = Carrito::where('id', $request->id)->with('p')->get();
        #$personas = Carrito::all();
        #$pagos = Carrito::sum('subtotal');
        #return view('carrito')->with(compact("pagos", "personas", "persona", "p")); 
        $persona = CarritoProducto::where('id', $request->id)->with('p')->get();
        $personas = CarritoProducto::all();
        $pagos = CarritoProducto::sum('total');
        return view('carrito')->with(compact("pagos", "personas", "persona", "p","ventas")); 



    }
   
        function Personas(Request $request)
        { 
            $personas = Persona::all();
            return view('carrito', compact("personas"));
        }
    
     

        function productoaeliminar(Request $request){
           
            $producto = CarritoProducto::all();
            return $producto;
        }
    
        function eliminarproducto(Request $request){
            
            $producto_eli = CarritoProducto::findOrFail($request->id);
            $producto_eli->delete();
           \Session::flash('eliminado',$producto_eli);

            return \Redirect::back();
            
        }

        
        function carritoeliminar(Request $request){
            $vaciar = CarritoProducto::all();
            return $vaciar;
        }
    
        function eliminarcarrito(Request $request){
            $producto_eli = CarritoProducto::truncate();
            #$producto_eli->delete($request->id);
           # \Session::flash('eliminado',$producto_eli);
            return \Redirect::back();
            
        }
        
        function Mostrar(Request $request)
        { 
            $Venta = Carrito::all();
            return view('prueba', compact("Venta"));
        }
        function agregar(Request $request){
            $subtotal = $request->subtotal;
            $subtotal->save();
            \Session::flash($subtotal);
            return \Redirect::back();
        }

        function actualizar(Request $request){
            $editar = CarritoProducto::where('id',$request->id)->update(['cantidad'=>$request->input('cantidad'),]);
            \Session::flash('cantidad',$editar);
            return \Redirect::back();
    
        }

        function actualizarTotal(Request $request){
            $ventas = DB::table('carrito_producto')
            ->select(DB::raw('sum(total * cantidad) as ventas'))
            ->groupBy('id')
            ->get();
        }


}

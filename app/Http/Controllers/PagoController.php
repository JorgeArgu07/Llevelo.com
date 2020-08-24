<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App;
use App\CarritoProducto;
use App\Producto;
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
        
        $ventas = DB::table('carrito_producto')
        ->select(DB::raw('sum(total * cantidad) as ventas'))
       
        ->get();
        
        $p = Persona::all();
        
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
            
            $producto_eli = CarritoProducto::find($request->id);
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
            return \Redirect::back();
            
        }
        
        function Mostrar(Request $request)
        { 
            $Venta = Carrito::with('carrito')->get();
            return $Venta;
        }
      

        function actualizar(Request $request){
          
           $editar = CarritoProducto::find($request->id);
           $editar->cantidad = $request->cantidad;
           $editar->save();
           \Session::flash('eliminado',$editar);
           return $editar;
           
        }
        function editar(Request $request){
            $edit = CarritoProducto::all();
            return $edit;
        }



        function actualizarTotal(Request $request){
            $ventas = DB::table('carrito_producto')
            ->select(DB::raw('sum(total * cantidad) as ventas'))
            ->where('id')
            ->get();
           
        
        }
       
        function carrito(Request $request){
        
            $personas = DB::table('carrito_producto')
            ->select('carrito_producto.cantidad','productos.precio','productos.ruta_img' ,'carrito_producto.id','carrito_producto.total','carrito_producto.cantidad' ,'productos.detalles')
            ->join('productos', 'productos.id', '=', 'carrito_producto.id_producto')
            ->get();
            $ventas = DB::table('carrito_producto')
            ->join('productos', 'productos.id', '=', 'carrito_producto.id_producto') 
            ->select(DB::raw('sum(productos.precio * carrito_producto.cantidad) as ventas'))
            ->get();
            $pagos = CarritoProducto::sum('total');
            $p = Persona::all();
            $persona = CarritoProducto::where('id', $request->id)->get();
           # $personas = CarritoProducto::all();
            
           return view('carrito')->with(compact("pagos", "personas","ventas","persona")); 
        
           #$persona = DB::table('users')
            #->select(DB::raw( 'sum( total * cantidad) as T'),'users.id as id','carrito_producto.total as total','carrito_producto.cantidad as cantidad'  )
            #->join('personas', 'users.id', '=', 'personas.users_id')
            #->join('carrito', 'personas.id', '=','carrito.id_persona')
            #->join('carrito_producto','carrito_producto.id_carrito', '=', 'carrito.id')  
            #->groupBy('users.id', 'carrito_producto.total', 'carrito_producto.cantidad')
            #->where('id_persona','=','1')
            #->get();  
            #return view('carrito')->with(compact('persona')); 
        
        }




 function productos(Request $request)
{
$productos = Producto::all();
$personas = DB::table('carrito_producto')
            ->select('productos.precio','productos.ruta_img' ,'carrito_producto.id','carrito_producto.total','carrito_producto.cantidad' ,'productos.detalles')
            ->join('productos', 'productos.id', '=', 'carrito_producto.id_producto')
            ->get();
return view('prueba', compact("productos", "personas"));
}



function añadiralcarro(Request $request){
    $carro = new CarritoProducto();
    $carro->total = $request->total;
    $carro->cantidad = $request->cantidad;
    $carro->id_producto = $request->id_producto;
    $carro->save();
    \Session::flash('eliminado',$carro);
    return $carro;
    
    
 }
 
 function carro(Request $request){
    $edit = Producto::all();
 return $edit;
 }

 function tipodepago(Request $request)
 {
 $productos = Producto::all();
 $personas = DB::table('productos')
             ->select('productos.id','productos.id_persona')
             ->join('personas', 'productos.id_persona', '=', 'personas.id')
             ->join('vendidos','vendidos.id_persona', '=','personas.id')
             ->get();
          
 return view('pago', compact("productos", "personas"));
 }
 
 
 
 function añadirtipodepago(Request $request){
     $carro = new vendidos();
     $carro->total = $request->total;
     $carro->cantidad = $request->cantidad;
     $carro->id_persona = $request->id_persona;
     $carro->save();
     \Session::flash('eliminado',$carro);
     return $carro;
     
     
  }
  function pagar(Request $request){
    $edit = Producto::all();
    return $edit;
  }
  function agregarequipo(Request $request)
  {
 

    $carro = new Producto();
    $carro->total = $request->total;
    $carro->cantidad = $request->cantidad;
    $carro->id_persona = $request->id_persona;
    $carro->save();
    $carro = Producto::all();
    \Session::flash('equipos',$carro);
    return \Redirect::back();




}

public function agregar()
{
   
    $tipos = DB::table('productos')->get();
    return view('pago', compact('productos'));
}
  
   

}
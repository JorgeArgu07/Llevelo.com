<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App;
use App\CarritoProducto;
use App\Producto;
use App\Carrito;
use App\Persona;
use App\Vendidos;
use App\Deseados;
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
            ->select('productos.producto','carrito_producto.cantidad','productos.precio','productos.ruta_img' ,'carrito_producto.id','carrito_producto.total','carrito_producto.cantidad' ,'productos.detalles')
            ->join('productos', 'productos.id', '=', 'carrito_producto.id_producto')
            ->get();
            $ventas = DB::table('carrito_producto')
            ->select(DB::raw('sum(total * cantidad) as ventas'))
            ->get();
            $pagos = CarritoProducto::sum('total');
            $c = CarritoProducto::all();
            $p = Persona::all();
            $persona = CarritoProducto::where('id', $request->id)->get();
           $prod = DB::table('productos')
           ->select('productos.id','productos.ruta_img','productos.cantidad','productos.precio', 'productos.producto')
           ->join ("carrito_producto" , "carrito_producto.id_producto", "=", "productos.id")
            ->where("productos.id_persona","=",1)
           ->get();
           



              return view('carrito')->with(compact("pagos", "personas","ventas","persona","c","prod")); 
            
            
            
            }
                
        
        function añadiralcarro(Request $request){
            
           $producto = Producto::find($request->id);
           $carro = new Vendidos();  
           $carro->producto = $producto->producto;   
           $carro->precio = $producto->precio;
           $carro->cantidad = $producto->cantidad;
           $carro->id_persona = $producto->id_persona;
           $carro->save(); 
          
        
           // $des = new Deseados();  
           // $des->id_producto = $producto->id;   
           // $des->id_persona = $producto->id_persona;
           // $des->save(); 
            
            \Session::flash('guardado',$carro);
            return $carro; 
            
         
         }
         
         function carro(Request $request){
            $edit = Producto::all();
            return $edit;
         }
 

   

}
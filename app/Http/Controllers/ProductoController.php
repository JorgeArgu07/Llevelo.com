<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function viewProductosPublicadosUsuario(){

        $productos = DB::table('productos')->where('id_persona', 1)->get();

        return view('ProductosPublicados')->with('productos',$productos);
    }
    public function viewPublicarProducto(){
        $categorias = [1=>'Ropa',
        2=>'Telefonía',
        3=>'Informática',
        4=>'Electrónica',
        5=>'Hogar y Electrodomésticos',
        6=>'Juguetes',
        7=>'Deportes',
        8=>'Belleza y Perfumería',
        9=>'Herramientas',
        10=>'Automóvil',
        11=>'Escolar'];

       return view('PublicarProducto')->with('categorias', $categorias); 
    }
    public function setProducto(Request $r){

        //$producto = new Producto();
        
        //dd($r->input('SelectCategoria'));

        $titulo = $r->input('InputTitulo');
        $categoria = $r->input('SelectCategoria');
        $condicion = $r->input('RadiosCondicion');
        $cantidad = $r->input('InputCantidad');
        $precio = $r->input('InputPrecio');
        $imagen = $r->file('InputImagen');
        $extension = $imagen->getClientOriginalExtension();
        $nuevo_nombre = $titulo.'_'.random_int(1,10000).'.'.$extension;
        $imagen->storeAs('public', $nuevo_nombre);
        $ruta_img = 'storage/'.$nuevo_nombre;
        $detalles = $r->input('TextAreaDetalles');

        DB::table('productos')->insert(
            ['producto'=>$titulo,
            'precio'=>$precio,
            'cantidad'=>$cantidad,
            'condicion'=>$condicion,
            'detalles'=>$detalles,
            'ruta_img'=>$ruta_img,
            'id_categoria'=> intval($categoria),
            'id_persona'=>1
            ]
        );

        return redirect('/ProductosPublicados');
    }
    public function viewModificarProducto(Request $r){

        $id = $r->input('id');
        $producto = DB::table('productos')->where('id', $id)->get();

        return view('ModificarProducto', compact('producto'));
    }
    public function updateProducto(Request $r){

        $id = $r->input('id');
        $producto = $r->except('_token');

        //if($r->file('ruta_img')){

            //$imagen = DB::table('productos')->where('id', $id)->select('ruta_img')->get('ruta_img');
            //$imagen = str_replace('/storage', '', $imagen);
            //Storage::delete(dd($imagen));
        //}
        
        DB::table('productos')->where('id', $id)->update($producto);

        return redirect('/ProductosPublicados');
    }
    public function setEstadoProducto(Request $r){

        $id = $r->input('id');
        
        if($r->input('estado')=='activo'){
            DB::table('productos')->where('id', $id)->update(['estado'=>'inactivo']);
        }
        else{
           DB::table('productos')->where('id', $id)->update(['estado'=>'activo']);
        }

        return redirect('/ProductosPublicados');
    }
    public function viewProductosVendidos(){

        $productos = DB::table('vendidos')
        ->join('productos', 'vendidos.id_producto','=','productos.id')
        ->join('personas','productos.id_persona','=','personas.id')->where('personas.id',1)
        ->select('productos.id as id_producto', 'vendidos.id as id_vendido', 'productos.ruta_img as imagen', 'productos.producto as titulo', 'vendidos.created_at as fecha_venta', 'vendidos.cantidad as cantidad', 'vendidos.monto as monto_venta', 'vendidos.estado as estado','vendidos.id_comprador as comprador')
        ->get();

        return view('ProductosVendidos')->with('productos',$productos);
    }
    public function setEstadoVendido(Request $r){

        $id = $r->input('id');
        DB::table('vendidos')->where('id', $id)->update(['estado'=>'entregado']);
    }


    public function buscarProducto(Request $r){
        if($r->ajax()){
            $output="";
            $productos=DB::table('productos')->where('producto','LIKE','%'.$r->search."%")->get();
            if($productos){
                foreach ($productos as $producto) {
                $output.='<div class="row mt-3">
                <div class="col">
                    <div class="card mt-2" id="Producto">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-2 mt-1">
                                    <img src="'.$producto->ruta_img.'" width="80%" class="text-right">
                                </div>
                                <div class="col-3 mt-1">
                                    <h5 class="card-title mt-6">'.$producto->producto.'</h5>
                                    <p class="card-text"><b>Fecha de publicación: </b></p>'.$producto->created_at.'
                                </div>
                                <div class="col-2 mt-2">
                                    <p class="card-text"> <b>Precio: </b> MXN$'.$producto->created_at.'</p>
                                    @if('.$producto->estado.' == "activo" )
                                        <p class="card-text"> <b>Estado: </b> <b style="color: #39d393;">Activo</b> </p>  
                                    @else
                                        <p class="card-text"> <b>Estado: </b> <b style="color: #ff4f20 ">Inactivo</b> </p> 
                                    @endif
                                </div>
                                <div class="col-3 mt-2">
                                    <p class="card-text"> <b>Unidades: </b> '.$producto->cantidad.'</p>
                                    
                                </div>
                               
                                <div class="col-1 mt-4">
                                    
                                    <button class="btn dropdown-toggle btn-warning" type="button" id="dropdownOpciones" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bars"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownOpciones">
                                        <form action="/ModificarProducto" method="post">
                                            @csrf
                                            <input type="text" name="id" hidden value="'.$producto->id.'">
                                            <button class="dropdown-item" type="submit">Modificar Producto</button>
                                        </form>
                                        <form action="" method="POST">
                                            @csrf
                                            <input type="text" name="id" hidden value="'.$producto->id.'">
                                            <button class="dropdown-item" type="submit">Ver Producto</button>
                                        </form>
                                        @if ($producto->estado == "inactivo")
                                        <form action="/setEstadoProducto" method="POST">
                                            @csrf
                                            <input type="text" name="id" hidden value="'.$producto->id.'">
                                            <input type="text" name="estado" hidden value="'.$producto->estado.'">
                                            <button class="dropdown-item" type="submit">Activar Producto</button>
                                        </form>
                                        @else
                                        <form action="/setEstadoProducto" method="POST">
                                            @csrf
                                            <input type="text" name="id" hidden value="'.$producto->id.'">
                                            <input type="text" name="estado" hidden value="'.$producto->estado.'">
                                            <button class="dropdown-item" type="submit">Desactivar Producto</button>
                                        </form>
    
                                        @endif
                                        
                                        
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>                       
                    </div>
                </div>                                       
                </div>    
            </div>';
                }
            }
        }
        return Response($output);

    }
    
}

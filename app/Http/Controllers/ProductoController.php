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

   
}

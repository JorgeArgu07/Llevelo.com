<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonaController extends Controller
{
    public function getInfoComprador(Request $r){
        $id = $r->id;
        $datos = DB::table('personas')
        ->select('nombre','apellidoP','apellidoM', 'correo', 'telefono')
        ->where('id', $id)
        ->get(); 

        return $datos;
    }
}

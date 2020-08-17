<?php

namespace App;
use app\Carrito;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    public $timestamps = false;

    public function producto(){
        return $this->hasMany('App/Producto', 'id_persona');
    }
    public function carrito(){

        return $this->belongsTo(Carrito::class, 'id_persona','id');
    }


}

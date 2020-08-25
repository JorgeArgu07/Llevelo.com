<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deseados extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'deseados';
    public $timestamps = false;

    public function id_persona(){
        return $this->hasMany('App/Persona', 'id_persona');
    }

    public function id_producto(){
        return $this->hasMany('App/Producto', 'id_producto');
    }

}

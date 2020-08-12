<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    public $timestamps = false;

    public function producto(){
        return $this->hasMany('App/Producto', 'id_persona');
    }
}

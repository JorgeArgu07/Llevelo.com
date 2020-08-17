<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    public $timestamps = false;

    public function producto(){
        return $this->hasMany('App/Producto', 'id_categoria');
    }
}

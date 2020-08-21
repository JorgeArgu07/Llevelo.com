<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    public function categoria(){
        return $this->belongsTo('App/Categoria', 'id_categoria');    
    }

    public function persona(){
        return $this->belongsTo('App/Persona', 'id_persona');
    }

}

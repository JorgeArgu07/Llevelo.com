<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarritoProducto extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'carrito_producto';
    public $timestamps = false;



public function id_carrito() {
    return $this->belongsTo(Carrito::class,'id_carrito');
}






}

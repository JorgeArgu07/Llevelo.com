<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarritoProducto extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'carrito_producto';
    public $timestamps = false;

}

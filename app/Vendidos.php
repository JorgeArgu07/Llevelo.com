<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendidos extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'vendidos';
    public $timestamps = false;

    public function id_persona(){
        return $this->hasMany('App/Persona', 'id_persona');
    }

}

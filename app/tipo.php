<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'tipo';
    public $timestamps = false;
}

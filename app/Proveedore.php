<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedore extends Model
{

    public $fillable = ['nombre','apellido_p','apellido_m',];
    public $timestamps = false;

    /*public function producto()
    {
        return $this->hasOne('App\Producto');
    }*/
}

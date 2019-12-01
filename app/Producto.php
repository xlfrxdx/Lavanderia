<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{ 
    public $fillable = ['codigo','descripcion','categoria_id','stock','precio_compra','precio_venta', 'proveedor_id'];
    public $timestamps = false;

    public function categoria()
    {
        return $this->hasOne('App\Categoria');
    }
    public function proveedor()
    {
        return $this->hasMany('App\Proveedore');
    }
}
  
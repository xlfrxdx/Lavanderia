<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    public $fillable = ['nombre','descripcion',];
    public $timestamps = false;
    
    /*public function producto()
    {
        return $this->hasOne('App\Categoria');
    }*/
}

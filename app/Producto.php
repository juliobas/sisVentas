<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    public function ventas()
    {
        return $this->hasMany('App\DetalleVenta');
    }
}

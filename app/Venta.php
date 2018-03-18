<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    //
    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
    public function detalle_ventas()
    {
        return $this->hasMany('App\DetalleVenta');
    }

}

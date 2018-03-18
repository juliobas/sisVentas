<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    /**
     * Get the phone record associated with the user.
     */
    public function ventas()
    {
        return $this->hasMany('App\Venta');
    }
}

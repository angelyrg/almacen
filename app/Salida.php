<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    public function salida_detalles(){
        return $this->hasMany(SalidaDetalle::class, 'salida_id');
    }

}

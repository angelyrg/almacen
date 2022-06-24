<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalidaDetalle extends Model
{
    public function salida(){
        return $this->belongsTo(Salida::class, 'salida_id');
    }

    public function articulo(){
        return $this->belongsTo(Articulo::class, 'articulo_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    public function entrada_detalles(){
        return $this->hasMany(EntradaDetalle::class, 'entrada_id');
    }
}

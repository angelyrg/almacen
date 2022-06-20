<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntradaDetalle extends Model
{
    public function entrada(){
        return $this->belongsTo(Entrada::class, 'id');
    }

    public function articulo(){
        return $this->belongsTo(Articulo::class, 'articulo_id');
    }

   
}

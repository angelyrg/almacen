<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    public function unidad_medida(){
        return $this->belongsTo(UnidadMedida::class, "medida_id");
    }

    public function estado_articulo(){
        return $this->belongsTo(EstadoArticulo::class, "estado_id");
    }

    public function usuario_registrado(){
        return $this->belongsTo(User::class, "usuario_id");
    }

    public function entrada_detalles(){
        return $this->hasMany(EntradaDetalle::class, 'articulo_id');
    }
}

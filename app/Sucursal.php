<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    public function users(){
        return $this->hasMany(User::class, "sucursal_id");
    }
}

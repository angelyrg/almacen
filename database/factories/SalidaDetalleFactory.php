<?php

use Faker\Generator as Faker;

$factory->define(App\SalidaDetalle::class, function (Faker $faker) {
    return [
        "cantidad"=>$faker->numberBetween(1,50),
        "salida_id"=>$faker->numberBetween(1,5),
        "articulo_id"=>$faker->numberBetween(1,20)
    ];
});

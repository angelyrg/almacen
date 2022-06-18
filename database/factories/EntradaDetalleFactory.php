<?php

use Faker\Generator as Faker;

$factory->define(App\EntradaDetalle::class, function (Faker $faker) {
    return [
        "cantidad"=>$faker->numberBetween(20,200),
        "entrada_id"=>$faker->numberBetween(1,5),
        "articulo_id"=>$faker->numberBetween(1,20)
    ];
});

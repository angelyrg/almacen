<?php

use Faker\Generator as Faker;

$factory->define(App\Salida::class, function (Faker $faker) {
    return [
        "dni" => $faker->unique()->numerify("########"),
        "nombre" => $faker->name(),
        "usuario_id" => $faker->numberBetween(2,11),
    ];
});

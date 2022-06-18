<?php

use Faker\Generator as Faker;

$factory->define(App\Sucursal::class, function (Faker $faker) {
    return [
        'nombre' => $faker->company,
        'direccion' => $faker->address(),
        'distrito' => $faker->word(20),
        'provincia' => $faker->word(),
        'departamento' => $faker->word(),

    ];
});

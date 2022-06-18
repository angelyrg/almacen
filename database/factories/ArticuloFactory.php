<?php

use Faker\Generator as Faker;

$factory->define(App\Articulo::class, function (Faker $faker) {
    return [
        "codigo" => $faker->unique()->numerify("##########"),
        "nombre" => $faker->word(),
        "descripcion" => $faker->text(),
        "stock" => $faker->numberBetween(20,200),
        "estado_id" => $faker->numberBetween(1,6),
        "medida_id" => $faker->numberBetween(1,6),
        "usuario_id" => $faker->numberBetween(2,11)
    ];
});

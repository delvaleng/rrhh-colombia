<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Marcacion;
use Faker\Generator as Faker;

$factory->define(Marcacion::class, function (Faker $faker) {

    return [
        'id_empleado' => $faker->randomDigitNotNull,
        'id_tp_marcacion' => $faker->randomDigitNotNull,
        'dia' => $faker->word,
        'hora_inicio' => $faker->word,
        'hora_fin' => $faker->word,
        'total_min' => $faker->word,
        'latitud' => $faker->word,
        'longitud' => $faker->word,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});

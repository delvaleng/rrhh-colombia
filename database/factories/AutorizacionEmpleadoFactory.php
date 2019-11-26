<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AutorizacionEmpleado;
use Faker\Generator as Faker;

$factory->define(AutorizacionEmpleado::class, function (Faker $faker) {

    return [
        'id_marcacion' => $faker->randomDigitNotNull,
        'creado_by' => $faker->randomDigitNotNull,
        'aprobado_by' => $faker->randomDigitNotNull,
        'observacion' => $faker->text,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});

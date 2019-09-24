<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Empleado;
use Faker\Generator as Faker;

$factory->define(Empleado::class, function (Faker $faker) {

    return [
        'id_tp_documento_identidad' => $faker->randomDigitNotNull,
        'id_pais' => $faker->randomDigitNotNull,
        'nombre' => $faker->text,
        'apellido' => $faker->text,
        'num_documento' => $faker->text,
        'usuario' => $faker->text,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});

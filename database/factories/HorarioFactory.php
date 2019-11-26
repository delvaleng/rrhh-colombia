<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Horario;
use Faker\Generator as Faker;

$factory->define(Horario::class, function (Faker $faker) {

    return [
        'dia' => $faker->text,
        'entrada' => $faker->word,
        'salida' => $faker->word,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});

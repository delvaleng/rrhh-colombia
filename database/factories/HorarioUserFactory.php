<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\HorarioUser;
use Faker\Generator as Faker;

$factory->define(HorarioUser::class, function (Faker $faker) {

    return [
        'id_empleado' => $faker->randomDigitNotNull,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});

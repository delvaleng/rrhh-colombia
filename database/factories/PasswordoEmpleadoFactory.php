<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PasswordoEmpleado;
use Faker\Generator as Faker;

$factory->define(PasswordoEmpleado::class, function (Faker $faker) {

    return [
        'id_empleado' => $faker->randomDigitNotNull,
        'password' => $faker->text,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});

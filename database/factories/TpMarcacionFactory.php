<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TpMarcacion;
use Faker\Generator as Faker;

$factory->define(TpMarcacion::class, function (Faker $faker) {

    return [
        'descripcion' => $faker->text,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});

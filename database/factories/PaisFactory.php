<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pais;
use Faker\Generator as Faker;

$factory->define(Pais::class, function (Faker $faker) {

    return [
        'country' => $faker->text,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});

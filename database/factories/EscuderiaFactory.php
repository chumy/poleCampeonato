<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Escuderia;
use Faker\Generator as Faker;

$factory->define(Escuderia::class, function (Faker $faker) {
    return [
        //
        'nombre' => $faker->name,
    ];
});
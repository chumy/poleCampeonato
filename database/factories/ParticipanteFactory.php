<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Participante;
use Faker\Generator as Faker;

$factory->define(Participante::class, function (Faker $faker) {
    return [
        //
        'nombre' => $faker->name,
    ];
});
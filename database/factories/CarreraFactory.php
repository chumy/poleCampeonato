<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use \App\Carrera;
use Faker\Generator as Faker;

$factory->define(App\Carrera::class, function (Faker $faker) {
    return [
        //
        'nombre' => $faker->name,
    ];
});
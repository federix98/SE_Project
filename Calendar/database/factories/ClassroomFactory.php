<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Classroom::class, function (Faker $faker) {
    return [
        'building_id' => $faker->randomNumber(),
        'name' => $faker->name,
        'address' => $faker->word,
        'floor' => $faker->boolean,
        'directions' => $faker->text,
        'capacity' => $faker->randomNumber(),
        'accessibility' => $faker->boolean,
    ];
});

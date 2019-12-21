<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\degree_special_event::class, function (Faker $faker) {
    return [
        'id' => $faker->randomNumber(),
        'degree_id' => $faker->randomNumber(),
        'special_event_id' => $faker->randomNumber(),
    ];
});

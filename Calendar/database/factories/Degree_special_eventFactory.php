<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\degree_special_event::class, function (Faker $faker) {
    return [
        'degree_id' => $faker->numberBetween($min = 1, $max = 400),
        'special_event_id' => $faker->numberBetween($min = 1, $max = 50),
    ];
});

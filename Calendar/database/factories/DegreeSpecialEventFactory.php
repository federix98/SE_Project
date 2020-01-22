<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\DegreeSpecialEvent::class, function (Faker $faker) {
    return [
        'degree_id' => $faker->numberBetween($min = 1, $max = 60),
        'special_event_id' => $faker->numberBetween($min = 1, $max = 200),
    ];
});

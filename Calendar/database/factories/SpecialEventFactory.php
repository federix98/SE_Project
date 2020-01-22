<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\SpecialEvent::class, function (Faker $faker) {
    return [
        'classroom_id' => $faker->numberBetween($min = 1, $max = 100),
        'name' => $faker->bs,
        'date_event' => $faker->dateTimeThisMonth($max = 'now', $timezone = 'Europe/Rome')->format('Y-m-d'),
        'start_time' => ( $faker->numberBetween($min = 9, $max = 13)*4 + 2 ),
        'duration' => $faker->numberBetween($min = 8, $max = 20),
        'info' => $faker->text($maxNbChars = 200),
    ];
});

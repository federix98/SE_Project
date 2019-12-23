<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Lesson::class, function (Faker $faker) {
    return [
        'classroom_id' => $faker->numberBetween($min = 1, $max = 1000),
        'teaching_id' => $faker->numberBetween($min = 1, $max = 8000),
        'start_time' => (( $faker->numberBetween($min = 9, $max = 16)*4 + 2 )),
        'duration' => $faker->numberBetween($min = 8, $max = 12),
        'week_day' => $faker->numberBetween($min = 0, $max = 5),
        'start_date' => $faker->dateTimeThisMonth($max = 'now', $timezone = 'Europe/Rome')->format('Y-m-d'),
        'end_date' => $faker->dateTimeInInterval($startDate = '+ 15 days', $interval = '+ 40 days', $timezone = 'Europe/Rome')->format('Y-m-d')
    ];
});

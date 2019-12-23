<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Extra_lesson::class, function (Faker $faker) {
    return [
        'classroom_id' => $faker->numberBetween($min = 1, $max = 1000),
        'teaching_id' => $faker->numberBetween($min = 1, $max = 8000),
        'start_time' => ( $faker->numberBetween($min = 9, $max = 16)*4 + 2 ),
        'duration' => $faker->numberBetween($min = 8, $max = 12),
        'date_lesson' =>$faker->dateTimeInInterval($startDate = 'now', $interval = '+ 14 days', $timezone = 'Europe/Rome')->format('Y-m-d')
    ];
});

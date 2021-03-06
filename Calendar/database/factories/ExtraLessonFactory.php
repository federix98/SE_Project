<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\ExtraLesson::class, function (Faker $faker) {
    return [
        'classroom_id' => $faker->numberBetween($min = 1, $max = 100),
        'teaching_id' => $faker->numberBetween($min = 1, $max = 800),
        'start_time' => ( $faker->numberBetween($min = 9, $max = 16)*4 + 2 ),
        'duration' => $faker->numberBetween($min = 8, $max = 12),
        'date_lesson' =>$faker->dateTimeInInterval($startDate = 'now', $interval = '+ 14 days', $timezone = 'Europe/Rome')->format('Y-m-d')
    ];
});

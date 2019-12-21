<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Lesson::class, function (Faker $faker) {
    return [
        'classroom_id' => $faker->randomNumber(),
        'teaching_id' => $faker->randomNumber(),
        'start_time' => $faker->time(),
        'duration' => $faker->boolean,
        'week_day' => $faker->boolean,
        'start_date' => $faker->date(),
        'end_date' => $faker->date(),
    ];
});

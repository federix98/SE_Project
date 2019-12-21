<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Extra_lesson::class, function (Faker $faker) {
    return [
        'classroom_id' => $faker->randomNumber(),
        'teaching_id' => $faker->randomNumber(),
        'start_time' => $faker->time(),
        'duration' => $faker->boolean,
        'date_lesson' => $faker->date(),
    ];
});

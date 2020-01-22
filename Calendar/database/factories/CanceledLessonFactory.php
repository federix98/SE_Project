<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\CanceledLesson::class, function (Faker $faker) {
    return [
        'lesson_id' => $faker->numberBetween($min = 1, $max = 1600),
        'date_lesson' => $faker->date(),
    ];
});

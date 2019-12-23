<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Canceled_lesson::class, function (Faker $faker) {
    return [
        'lesson_id' => $faker->numberBetween($min = 1, $max = 16000),
        'date_lesson' => $faker->date(),
    ];
});

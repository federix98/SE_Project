<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Canceled_lesson::class, function (Faker $faker) {
    return [
        'lesson_id' => numberBetween($min = 1, $max = 100),
        'date_lesson' => $faker->date(),
    ];
});

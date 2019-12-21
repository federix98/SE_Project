<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Special_event::class, function (Faker $faker) {
    return [
        'classroom_id' => $faker->randomNumber(),
        'name' => $faker->name,
        'date_event' => $faker->date(),
        'start_time' => $faker->time(),
        'duration' => $faker->boolean,
        'info' => $faker->text,
    ];
});

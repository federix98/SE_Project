<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Professor_teaching::class, function (Faker $faker) {
    return [
        'id' => $faker->randomNumber(),
        'professor_id' => $faker->randomNumber(),
        'teaching_id' => $faker->randomNumber(),
    ];
});

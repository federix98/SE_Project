<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Degree_teaching::class, function (Faker $faker) {
    return [
        'id' => $faker->randomNumber(),
        'degree_id' => $faker->randomNumber(),
        'teaching_id' => $faker->randomNumber(),
        'teaching_type_id' => $faker->randomNumber(),
    ];
});

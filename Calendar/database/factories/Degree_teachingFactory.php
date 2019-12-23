<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Degree_teaching::class, function (Faker $faker) {
    return [
        'degree_id' => $faker->numberBetween($min = 1, $max = 400),
        'teaching_id' => $faker->numberBetween($min = 1, $max = 8000),
        'teaching_type_id' => $faker->numberBetween($min = 1, $max = 3),
    ];
});

<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\DegreeTeaching::class, function (Faker $faker) {
    return [
        'degree_id' => $faker->numberBetween($min = 1, $max = 40),
        'teaching_id' => $faker->numberBetween($min = 1, $max = 800),
        'teaching_type_id' => $faker->numberBetween($min = 1, $max = 3),
    ];
});

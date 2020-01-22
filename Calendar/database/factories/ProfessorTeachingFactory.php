<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\ProfessorTeaching::class, function (Faker $faker) {
    return [
        'professor_id' => $faker->numberBetween($min = 1, $max = 100),
        'teaching_id' => $faker->numberBetween($min = 1, $max = 800),
    ];
});

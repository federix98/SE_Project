<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Classroom::class, function (Faker $faker) {
    return [
        'building_id' => $faker->numberBetween($min = 1, $max = 20),
        'name' => $faker->numerify('aula C#.##'),
        'floor' => $faker->numberBetween($min = 1, $max = 9),
        'directions' => $faker->text($maxNbChars = 200),
        'capacity' => $faker->numberBetween($min = 50, $max = 100),
        'accessibility' => $faker->boolean($chanceOfGettingTrue = 95),
    ];
});

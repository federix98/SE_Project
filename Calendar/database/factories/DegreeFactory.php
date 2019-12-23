<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Degree::class, function (Faker $faker) {
    return [
        'degree_group_id' => $faker->numberBetween($min = 1, $max = 19),
        'name' => $faker->catchPhrase,
        'year' => $faker->numberBetween($min = 1, $max = 6),
        'SSD' => $faker->asciify('****'),
    ];
});

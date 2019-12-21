<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Degree::class, function (Faker $faker) {
    return [
        'degree_group_id' => $faker->randomNumber(),
        'name' => $faker->name,
        'year' => $faker->boolean,
        'SSD' => $faker->word,
    ];
});

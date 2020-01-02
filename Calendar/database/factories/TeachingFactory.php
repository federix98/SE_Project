<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Teaching::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'code' => $faker->bothify('#?#?'),
        'CFU' => 6,
        'semester' => $faker->numberBetween($min = 0, $max = 2),
        'language' => $faker->word,
    ];
});

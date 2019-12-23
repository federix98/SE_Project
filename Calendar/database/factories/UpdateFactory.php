<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Update::class, function (Faker $faker) {
    return [
        'teaching_id' => $faker->numberBetween($min = 1, $max = 8000),
        'title' => $faker->bs,
        'info' => $faker->text($maxNbChars = 200),
        'link' => $faker->url,
    ];
});

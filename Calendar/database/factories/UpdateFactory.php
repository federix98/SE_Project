<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Update::class, function (Faker $faker) {
    return [
        'teaching_id' => $faker->randomNumber(),
        'title' => $faker->word,
        'info' => $faker->text,
        'link' => $faker->word,
    ];
});

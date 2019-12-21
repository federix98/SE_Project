<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Teaching_type::class, function (Faker $faker) {
    return [
        'type_name' => $faker->word,
    ];
});

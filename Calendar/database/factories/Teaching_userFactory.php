<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Teaching_user::class, function (Faker $faker) {
    return [
        'id' => $faker->randomNumber(),
        'user_id' => $faker->randomNumber(),
        'teaching_id' => $faker->randomNumber(),
    ];
});

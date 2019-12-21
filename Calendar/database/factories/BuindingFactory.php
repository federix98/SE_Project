<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\building;
use Faker\Generator as Faker;

$factory->define(building::class, function (Faker $faker) {
    return [
        'name' => $faker->streetName,
        'address' => $faker->address
    ];
});

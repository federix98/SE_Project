<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Professor::class, function (Faker $faker) {
    return [
        'professor_role_id' => $faker->randomNumber(),
        'department_id' => $faker->randomNumber(),
        'name' => $faker->name,
        'surname' => $faker->word,
        'office_address' => $faker->word,
        'email' => $faker->safeEmail,
        'telephone_no' => $faker->word,
        'office_hours' => $faker->word,
    ];
});

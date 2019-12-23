<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Professor::class, function (Faker $faker) {
    return [
        'professor_role_id' => $faker->numberBetween($min = 1, $max = 4),
        'department_id' => $faker->numberBetween($min = 1, $max = 7),
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'office_address' => $faker->streetAddress,
        'email' => $faker->safeEmail,
        'telephone_no' => $faker->numerify('##########'),
        'office_hours' => $faker->numerify('##:## - ##:##'),
    ];
});

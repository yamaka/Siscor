<?php

use Faker\Generator as Faker;

$factory->define(Siscor\Roadmap::class, function (Faker $faker) {
    return [
        'status' => $faker->randomElement(['finish' ,'process', 'observate', 'initialize']),
        'reason' => $faker->text,
        'description' => $faker->text
    ];
});

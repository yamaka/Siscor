<?php

use Faker\Generator as Faker;

$factory->define(Siscor\Direction::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->realText(90)
    ];
});

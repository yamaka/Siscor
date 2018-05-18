<?php

use Faker\Generator as Faker;

$factory->define(Siscor\Action::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'short_name' => $faker->name,
        'description' => $faker->realText(90)
    ];

});

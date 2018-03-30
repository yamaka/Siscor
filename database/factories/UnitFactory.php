<?php

use Faker\Generator as Faker;

$factory->define(Siscor\Unit::class, function (Faker $faker) {
    $aDirection = []; 
    $directions = Siscor\Direction::get(['id']);

    foreach ($directions as $k => $v) {
        $aDirection[] = $v->id; // añadimos el valor al array
    } 

     return [
        'direction_id' => $faker->randomElement($aDirection),
        'name' => $faker->name,
        'description' => $faker->realText(90)
    ];
});
<?php

use Faker\Generator as Faker;

$factory->define(Siscor\Position::class, function (Faker $faker) {
	$aDirection = []; 
    $directions = Siscor\Direction::get(['id']);


	foreach ($directions as $k => $v) {
        $aDirection[] = $v->id; // añadimos el valor al array
    } 

    $aUnit = [];
    $units = Siscor\Unit::get(['id']);

    foreach ($units as $k => $v) {
        $aUnit[] = $v->id; // añadimos el valor al array
    } 

     return [
        'direction_id' => $faker->randomElement($aDirection),
        'unit_id' => $faker->randomElement($aUnit),
        'name' => $faker->name,
        'description' => $faker->paragraph
    ];
	
});

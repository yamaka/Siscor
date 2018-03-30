<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Siscor\User::class, function (Faker $faker) {
    $aPosition = [];
    $position = Siscor\Position::get(['id']);

    foreach ($position as $k => $v) {
        $aPosition[] = $v->id; // añadimos el valor al array
    }

    return [
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'username' => $faker->unique()->username,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('user123'), // secret
        'remember_token' => str_random(10),
        'position_id' => $faker->randomElement($aPosition)
    ];
});

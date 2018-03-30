<?php

use Faker\Generator as Faker;
use Siscor\User;
use Siscor\Direction;
use Siscor\Unit;
use Siscor\Position;

$factory->define(Siscor\Roadmap::class, function (Faker $faker) {

    $aUser = [];
    $users = User::get(['id']);
    foreach ($users as $user){
        $aUser[] = $user->id;
    }
    $user_id = $faker->randomElement($aUser);
    $user = User::find($user_id);

    $direction_id = $user->position->direction->id;
    
    return [
        'status' => $faker->randomElement(['finish' ,'process', 'observate', 'initialize']),
        'reason' => $faker->realText(40),
        'description' => $faker->realText(90),
        'direction_id' => $direction_id,
        'user_created_id' => $user_id, // user has position
        'user_modified_id' => $user_id,
    ];
});

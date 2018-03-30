<?php

use Illuminate\Database\Seeder;
use Siscor\User;

class UsersWithPositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);
        $user->position_id = 1;
        $user->update();
        factory(User::class, 10)->create();
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(DirectionsTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(RoadMapsTableSeeder::class);


    }
}

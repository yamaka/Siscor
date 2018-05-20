<?php

use Illuminate\Database\Seeder;

class DirectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	    factory(Siscor\Direction::class, 5)->create();
    }
}

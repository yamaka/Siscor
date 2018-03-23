<?php

use Illuminate\Database\Seeder;

class RoadMapsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Siscor\Roadmap::class, 10)->create();
    }
}

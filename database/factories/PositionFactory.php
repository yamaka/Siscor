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
        $i = 0 ;
        foreach ($units as $k => $v) {
            if($i % 2 == 0)
                $aUnit[] = null;
            $aUnit[] = $v->id; // añadimos el valor al array
            $i++;
        }

         return [
            'direction_id' => $faker->randomElement($aDirection),
            'unit_id' => $faker->randomElement($aUnit),
            'name' => $faker->name,
            'description' => $faker->realText(90)
        ];

    });

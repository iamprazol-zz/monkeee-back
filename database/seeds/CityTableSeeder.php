<?php

use Illuminate\Database\Seeder;
use App\city;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $ci1 = [
            'id' => 1,
            'country_id' => 1,
            'zone_id' => 2,
            'name' => 'sydney'
        ];

        $ci2 = [
            'id' => 2,
            'country_id' => 3,
            'zone_id' => 290,
            'name' => 'delhi'
        ];

        $ci3 = [
            'id' => 3,
            'country_id' => 2,
            'zone_id' => 278,
            'name' => 'chitwan'
        ];

        city::create($ci1);
        city::create($ci2);
        city::create($ci3);


    }
}

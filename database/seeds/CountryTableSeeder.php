<?php

use Illuminate\Database\Seeder;
use App\country;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $co1 = [
            'id' => 1,
            'name' => 'Australia',
        ];

        $co2 = [
            'id' => 2,
            'name' => 'Nepal',
        ];

        $co3 = [
            'id' => 3,
            'name' => 'India',
        ];

        country::create($co1);
        country::create($co2);
        country::create($co3);

    }
}

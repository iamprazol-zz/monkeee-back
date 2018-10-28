<?php

use Illuminate\Database\Seeder;
use App\Suburb;

class SuburbTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $s1 = [
            'id' => 1 ,
            'name' => 'Gosford' ,
            'postalcode' => 2250
        ];

        $s2 = [
            'id' => 2 ,
            'name' => 'Mardi' ,
            'postalcode' => 2230
        ];

        $s3 = [
        'id' => 3 ,
        'name' => 'Wyoming' ,
        'postalcode' => 2200
        ];

        $s4 = [
        'id' => 4 ,
        'name' => 'Woy Woy' ,
        'postalcode' => 2250
        ];

        Suburb::create($s1);
        Suburb::create($s2);
        Suburb::create($s3);
        Suburb::create($s4);


    }
}

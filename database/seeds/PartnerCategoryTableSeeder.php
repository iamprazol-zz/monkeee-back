<?php

use Illuminate\Database\Seeder;
use App\partnercategory;

class PartnerCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $pc1 =[
            'id' => 1,
            'name' => 'Travel',
        ];

        $pc2 =[
            'id' => 2,
            'name' => 'School',
        ];

        $pc3 =[
            'id' => 3,
            'name' => 'Hostel',
        ];

        partnercategory::create($pc1);
        partnercategory::create($pc2);
        partnercategory::create($pc3);


    }
}

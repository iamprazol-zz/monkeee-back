<?php

use Illuminate\Database\Seeder;
use App\Club;

class ClubTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c1 = [
            'id' => 1,
            'name' => 'Club Doroty',
            'address' => 'Valley View Road 26',
            'suburb_id' => 1,
            'description' => 'Super Beautiful club.',
            'cover_photo' => 'poudel'
        ];

        $c2 = [
            'id' => 2,
            'name' => 'Club Margot',
            'address' => 'Nortond Driver 27',
            'suburb_id' => 2,
            'description' => 'We are techno  club.',
            'cover_photo' => 'kushal'
        ];

        Club::create($c1);
        Club::create($c2);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Club_gallery;

class ClubGalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $k1 = [
            'id' => 1,
            'club_id' => 1,
            'picture' => 'g1.jpg' ,
            'description' => 'Small Picure description 1'
        ];

        $k2 = [
            'id' => 2,
            'club_id' => 1,
            'picture' => 'g2.jpg' ,
            'description' => 'Small Picure description 2'
        ];

        $k3 = [
            'id' => 3,
            'club_id' => 1,
            'picture' => 'g3.jpg' ,
            'description' => 'Small Picure description 3'
        ];

        Club_gallery::create($k1);
        Club_gallery::create($k2);
        Club_gallery::create($k3);

    }
}

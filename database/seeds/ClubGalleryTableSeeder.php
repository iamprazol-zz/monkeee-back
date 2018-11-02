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
            'picture' => 'g1.jpg,club.jpeg' ,
        ];

        $k2 = [
            'id' => 2,
            'club_id' => 2,
            'picture' => 'g2.jpeg,club1.jpeg' ,
        ];

        $k3 = [
            'id' => 3,
            'club_id' => 3,
            'picture' => 'g3.jpg,club2.jpeg' ,
        ];

        Club_gallery::create($k1);
        Club_gallery::create($k2);
        Club_gallery::create($k3);

    }
}

<?php

use Illuminate\Database\Seeder;
use App\Video;

class VideoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $v1 = [
            'id' => 1,
            'event_id' => 2,
            'video' => 'aalu.mp4'
        ];

        Video::create($v1);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Event;
use Carbon\Carbon;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $e1 = [
            'id' => 3,
            'club_id' => 1,
            'category_id' => 2 ,
            'date' => Carbon::createFromDate(2018, 10,30),
            'opening' => Carbon::parse('11 p.m'),
            'closing' => Carbon::parse('5 a.m') ,
            'picture' => 'htpps://www.monkee.com// file_path' ,
            'name' => ' Name 3 Event ',
            'description' => 'beautifull event of techno music tututut ',
            'price' => 0
        ];

        $e2 = [
            'id' => 2,
            'club_id' => 2,
            'category_id' => 1 ,
            'date' => Carbon::createFromDate(2018,10,30),
            'opening' => Carbon::parse('12 p.m'),
            'closing' => Carbon::parse('6 a.m') ,
            'picture' => 'htpps://www.monkee.com// file_path' ,
            'name' => ' Name 2 event',
            'description' => 'Descripètion event club; lorem ipsum ',
            'price' => 10
        ];

        $e3 = [
            'id' => 1,
            'club_id' => 2,
            'category_id' => 2 ,
            'date' => Carbon::createFromDate(2018,11-01),
            'opening' => Carbon::parse('2 a.m'),
            'closing' => Carbon::parse('7 a.m') ,
            'picture' => 'www.themonkey.com/event/pic_1.png' ,
            'name' => ' mi vida loca ',
            'description' => 'beautifull event of techno music tututut ',
            'price' => 20
        ];

        $e4 = [
            'id' => 4,
            'club_id' => 2,
            'category_id' => 1 ,
            'date' => Carbon::createFromDate(2018,11,19),
            'opening' => Carbon::parse('10 p.m'),
            'closing' => Carbon::parse('4 a.m') ,
            'picture' => 'www.themonkey.com/event/pic_1.png' ,
            'name' => ' mi vida loca ',
            'description' => 'beautifull event of techno music tututut ',
            'price' => 20
        ];

        $e5 = [
            'id' => 6,
            'club_id' => 2,
            'category_id' => 3 ,
            'date' => Carbon::createFromDate(2018,11,02),
            'opening' => Carbon::parse('10 p.m'),
            'closing' => Carbon::parse('4 a.m') ,
            'picture' => 'www.themonkey.com/event/pic_1.png' ,
            'name' => ' mi vida loca ',
            'description' => 'beautifull event of techno music tututut ',
            'price' => 20
        ];

        $e6 = [
            'id' => 5,
            'club_id' => 3,
            'category_id' => 1 ,
            'date' => Carbon::createFromDate(2018,11,10),
            'opening' => Carbon::parse('10 p.m'),
            'closing' => Carbon::parse('4 a.m') ,
            'picture' => 'www.themonkey.com/event/pic_1.png' ,
            'name' => ' mi vida loca ',
            'description' => 'beautifull event of techno music tututut ',
            'price' => 20
        ];





        Event::create($e1);
        Event::create($e2);
        Event::create($e3);
        Event::create($e4);
        Event::create($e5);
        Event::create($e6);

    }
}

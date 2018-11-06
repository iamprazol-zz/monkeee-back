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
            'id' => 1,
            'club_id' => 1,
            'category_id' => 2 ,
            'date' => Carbon::createFromDate(2018, 11,06),
            'opening' => Carbon::parse('1 p.m'),
            'closing' => Carbon::parse('11 p.m') ,
            'picture' => 'club.jpeg' ,
            'name' => ' Name 3 Event ',
            'description' => 'beautifull event of techno music tututut At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio',
            'price' => 0,
            'ticket_link' => "",
            'facebook' => 'asasasddas',
            'instagram' => 'sasasdfdcc'
            ];

        $e2 = [
            'id' => 2,
            'club_id' => 2,
            'category_id' => 1 ,
            'date' => Carbon::createFromDate(2018,11,07),
            'opening' => Carbon::parse('2 p.m'),
            'closing' => Carbon::parse('11 p.m') ,
            'picture' => 'g2.jpeg' ,
            'name' => ' Name 2 event',
            'description' => 'Descripètion event club; lorem ipsum At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio',
            'price' => 10,
            'ticket_link' => "",
            'facebook' => 'asasasddas',
            'instagram' => 'sasasdfdcc'
        ];

        $e3 = [
            'id' => 3,
            'club_id' => 3,
            'category_id' => 2 ,
            'date' => Carbon::createFromDate(2018,11,07),
            'opening' => Carbon::parse('10 pm'),
            'closing' => Carbon::parse('4 a.m') ,
            'picture' => 'club1.jpeg' ,
            'name' => ' mi vida loca ',
            'description' => 'beautifull event of techno music tututut At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio',
            'price' => 20,
            'ticket_link' => "",
            'facebook' => 'asasasddas',
            'instagram' => 'sasasdfdcc'
        ];

        $e4 = [
            'id' => 4,
            'club_id' => 2,
            'category_id' => 1 ,
            'date' => Carbon::createFromDate(2018,11,8),
            'opening' => Carbon::parse('2 a.m'),
            'closing' => Carbon::parse('7 a.m') ,
            'picture' => 'club2.jpeg' ,
            'name' => ' mi vida loca ',
            'description' => 'beautifull event of techno music tututut At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio',
            'price' => 20,
            'ticket_link' => "",
            'facebook' => 'asasasddas',
            'instagram' => 'sasasdfdcc'
        ];

        $e5 = [
            'id' => 5,
            'club_id' => 3,
            'category_id' => 3 ,
            'date' => Carbon::createFromDate(2018,11,15),
            'opening' => Carbon::parse('10 p.m'),
            'closing' => Carbon::parse('4 a.m') ,
            'picture' => 'g1.jpg' ,
            'name' => ' mi vida loca ',
            'description' => 'beautifull event of techno music tututut At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio',
            'price' => 20,
            'ticket_link' => "",
            'facebook' => 'asasasddas',
            'instagram' => 'sasasdfdcc'
        ];

        $e6 = [
            'id' => 6,
            'club_id' => 1,
            'category_id' => 1 ,
            'date' => Carbon::createFromDate(2018,11,06),
            'opening' => Carbon::parse('1 p.m'),
            'closing' => Carbon::parse('4 a.m') ,
            'picture' => 'g3.jpg' ,
            'name' => ' mi vida loca ',
            'description' => 'beautifull event of techno music tututut At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio',
            'price' => 20,
            'ticket_link' => "",
            'facebook' => 'asasasddas',
            'instagram' => 'sasasdfdcc'
        ];





        Event::create($e1);
        Event::create($e2);
        Event::create($e3);
        Event::create($e4);
        Event::create($e5);
        Event::create($e6);

    }
}

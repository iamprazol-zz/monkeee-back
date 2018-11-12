<?php

use Illuminate\Database\Seeder;
use App\Club;
use Carbon\Carbon;

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
            'name' => 'Woroty',
            'address' => 'Valley View Road 26',
            'suburb_id' => 1,
            'description' => 'Super Beautiful club. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio',
            'cover_photo' => 'club1.jpeg',
            'order' => 256,
            'email' => 'abc@gmail.com',
            'phone' => 1245639875,
            'opening_time' => Carbon::parse('10 p.m')->format('H:i:s'),
            'closing_time' => Carbon::parse('4 a.m')->format('H:i:s'),
            'open' => 'Sun to Fri',
            'facebook' => 'asasasddas',
            'instagram' => 'sasasdfdcc'
        ];

        $c2 = [
            'id' => 2,
            'name' => 'Xargot',
            'address' => 'Nortond Driver 27',
            'suburb_id' => 3,
            'description' => 'We are techno  club. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio',
            'cover_photo' => 'club2.jpeg',
            'order' => 4562,
            'email' => 'sasjsj@gmail.com',
            'phone' => 1245657875,
            'opening_time' => Carbon::parse('9 p.m')->format('H:i:s'),
            'closing_time' => Carbon::parse('4 a.m')->format('H:i:s'),
            'open' => 'Mon to Fri',
            'facebook' => 'asasasddas',
            'instagram' => 'sasasdfdcc'
        ];


        Club::create($c1);
        Club::create($c2);
        Club::create($c3);

    }
}

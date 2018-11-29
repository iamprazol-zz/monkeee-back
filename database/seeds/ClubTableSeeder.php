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
            'open' =>   'Sun from 4 am to 10 pm ,
                        Mon from 5 am to 11 pm ,
                        Tue from 4 am to 11 pm ,
                        Wed from 6 am to 8 pm ,
                        Thu from 8 am to 11 pm ,
                        Fri fron 7 am to 11 pm ,
                        Sat from 3 am to 11 pm',
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
            'open' => ' Sun from 4 am to 10 pm ,
                        Mon from 5 am to 11 pm ,
                        Tue from 4 am to 11 pm ,
                        Wed from 6 am to 8 pm ,
                        Thu from 8 am to 11 pm ,
                        Fri fron 7 am to 11 pm ,
                        Sat from 3 am to 11 pm ,',
            'facebook' => 'asasasddas',
            'instagram' => 'sasasdfdcc'
        ];


        Club::create($c1);
        Club::create($c2);

    }
}

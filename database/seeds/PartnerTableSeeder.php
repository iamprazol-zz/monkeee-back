<?php

use Illuminate\Database\Seeder;
use App\partner;

class PartnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $p1 = [
            'id' => 1,
            'suburb_id' => 1,
            'partnercategory_id' => 1,
            'name' => 'stupa',
            'address' => 'Valley road',
            'description' => 'jdjakdjaksdjksj djkasjdkasdjksajdk jaksdjaksdjkasjd ddjkajsddkjdsakjkdjaksd jdkajsdkajdkajsdkjakd',
            'cover_photo' => 'club1.jpeg',
            'mobile' => '7878787878',
            'email' => 'stupa@gmail.com',
            'facebook' => 'sdasdasdasd',
            'website' => 'asassdhsadjhasjdh',
        ];

        $p2 = [
            'id' => 2,
            'suburb_id' => 1,
            'partnercategory_id' => 2,
            'name' => 'aputs',
            'address' => 'Down town',
            'description' => 'jdjakdjaksdjksj djkasjdkasdjksajdk jaksdjaksdjkasjd ddjkajsddkjdsakjkdjaksd jdkajsdkajdkajsdkjakd',
            'cover_photo' => 'd1.jpg',
            'mobile' => '56215982462',
            'email' => 'aputs@gmail.com',
            'instagram' => 'sdasdasdasd',
            'website' => 'asassdhsadjhasjdh',
        ];

        $p3 = [
            'id' => 3,
            'suburb_id' => 2,
            'partnercategory_id' => 3,
            'name' => 'alvariz',
            'address' => 'chowk',
            'description' => 'jdjakdjaksdjksj djkasjdkasdjksajdk jaksdjaksdjkasjd ddjkajsddkjdsakjkdjaksd jdkajsdkajdkajsdkjakd',
            'cover_photo' => 'd2.jpg',
            'mobile' => '42165312654',
            'email' => 'chowk@gmail.com',
            'facebook' => 'sdasdasdasd',
            'instagram' => 'asassdhsadjhasjdh',
        ];

        partner::create($p1);
        partner::create($p2);
        partner::create($p3);


    }
}

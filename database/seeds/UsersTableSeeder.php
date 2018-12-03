<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u1 = [

            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@gmail.com' ,
            'password' => bcrypt('admin'),
            'admin' => 1

        ];

        $u2 = [

            'id' => 2,
            'name' => 'hello',
            'email' => 'hello@gmail.com' ,
            'password' => bcrypt('hello'),

        ];


        User::create($u1);
        User::create($u2);

    }
}

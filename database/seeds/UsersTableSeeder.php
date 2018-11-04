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

        ];


        User::create($u1);
    }
}

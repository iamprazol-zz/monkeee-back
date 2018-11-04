<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(SuburbTableSeeder::class);
         $this->call(ClubTableSeeder::class);
         $this->call(ClubGalleryTableSeeder::class);
         $this->call(CategoryTableSeeder::class);
         $this->call(EventTableSeeder::class);
         $this->call(DjTableSeeder::class);
         $this->call(UsersTableSeeder::class);


    }
}

<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $l1 = [
            'id' => 1,
            'name' => 'techno'
        ];

        $l2 = [
            'id' => 2,
            'name' => 'deep house'
        ];

        $l3 = [
            'id' => 3,
            'name' => 'latino americano'
        ];

        Category::create($l1);
        Category::create($l2);
        Category::create($l3);

    }
}

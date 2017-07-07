<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\categories();
        $category ->name = "กิจกรรม";
        $category->save();
    }
}

<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            "name" => "Cat 1"
        ]);
        Category::create([
            "name" => "Cat 2"
        ]);
        Category::create([
            "name" => "Cat 3"
        ]);
        Category::create([
            "name" => "Cat 4"
        ]);
        Category::create([
            "name" => "Cat 5"
        ]);
        Category::create([
            "name" => "Cat 6"
        ]);
        Category::create([
            "name" => "Cat 7"
        ]);
    }
}

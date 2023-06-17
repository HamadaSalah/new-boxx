<?php

use App\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'name' => 'Brand 1'
        ]);
        Brand::create([
            'name' => 'Brand 2'
        ]);
        Brand::create([
            'name' => 'Brand 3'
        ]);
        Brand::create([
            'name' => 'Brand 4'
        ]);
        Brand::create([
            'name' => 'Brand 5'
        ]);
        Brand::create([
            'name' => 'Brand 6'
        ]);
        Brand::create([
            'name' => 'Brand 7'
        ]);
        Brand::create([
            'name' => 'Brand 8'
        ]);
    }
}

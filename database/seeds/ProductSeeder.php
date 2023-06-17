<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Product 1',
            'price' => '100',
            'count' =>  '5',
            'brand' => 'Brand 1',
            'category' => 'Cat 1'
        ]);
        Product::create([
            'name' => 'Product 2',
            'price' => '200',
            'count' =>  '15',
            'brand' => 'Brand 2',
            'category' => 'Cat 2'
        ]);
        Product::create([
            'name' => 'Product 3',
            'price' => '350',
            'count' =>  '11',
            'brand' => 'Brand 3',
            'category' => 'Cat 3'
        ]);
        Product::create([
            'name' => 'Product 4',
            'price' => '540',
            'count' =>  '3',
            'brand' => 'Brand 4',
            'category' => 'Cat 4'
        ]);
        Product::create([
            'name' => 'Product 5',
            'price' => '760',
            'count' =>  '20',
            'brand' => 'Brand 1',
            'category' => 'Cat 1'
        ]);
        Product::create([
            'name' => 'Product 6',
            'price' => '50',
            'count' =>  '9',
            'brand' => 'Brand 2',
            'category' => 'Cat 2'
        ]);
        Product::create([
            'name' => 'Product 7',
            'price' => '200',
            'count' =>  '7',
            'brand' => 'Brand 3',
            'category' => 'Cat 3'
        ]);
        Product::create([
            'name' => 'Product 8',
            'price' => '98',
            'count' =>  '8',
            'brand' => 'Brand 4',
            'category' => 'Cat 4'
        ]);
        Product::create([
            'name' => 'Product 9',
            'price' => '600',
            'count' =>  '5',
            'brand' => 'Brand 5',
            'category' => 'Cat 5'
        ]);
        Product::create([
            'name' => 'Product 10',
            'price' => '666',
            'count' =>  '21',
            'brand' => 'Brand 4',
            'category' => 'Cat 4'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('collection_product')->insertGetId(
            array(
                'product_id' => 1, 'collection_id' => 1
            )
        );
        DB::table('collection_product')->insertGetId(
            array(
                'product_id' => 2, 'collection_id' => 1
            )
        );
        DB::table('collection_product')->insertGetId(
            array(
                'product_id' => 3, 'collection_id' => 1
            )
        );
        DB::table('collection_product')->insertGetId(
            array(
                'product_id' => 4, 'collection_id' => 1
            )
        );
        DB::table('collection_product')->insertGetId(
            array(
                'product_id' => 5, 'collection_id' => 1
            )
        );
        DB::table('collection_product')->insertGetId(
            array(
                'product_id' => 6, 'collection_id' => 1
            )
        );
        DB::table('collection_product')->insertGetId(
            array(
                'product_id' => 7, 'collection_id' => 1
            )
        );
        DB::table('collection_product')->insertGetId(
            array(
                'product_id' => 8, 'collection_id' => 1
            )
        );
        DB::table('collection_product')->insertGetId(
            array(
                'product_id' => 9, 'collection_id' => 1
            )
        );
        DB::table('collection_product')->insertGetId(
            array(
                'product_id' => 10, 'collection_id' => 1
            )
        );
    }
}

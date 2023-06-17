<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProductImport implements ToCollection
{
    public function  __construct($id)
    {
        $this->id= $id;
    }

    public function collection(collection $rows)
    {
        foreach ($rows as $row)
        {
            $product = Product::create([
                'name' => $row[0],
                'price' => $row[1],
                'count' => $row[2],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('collection_product')->insertGetId(
                array(
                    'product_id' => $product->id, 'collection_id' => $this->id
                )
            );

        }
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoxProduct extends Model
{
    protected $guarded = [];
    protected $table = 'box_product';
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}

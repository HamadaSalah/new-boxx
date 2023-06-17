<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderBox extends Model
{
    protected $guarded = [];
    protected $table = "box_order";

    public function box()
    {
        return $this->belongsTo(Box::class);
    }

}

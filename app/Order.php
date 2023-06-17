<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $guarded = [];
    public function boxes()
    {
        return $this->belongsToMany(Box::class);
    }

}

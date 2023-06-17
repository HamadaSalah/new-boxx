<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = [];
    public function collections()
    {
        return $this->belongsToMany(Collection::class);
    }
    public function supplier()
    {
        return $this->hasOne(Supplier::class, 'id', 'supp_id');
    }


}

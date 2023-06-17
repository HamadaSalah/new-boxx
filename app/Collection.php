<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    //
    protected $guarded = [];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function boxes()
    {
        return $this->hasMany(Box::class, 'collection_id', 'id');
    }
}

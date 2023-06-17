<?php

namespace App;

use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Box extends Model
{
    //
    protected $guarded = [];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public static function boot(){
        parent::boot();
        self::creating(function ($model){
            $model->uuid=  Str::uuid()->toString();
        });
    }
    public function isPurchase() {
        if($this->purchase == 1) {
            return true;
        }
        else {
            return false;
        }
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrontBoxes extends Model
{
    protected $guarded = [];

    protected $casts = [
        'endDate' => 'datetime',
    ];

}

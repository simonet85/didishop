<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $guarded = [];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
   
    public $timestamps = false;
}

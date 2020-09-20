<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['productname','productprice','productdescription','productimage'];
    
    protected $dates = [
        'created_at',
        'updated_at',
    ];
   
    public $timestamps = false;
}
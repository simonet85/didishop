<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    protected $dates = [
        'created_at',
        'updated_at',
    ];
   
    public $timestamps = false;
    //An Order belongs to User
    public function user() {
        return $this->belongsTo(User::class);
    }
    //An Order has many to OrderItems
    public function OrderItems() {
        return $this->hasMany(OrderItems::class);
    }
    //An Order belongs to many Products
    public function products() {
        return $this->belongsToMany(Product::class,'order_items');
    }
}

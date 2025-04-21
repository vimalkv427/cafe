<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'table_id', 'items','waiter_id', 'status', 'total_amount', // Add any other fields you need
    ];
    public function items()
{
    return $this->hasMany(OrderItem::class);
}
}



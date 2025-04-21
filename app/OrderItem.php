<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',    // ID of the related order
        'product_id',  // ID of the product
        'quantity',    // Quantity of the product
        'unit_price',       // Price per item
        'total_price',       // Optional: total price for this item (quantity * price)
    ];
    public function order()
{
    return $this->belongsTo(Order::class);
}

public function product()
{
    return $this->belongsTo(Product::class);
}


}

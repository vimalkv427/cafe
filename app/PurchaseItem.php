<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{

    protected $fillable = [
        'purchase_id', 
        'product_id', 
        'quantity', 
        'unit_price', 
        'discount_percentage', 
        'discount_amount', 
        'tax_percentage', 
        'tax_amount', 
        'total_price'
    ];


    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
}

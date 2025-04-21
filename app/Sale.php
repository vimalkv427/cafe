<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
 

    protected $fillable = [
        'bill_id', 'product_id', 'quantity', 'unit_price', 'total_price'
    ];

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
    public function product() {
        return $this->belongsTo(Product::class);
    }
    
}

<?php

namespace App;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{


    protected $fillable = [
        'user_id',
        'product_id',
        'invoice_number',
        'invoice_date',
        'invoice_amount',
        'quantity',
        'unit_price',
        'total_price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function items()
    {
        return $this->hasMany(PurchaseItem::class);
    }

    public function party()
    {
        return $this->belongsTo(Party::class);
    }
}

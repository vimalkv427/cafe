<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Takeaway extends Model
{
    protected $fillable = [
        'id', // ← Fix this line (remove the space)
        'user_id',
        'order_type',
        'subtotal',
        'tax_percentage',
        'tax_amount',
        'discount',
        'total_payable',
        'notes',
        'status',
        'created_at',
        'updated_at'
    ];

    public function items()
    {
        return $this->hasMany(TakeawayItem::class, 'takeaway_id', 'id');
    }
}

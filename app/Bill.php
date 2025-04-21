<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    

    protected $fillable = [
        'user_id', 'customer_id', 'total_amount', 'paid_amount', 'remaining_credit'
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

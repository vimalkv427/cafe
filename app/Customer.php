<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'customer_name',
        'mobile',
        'phone',
        'email',
        'gstin',
        'tax_number',
        'credit_limit',
        'opening_balance'
    ];
}

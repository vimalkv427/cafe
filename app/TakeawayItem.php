<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TakeawayItem extends Model
{
    protected $fillable = [
        'id',
        'takeaway_id',
        'item_name',
        'quantity',
        'price',
        'subtotal',
        'created_at',
        'updated_at'
    ];


    public function takeaway()
    {
        return $this->belongsTo(Takeaway::class, 'takeaway_id', 'id');
    }
}

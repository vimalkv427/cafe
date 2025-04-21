<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $fillable = [
        'name',
        'contact_person',
        'phone',
        'email',
        'address',
    ];

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
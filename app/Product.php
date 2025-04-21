<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'barcode',
        'name',
        'category_id',
        'sub_category_id',
        'cost',
        'quantity',
        'special',
        'image',
        'description',
        'product_selling_cost',
        'unit'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'sub_category_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['user_id', 'category_name', 'code'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}

<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'product_categories';

    public function subCategory()
    {
        return $this->belongsTo(Category::class, 'sub');
    }

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}

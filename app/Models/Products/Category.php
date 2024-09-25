<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'product_categories';
    protected $fillable = ['name', 'thumb', 'sub', 'status'];

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'sub', 'id');
    }

    public function products()
    {
        return $this->hasMany(Products::class);
    }

    public function parent()
    {
        return $this->hasOne(Category::class, 'sub', 'id');
    }
}

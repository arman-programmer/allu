<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $table = 'product_sizes';

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}

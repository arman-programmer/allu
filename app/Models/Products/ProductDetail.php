<?php

namespace App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}

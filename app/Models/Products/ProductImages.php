<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    use HasFactory;

    protected $table = 'product_images';
    protected $fillable = ['product_id', 'link', 'count'];


    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}

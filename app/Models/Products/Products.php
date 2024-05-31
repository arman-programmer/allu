<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function size()
    {
        return $this->hasOne(ProductSize::class, 'product_id', 'id');
    }

    public function details()
    {
        return $this->hasMany(ProductDetail::class, 'product_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImages::class, 'product_id');

    }

    public function country()
    {
        return $this->belongsTo(Countries::class, 'country_id');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturers::class, 'manufacturer_id');
    }
}

<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturers extends Model
{
    use HasFactory;

    protected $table = 'product_manufacturers';

    public function products()
    {
        return $this->hasMany('App\Models\Products\Products', 'manufacturer_id');
    }
}

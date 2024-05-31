<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;

    protected $table = 'product_countries';

    public function products()
    {
        return $this->hasMany('App\Models\Products\Products', 'country_id', 'id');
    }
}

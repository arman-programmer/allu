<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'user_carts';

    protected $fillable = [
        'user_id', 'product_id', 'quantity'
    ];

    public $timestamps = true;
}

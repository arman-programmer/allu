<?php

namespace App\Models\Orders;

use App\Models\Account\Addresses;
use App\Models\Products\Products;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public function address()
    {
        return $this->belongsTo(Addresses::class, 'address_id', 'id');
    }
}

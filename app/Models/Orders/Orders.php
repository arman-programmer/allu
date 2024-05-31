<?php

namespace App\Models\Orders;

use App\Models\Account\Addresses;
use App\Models\Account\User;
use App\Models\Products\Products;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public function address()
    {
        return $this->belongsTo(Addresses::class, 'address_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

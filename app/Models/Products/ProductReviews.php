<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use App\Models\Account\User;

class ProductReviews extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

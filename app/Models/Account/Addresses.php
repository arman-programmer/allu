<?php

namespace App\Models\Account;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    use HasFactory;

    protected $table = 'user_addresses';
    protected $fillable = ['name'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}

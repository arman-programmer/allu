<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account\User;


class CallBack extends Model
{
    protected $table = 'callback_numbers';
    protected $fillable = [
        'user_id', 'phone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

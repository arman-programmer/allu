<?php

namespace App\Models\Account;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function session()
    {
        return $this->belongsTo('App\Models\Account\Session', 'id', 'user_id');
    }

    public function addresses()
    {
        return $this->hasMany('App\Models\Account\Addresses', 'user_id', 'id');
    }
}

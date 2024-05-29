<?php

namespace App\Http\Traits;

use App\Models\City;
use Illuminate\Support\Facades\Auth;

trait CurrentCity
{
    public function getCurrentCity()
    {
        $user = Auth::user();
        if ($user) {
            $id = $user->city_id;
            if ($id == null) {
                $id = 1;
                $user->city_id = $id;
                $user->save();
            }
        } else {
            $id = session()->get('city_id');
            if ($id == null) {
                $id = 1;
                session(['city_id' => $id]);
            }
        }
        return $id;
    }
}

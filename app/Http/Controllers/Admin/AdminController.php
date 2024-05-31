<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account\Session;
use App\Models\Account\User;
use App\Models\Products\Category;
use App\Models\Products\Products;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }

    public function users()
    {
        $users = User::with('city', 'session')->get();
        return view('admin.users', compact('users'));
    }

    public function online()
    {
        $onlines = Session::with('user.city', 'city')
            ->orderBy('last_activity', 'desc')
            ->get();

        return view('admin.users.online', compact('onlines'));
    }

}

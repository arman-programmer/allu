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
        return view('admin.users');
    }

    public function online()
    {
        $onlines = Session::with('user.city', 'city')->get();
        return view('admin.users.online', compact('onlines'));
    }
}

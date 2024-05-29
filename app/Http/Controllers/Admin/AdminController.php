<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products\Category;
use App\Models\Products\Products;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }

    public function orders()
    {
        return view('admin.orders');
    }
}

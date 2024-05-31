<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders\Orders;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders()
    {
        $orders = Orders::all();
        return view('admin.orders', compact(
            'orders',
        ));
    }
}

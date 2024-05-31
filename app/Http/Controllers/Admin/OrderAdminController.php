<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders\Orders;
use Illuminate\Http\Request;

class OrderAdminController extends Controller
{
    public function orders()
    {
        $orders = Orders::with('address')->all();
        return view('admin.orders', compact(
            'orders',
        ));
    }
}

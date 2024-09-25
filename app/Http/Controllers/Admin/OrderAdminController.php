<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders\OrderProducts;
use App\Models\Orders\Orders;
use Illuminate\Http\Request;

class OrderAdminController extends Controller
{
    public function orders()
    {
        $orders = Orders::with('address.city', 'user')->get();
        return view('admin.order.orders', compact(
            'orders',
        ));
    }

    public function delete($id)
    {
        $order = Orders::find($id);
        $order->delete();
        $order_products = OrderProducts::where('order_id', $id)->get();
        if ($order_products) {
            foreach ($order_products as $product) {
                $product->delete();
            }
        }

        return redirect()->back()->with('success', 'Заказ удален');
    }
}

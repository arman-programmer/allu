<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Http\Traits\CurrentCity;
use App\Http\Traits\GetCartTrait;
use App\Http\Traits\LoginConfirm;
use App\Models\Account\Addresses;
use App\Models\Account\Cart;
use App\Models\City;
use App\Models\Orders\OrderProducts;
use App\Models\Orders\Orders;
use App\Models\Products\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Sodium\add;

class OrderController extends Controller
{
    use CurrentCity;
    use LoginConfirm;
    use GetCartTrait;

    public function follow($id)
    {
        $order = Orders::where('id', $id)->first();
        $products = OrderProducts::where('order_id', $id)->get();
        return view('orders.follow', compact(
            'order',
            'products'
        ));
    }

    public function checkout()
    {
        $products = $this->getCartItems();
        $total = $products[1];
        $products = $products[0];
        if ($products == null) {
            return redirect()->route('cart');
        }
        $cities = City::pluck('name', 'id');
        $current_city = City::find($this->getCurrentCity())->name;
        return view('orders.checkout', compact(
            'products',
            'total',
            'cities',
            'current_city'
        ));
    }

    public function create(Request $request)
    {
        $rules = [
            'address' => 'required|string|max:255',
            'comment' => 'nullable|string',
            'rules' => 'required|in:on'
        ];

        $messages = [
            'address.required' => 'Адрес обязателен для заполнения.',
            'rules.required' => 'Вы должны согласиться с правилами.',
            'rules.in' => 'Неверное значение для поля правил.'
        ];
        if (!Auth::check()) {
            $rules = [
                'phone' => 'required|min:17|max:17',
            ];
            $messages = [
                'phone.required' => 'Телефон обязателен для заполнения.',
            ];
        }
        $data = $request->validate($rules, $messages);
        if (Auth::check()) {
            $userId = Auth::id();
            $order = new Orders();
            $order->user_id = $userId;
            $order->comment = $data['comment'];
            $order->status = 0;
            $address = $request->address;
            $exit_address_id = Addresses::where('name', $address)->where('user_id', $userId)->exists();
            if ($exit_address_id) {
                $address_id = Addresses::where('name', $address)->where('user_id', $userId)->first()->id;
            } else {
                $new_address = new Addresses();
                $new_address->name = $address;
                $new_address->user_id = $userId;
                $new_address->city_id = $this->getCurrentCity();
                $new_address->save();
                $address_id = $new_address->id;
            }
            $order->address_id = $address_id;
            $order->save();
            $products = $this->getCartItems();
            $products = $products[0];
            foreach ($products as $product) {
                OrderProducts::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $product->quantity,
                    'price' => $product->price,
                ]);
                $product->delete();
            }
        } else {
            $this->userConfirmSave($request->phone);
            return redirect()->route('confirm')->with('info', 'Подтвердите номер');
        }
        return redirect()->route('home', ['id' => $order->id]);
    }

}

<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\Addresses;
use App\Models\Orders\OrderProducts;
use App\Models\Orders\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::id();
        $orders = Orders::where('user_id', $user)
            ->with('orderProducts')
            ->get()
            ->reverse();

        $addresses = Addresses::where('user_id', $user)->get();
        return view('account.account', compact('addresses', 'orders'));
    }


    public function edit(Request $request)
    {
        // Валидация входных данных
        $request->validate([
            'name' => ['required', 'string', 'max:20', 'regex:/^[\p{L}\s]*$/u']
        ], [
            'name.required' => 'Имя обязательно для заполнения.',
            'name.string' => 'Имя должно быть строкой.',
            'name.max' => 'Имя не должно превышать 20 символов.',
            'name.regex' => 'Имя должно содержать только буквы и пробелы.'
        ]);

        // Обновление имени пользователя
        $name = $request->input('name');
        $user = Auth::user();
        $user->name = $name;
        $user->save();

        return redirect()->back()->with('success', 'Имя успешно обновлено!');
    }


    public function deleteAddress($id)
    {
        Addresses::destroy($id);
        return redirect()->back()->with('success', 'Адрес успешно удалён!');
    }

    public function order($id)
    {
        $order = Orders::where('id', $id)->first();

        if ($order && $order->user_id == Auth::id()) {
            $products = OrderProducts::with(['product', 'product.images'])
                ->where('order_id', $id)
                ->get();

            return view('account.order', compact('order', 'products'));
        } else {
            return redirect()->route('account')->with('info', 'Такого заказа не существует!');
        }
    }


}

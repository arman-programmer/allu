<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Traits\LoginConfirm;
use App\Models\Account\UserConfirms;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Account\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Account\Cart;


class AuthController extends Controller
{
    use LoginConfirm;

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|min:17|max:17',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors("Введите корректный номер")->withInput();
        }
        $this->userConfirmSave($request->phone);
        return redirect()->route('confirm');
    }

    public function confirm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|digits:4',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors("Повторите попытку");
        }

        $session_id = $request->session()->getId();
        $confirm = UserConfirms::where('session_id', $session_id)->first();
        if ($confirm->code != $request['code']) {
            return redirect()->back()->withErrors('Неверный код');
        }

        $phone = $confirm->phone;

        $user = User::where('phone', $phone)->first();
        if (!$user) {
            $user = new User();
            $user->phone = $phone;
            $user->role = 'customer';
            $user->save();
        }
        Auth::login($user, true);
        $cart = $request->session()->get('cart', []);
        $user_id = auth()->id();
        // Записываем товары из куки в базу данных
        foreach ($cart as $item) {
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
            ]);
        }
        // Очищаем куки
        $request->session()->forget('cart');
        $confirm->delete();
        $previousUrl = url();
        dd($previousUrl);
        return redirect()->back()->with('success', 'Вы вошли в аккаунт!');
    }

    public function confirmPage(Request $request)
    {
        $session_id = $request->session()->getId();
        $user_confirm = UserConfirms::where('session_id', $session_id)->first();
        $date = Carbon::parse($user_confirm->updated_at);
        $now = Carbon::now();
        $time = (int)$date->diffInSeconds($now);
        $phone = $user_confirm->phone;
        $user = User::where('phone', $phone)->first();
        if ($user) {
            if ($user->name) {
                $text = "Добро пожаловать " . $user->name . "!";
            } else {
                $text = "Добро пожаловать!";
            }
        } else {
            $text = "Впервые на сайте?";
        }
        return view('account.confirm', compact(
            'time',
            'phone',
            'text'
        ));
    }


    public function confirmCancel(Request $request)
    {
        $session_id = $request->session()->getId();
        $user_confirm = UserConfirms::where('session_id', $session_id)->first();
        $user_confirm->delete();
        return redirect()->back();
    }

    public function confirmResend(Request $request)
    {
        $session_id = $request->session()->getId();
        $user_confirm = UserConfirms::where('session_id', $session_id)->first();
        $phone = $user_confirm->phone;
        $user_confirm->delete();
        $this->userConfirmSave($phone);
        return redirect()->route('confirm')->with('success', 'Код отправлен повторно!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Вы вышли с аккаунта');
    }
}

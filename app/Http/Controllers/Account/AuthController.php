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
        return redirect()->back();
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
                $text = "Добро пожаловать " . $user->name;
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
        $code = $user_confirm->code;
        $phone = $user_confirm->phone;
        $response = Http::timeout(5)->get('https://api.mobizon.kz/service/message/sendsmsmessage?recipient=7' . $phone . '&text=Ваш+код+от+allu.kz: +' . $code . '%21&apiKey=kza34fad2b4a5af5ceb06322b4919a198bd41d6eb82ce0a579aef4326330e05c6a5b78');
        if ($response->ok()) {
            $user_confirm->status = 1;
            $user_confirm->updated_at = Carbon::now();
            $user_confirm->save();
            return redirect()->route('confirm');
        } else {
            return redirect()->back()->withErrors('Произошла ошибка на сервере');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Products\Category;
use Illuminate\Http\Request;
use App\Models\Account\User;
use App\Models\CallBack;
use App\Models\Blog\Posts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public function home()
    {
        $categories = Category::where('status', 1)->with('sub')->get();
        $posts = Posts::latest()->take(3)->get();
        return view('home', compact('categories', 'posts'));
    }

    // TODO: normalize call
    public function call(Request $request)
    {
        $phone = mb_substr(preg_replace("/[^0-9]/", "", $request->phone), 1);
        $user = User::where('phone', $phone)->first();
        if ($user) {
            CallBack::create([
                'user_id' => $user->id,
                'phone' => $phone,
            ]);
        } else {
            CallBack::create([
                'user_id' => null,
                'phone' => $phone,
            ]);
        }
        return redirect()->back()->with('success', 'Мы вам перезвоним!');
    }

    public function changeCity(Request $request)
    {
        $city_name = $request->input('city');
        $city = City::where('name', $city_name)->first();
        $user = Auth::user();
        if ($user) {
            $user->city_id = $city->id;
            $user->save();
        } else {
            $request->session()->put('city_id', $city->id);
        }
        return redirect()->back()->with('success', $city_name . ' теперь ваш город');
    }
}

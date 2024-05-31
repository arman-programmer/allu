<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account\Addresses;
use App\Models\Orders\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::id();
        $orders = Orders::where('user_id', $user)->get();
        $addresses = Addresses::where('user_id', $user)->get();
        return view('account.account', compact(
            'addresses',
            'orders'
        ));
    }

    public function edit(Request $request)
    {
        dd($request->all());
        return redirect()->back();
    }

    public function deleteAddress($id)
    {
        Addresses::destroy($id);
        return redirect()->back();
    }
}

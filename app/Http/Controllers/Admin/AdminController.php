<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account\Session;
use App\Models\Account\User;
use App\Models\Products\Category;
use App\Models\Products\Countries;
use App\Models\Products\Manufacturers;
use App\Models\Products\ProductReviews;
use App\Models\Products\Products;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }

    public function users()
    {
        $users = User::with('city', 'session')->get();
        return view('admin.users.users', compact('users'));
    }

    public function online()
    {
        $onlines = Session::with('user.city', 'city')
            ->orderBy('last_activity', 'desc')
            ->get();

        return view('admin.users.online', compact('onlines'));
    }

    public function reviews()
    {
        $reviews = ProductReviews::with('user', 'product')->get();
        return view('admin.product.reviews', compact('reviews'));
    }

    public function reviewOn($id)
    {
        $review = ProductReviews::where('id', $id)->first();
        $review->status = 1;
        $review->save();
        return redirect()->back();
    }

    public function reviewOff($id)
    {
        $review = ProductReviews::where('id', $id)->first();
        $review->status = 0;
        $review->save();
        return redirect()->back();
    }

    public function reviewDelete($id)
    {
        $review = ProductReviews::where('id', $id)->first();
        $review->delete();
        return redirect()->back();
    }

    public function manufacturers()
    {
        $manufacturers = Manufacturers::with('products')->get();
        return view('admin.manufacturers', compact('manufacturers'));
    }

    public function manufacturerDelete($id)
    {
        $manufacturer = Manufacturers::where('id', $id)->first();
        $manufacturer->delete();
        return redirect()->back();
    }

    public function countries()
    {
        $countries = Countries::with('products')->get();
        return view('admin.countries', compact('countries'));
    }

    public function countryDelete($id)
    {
        $country = Manufacturers::where('id', $id)->first();
        $country->delete();
        return redirect()->back();
    }
}

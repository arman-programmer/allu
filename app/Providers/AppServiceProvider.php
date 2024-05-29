<?php

namespace App\Providers;

use App\Http\Traits\CurrentCity;
use App\Http\Traits\GetCartTrait;
use App\Models\Products\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Products\Products;
use App\Models\Account\Cart;
use App\Models\City;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;


class AppServiceProvider extends ServiceProvider
{
    use GetCartTrait;
    use CurrentCity;

    public function boot()
    {
        $categories = Category::where('status', 1);
        View::share('categories', $categories);

        View::composer('common.layout', function ($view) {
            $products = $this->getCartItems();
            $total = $products[1];
            $products = $products[0];
            $cities = City::pluck('name', 'id');
            $current_city = City::find($this->getCurrentCity())->name;
            $view->with('current_city', $current_city);
            $view->with('cities', $cities);
            $view->with('total', $total);
            $view->with('products', $products);
        });
    }

    public function register()
    {
        //
    }
}

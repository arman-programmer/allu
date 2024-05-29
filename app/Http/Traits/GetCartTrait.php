<?php

namespace App\Http\Traits;

use App\Models\Account\Cart;
use App\Models\Products\Products;
use Illuminate\Support\Facades\Auth;

trait GetCartTrait
{
    public function getCartItems()
    {
        if (!Auth::check()) {
            $cart_products = session()->get('cart');
            $total = 0;

            if (!empty($cart_products)) {
                $productIds = array_column($cart_products, 'product_id');
                $products = Products::whereIn('id', $productIds)->where('status', 1)->with('images')->get();

                foreach ($products as $product) {
                    foreach ($cart_products as $item) {
                        if ($product->id == $item['product_id']) {
                            $product->quantity = $item['quantity'];
                            $total += $product->price * $item['quantity'];
                            break;
                        }
                    }
                }
            } else {
                $products = null;
            }
        } else {
            $user_id = auth()->id();

            // Получаем товары из корзины пользователя из базы данных
            $cart_products = Cart::where('user_id', $user_id)->get();
            $total = 0;

            if (!$cart_products->isEmpty()) {
                $productIds = $cart_products->pluck('product_id')->toArray();

                // Получаем информацию о товарах из базы данных
                $products = Products::whereIn('id', $productIds)->where('status', 1)->with('images')->get();

                // Вычисляем общую стоимость товаров в корзине
                foreach ($products as $product) {
                    foreach ($cart_products as $cart_product) {
                        if ($product->id == $cart_product->product_id) {
                            $product->quantity = $cart_product->quantity;
                            $total += $product->price * $cart_product->quantity;
                            break;
                        }
                    }
                }
            } else {
                $products = null;
            }
        }
        return [$products, $total];
    }
}

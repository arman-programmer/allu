<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Traits\GetCartTrait;
use Illuminate\Http\Request;
use App\Models\Products\Products;
use Illuminate\Support\Facades\Auth;
use App\Models\Account\Cart;


class CartController extends Controller
{
    use GetCartTrait;

    public function index()
    {
        $products = $this->getCartItems();
        $total = $products[1];
        $products = $products[0];
        if ($products != null) {
            return view('account.cart', compact('products', 'total'));
        } else {
            return view('account.cart_empty', compact('products', 'total'));
        }
    }

    public function add(Request $request)
    {
        if (!Auth::check()) {
            $cart = $request->session()->get('cart', []);
            if (isset($cart[$request->product_id])) {
                $cart[$request->product_id]['quantity'] += $request->quantity;
            } else {
                $cart[$request->product_id] = [
                    "product_id" => $request->product_id,
                    "quantity" => $request->quantity,
                ];
            }
            $request->session()->put('cart', $cart);
        } else {
            // Получаем текущую корзину пользователя из БД или создаем новую, если она отсутствует
            $userCart = Cart::firstOrNew([
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
            ]);

            // Увеличиваем количество товара, если он уже есть в корзине, иначе добавляем новый товар
            $userCart->quantity = $userCart->exists ? $userCart->quantity + $request->quantity : $request->quantity;
            $userCart->save();
        }

        // Возвращаем JSON-ответ
        return response()->json(['success' => true, 'message' => 'Товар добавлен в корзину!']);
    }


    public function update(Request $request)
    {
        $productId = $request->product_id;
        $quantity = $request->quantity;
        $total = 0;

        if (!Auth::check()) {
            $cart = $request->session()->get('cart', []);
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = $quantity;
            }
            $request->session()->put('cart', $cart);
            foreach ($cart as $item) {
                $product = Products::find($item['product_id']);
                $total += $product->price * $item['quantity'];
            }
        } else {
            $cartItem = Cart::where('user_id', auth()->id())
                ->where('product_id', $productId)
                ->first();

            if ($cartItem) {
                $cartItem->quantity = $quantity;
                $cartItem->save();
            }

            $userCart = Cart::where('user_id', auth()->id())->get();
            foreach ($userCart as $itemCart) {
                $price = Products::where('id', $itemCart->product_id)->first()->price;
                $total += $price * $itemCart->quantity;
            }
        }

        $product = Products::find($productId);
        $subtotal = $product->price * $quantity;

        return response()->json([
            'success' => true,
            'subtotal' => $subtotal,
            'total' => $total,
        ]);
    }

    public function remove(Request $request)
    {
        if (!Auth::check()) {
            $id = $request->product_id;
            $cart = $request->session()->get('cart');
            if (isset($cart[$id])) {
                unset($cart[$id]);
            }
            $request->session()->put('cart', $cart);
        } else {
            Cart::where('user_id', auth()->id())
                ->where('product_id', $request->product_id)
                ->delete();
        }
        return redirect()->back()->with('success', 'Товар удалён с корзины!');
    }

    public function clear(Request $request)
    {
        if (!Auth::check()) {
            $request->session()->forget('cart');
        } else {
            $user_id = auth()->id();
            Cart::where('user_id', $user_id)->delete();
        }
        return redirect()->back()->with('success', 'Корзина очищена!');
    }
}

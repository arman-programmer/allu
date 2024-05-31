<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Traits\CurrentCity;
use App\Models\Products\Countries;
use App\Models\Products\Manufacturers;
use Illuminate\Http\Request;
use App\Models\Products\Products;
use App\Models\Products\Category;
use App\Models\Products\ProductReviews;
use Illuminate\Support\Facades\Auth;
use App\Models\City;


class ProductsController extends Controller
{
    use CurrentCity;

    public function products(Request $request, $id)
    {
        $current_city = $this->getCurrentCity();
        $sortField = $request->input('sort_field', 'id');
        $sortDirection = $request->input('sort_direction', 'asc');
        $products = Products::where('category_id', $id)->where('status', 1)
            ->where('city_id', $current_city)->orderBy($sortField, $sortDirection)
            ->paginate(16);
        $categories = Category::where('status', 1)->get();
        $category = $categories->where('id', $id)->first();
        $sub = Category::where('sub', $id)->get();
        return view('products.products', compact('products', 'categories', 'sub', 'category'));
    }

    public function product($id)
    {
        $product = Products::with(['size', 'details', 'country', 'manufacturer', 'images'])->find($id);
        $reviews = ProductReviews::with('user')->where('product_id', $id)->get();
        $recom = Products::inRandomOrder()->with(['images'])->take(5)->get();
        $totalReviews = $reviews->count();
        $averageRating = round($reviews->avg('stars'), 2);
        $city = City::find($product->city_id)->name;
        $category = Category::find($product->category_id);
        return view('products.product', compact('product', 'reviews', 'recom', 'totalReviews', 'averageRating', 'city', 'category'));
    }

    public function review(Request $request, $productId)
    {
        $review = new ProductReviews();
        $review->text = $request->text;
        $review->user_id = auth()->id();
        $review->product_id = $productId;
        $review->stars = $request->stars;
        $review->save();

        return redirect()->back()->with('success', 'Отзыв успешно добавлен');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $products = Products::where('name', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")->where('status', 1)
            ->paginate(16);
        return view('products.products', compact('products', 'search'));
    }

    public function country($id)
    {
        $products = Products::where('country_id', $id)->paginate(16);

        $country = Countries::where('id', $id)->first();
        return view('products.products', compact('products', 'country'));
    }

    public function manufacturer($id)
    {
        $products = Products::where('manufacturer_id', $id)->paginate(16);
        $manufacturer = Manufacturers::where('id', $id)->first();
        return view('products.products', compact('products', 'manufacturer'));
    }
}

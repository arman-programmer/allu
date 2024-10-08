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

    public function category(Request $request, $id)
    {
        $current_city = $this->getCurrentCity();
        $sortField = $request->input('sort_field', 'id');
        $sortDirection = $request->input('sort_direction', 'asc');
        $sub = Category::where('sub', $id)->get();
        $products = Products::where('category_id', $id)
            ->where('status', 1)
            ->where('city_id', $current_city)
            ->orderBy($sortField, $sortDirection)
            ->with(['images', 'reviews'])
            ->paginate(16);
        if ($products->isEmpty()) {
            // Получаем все ID субкатегорий
            $subCategoryIds = Category::where('sub', $id)->pluck('id');

            // Получаем продукты из всех субкатегорий
            $products = Products::whereIn('category_id', $subCategoryIds)
                ->where('status', 1)
                ->where('city_id', $current_city)
                ->orderBy($sortField, $sortDirection)
                ->with(['images', 'reviews'])
                ->paginate(16);
        }
        $categories = Category::where('status', 1)->get();
        $category = $categories->where('id', $id)->first();
        return view('products.products', compact('products', 'categories', 'sub', 'category'));
    }

    public function product($id)
    {
        $product = Products::with(['size', 'details', 'images', 'country', 'manufacturer', 'reviews'])->find($id);
        $recommendations = Products::inRandomOrder()->with(['images'])->take(5)->get();
        $totalReviews = $product->reviews->count();
        $averageRating = round($product->reviews->avg('stars'), 2);
        $city = City::find($product->city_id)->name;
        $category = Category::find($product->category_id);
        return view('products.product', compact('product', 'recommendations', 'totalReviews', 'averageRating', 'city', 'category'));
    }

    public function reviewAdd(Request $request, $productId)
    {
        $messages = [
            'text.required' => 'Пожалуйста, введите текст отзыва.',
            'text.max' => 'Текст отзыва не должен превышать 100 символов.',
            'stars.required' => 'Пожалуйста, выберите оценку.',
        ];

        $validatedData = $request->validate([
            'text' => 'required|max:100',
            'stars' => 'required|integer|min:1|max:5',
        ], $messages);

        $review = new ProductReviews();
        $review->text = $validatedData['text'];
        $review->user_id = auth()->id();
        $review->product_id = $productId;
        $review->status = 0;
        $review->stars = $validatedData['stars'];
        $review->save();

        return redirect()->back()->with('success', 'Отзыв успешно добавлен');
    }


    public function search(Request $request)
    {
        $search = $request->input('search');
        $current_city = $this->getCurrentCity();
        $sortField = $request->input('sort_field', 'id');
        $sortDirection = $request->input('sort_direction', 'asc');
        $products = Products::where('name', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            ->where('status', 1)
            ->where('city_id', $current_city)
            ->orderBy($sortField, $sortDirection)
            ->with(['images', 'reviews'])
            ->paginate(16);
        $categories = Category::where('status', 1)->get();
        return view('products.products', compact('products', 'categories', 'search'));
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

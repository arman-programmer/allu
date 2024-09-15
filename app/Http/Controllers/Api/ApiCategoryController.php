<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products\Category;
use App\Models\Products\Products;
use Illuminate\Http\Request;

class ApiCategoryController extends Controller
{
    public function read()
    {
        return response()->json(Category::all());
    }

    public function create(Request $request)
    {
        $product = new Products();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = rand(5, 100);
        $product->city_id = 1;
        $product->status = 0;
        $product->save();
        return response()->json($product, 201);
    }
}

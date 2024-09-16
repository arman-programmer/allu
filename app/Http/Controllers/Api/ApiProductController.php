<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products\Category;
use App\Models\Products\ProductImages;
use App\Models\Products\Products;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    public function read()
    {
        return response()->json(Products::all());
    }

    public function create(Request $request)
    {
        $category = Category::where('name', $request->category)->get();
        $product = new Products();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $category->id;
        $product->stock = rand(5, 100);
        $product->city_id = 1;
        $product->status = 0;
        $product->save();
        $count = 1;
        foreach ($request->images as $image) {
            $productImage = new ProductImages();
            $productImage->product_id = $product->id;
            $productImage->link = $image;
            $productImage->count = $count++;
            $productImage->save();
        }
        return response()->json($product->id, 201);
    }

    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);
        $product->update($request->all());
        return response()->json($product);
    }

    public function destroy($id)
    {
        Products::destroy($id);
        return response()->json(null, 204);
    }
}

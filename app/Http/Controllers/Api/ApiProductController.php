<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products\Products;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    public function index()
    {
        return response()->json(Products::all());
    }

    public function store(Request $request)
    {
        return response()->json($request, 201);
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

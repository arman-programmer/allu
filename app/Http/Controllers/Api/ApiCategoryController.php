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
        $category = new Category();
        $category->name = $request->name;
        $category->thumb = $request->thumb;
        $category->sub = $request->sub;
        $category->status = 0;
        $category->save();
        return response()->json($category, 201);
    }
}

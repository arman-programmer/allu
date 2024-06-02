<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products\Category;
use App\Models\Products\Products;
use Illuminate\Http\Request;

class CategoryAdminController extends Controller
{
    public function index()
    {
        $categories = Category::with('subCategory')
            ->withCount('products')
            ->get();
        return view('admin.categories', compact('categories'));
    }

    public function on($id)
    {
        $category = Category::find($id);
        $category->status = 1;
        $category->save();
        return redirect()->back();
    }

    public function off($id)
    {
        $category = Category::find($id);
        $category->status = 0;
        $category->save();
        return redirect()->back();
    }
}

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
        $categories = Category::withCount('products')
            ->get();
        return view('admin.product.categories', compact('categories'));
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
        return redirect()->back()->with('success', 'Категория отключена');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        Products::where('category_id', $id)->update(['category_id' => null]);

        return redirect()->back()->with('success', 'Категория удалена');
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Products\ProductReviews;
use Illuminate\Http\Request;

class ReviewAdminController extends Controller
{
    public function index()
    {
        $reviews = ProductReviews::with('user', 'product')->get();
        return view('admin.product.review.list', compact('reviews'));
    }

    public function on($id)
    {
        $review = ProductReviews::where('id', $id)->first();
        $review->status = 1;
        $review->save();
        return redirect()->back();
    }

    public function off($id)
    {
        $review = ProductReviews::where('id', $id)->first();
        $review->status = 0;
        $review->save();
        return redirect()->back();
    }

    public function delete($id)
    {
        $review = ProductReviews::where('id', $id)->first();
        $review->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\Posts;

class PostsController extends Controller
{
    public function posts() {
        $posts = Posts::paginate(10);
        $random = Posts::inRandomOrder()->limit(3)->get(); 
        return view('blog.posts', compact('posts', 'random'));
    }
    
    public function post($id) {
        $post = Posts::find($id);
        $random = Posts::inRandomOrder()->limit(3)->get(); 
        return view('blog.post', compact('post', 'random'));
    }
    public function search(Request $request) {
        $search = $request->input('search');
        $posts = Posts::where('title', 'like', '%' . $search . '%')->paginate(10);
        $random = Posts::inRandomOrder()->limit(3)->get(); 
        return view('blog.posts', compact('posts', 'random', 'search'));
    }
} 
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

   public function index() {
        $cat = Category::where('url', 'blog')->firstOrFail();
        $posts = Post::where('category_id', $cat->id)->get();
        $feat = Category::where('url', 'featured')->firstOrFail();
        $featured = Post::where('category_id', $feat->id)->get();
        return view('home', ['posts' => $posts, 'featured' => $featured]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
}

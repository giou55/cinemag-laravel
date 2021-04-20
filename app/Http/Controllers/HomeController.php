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
        $blog = Category::where('url', 'blog')->firstOrFail();
        $blog_posts = Post::where('category_id', $blog->id)->get();
        $featured = Category::where('url', 'featured')->firstOrFail();
        $feat_posts = Post::where('category_id', $featured->id)->get();
        $first = Category::where('url', 'first')->firstOrFail();
        $first_post = Post::where('category_id', $first->id)->get();
        return view('home', ['posts' => $blog_posts, 'featured' => $feat_posts, 'first' => $first_post]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
}

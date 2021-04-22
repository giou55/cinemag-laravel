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
        $blog_posts = Post::where('category_id', 7)->get();
        $feat_posts = Post::where('category_id', 8)->get();
        $first_post = Post::where('category_id', 9)->get();
        $right_bar = Post::where('category_id', 10)->get();
        return view('home', ['posts' => $blog_posts, 'featured' => $feat_posts, 'first' => $first_post, 'right' => $right_bar]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
}

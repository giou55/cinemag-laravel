<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostsController extends Controller
{
    public function home() { 
        return view('home');
    }

    public function post(Post $post) {
       return view('post', ['post' => $post]);
    }

    public function posts($category) {
        $cat = Category::where('url', $category)->firstOrFail();
        $posts = Post::where('category_id', $cat->id)->get();
        return view('posts', ['posts' => $posts, 'title' => $cat->title]);
    }

    public function search(Request $request) {
        $q = $request->get('q');
        $posts = Post::where('title','like','%'.$q.'%')->orWhere('body','like','%'.$q.'%')->get();
        return view('search', ['q' => $q, 'posts' => $posts]);
    }
}
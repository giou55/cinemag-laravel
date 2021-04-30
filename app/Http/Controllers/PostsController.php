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

    public function cinema() {
        $cat = Category::where('url', 'cinema')->firstOrFail();
        $posts = Post::where('category_id', $cat->id)->get();
        return view('category', ['posts' => $posts, 'title' => 'ΣΙΝΕΜΑ']);
    }

    public function theater() {
        $cat = Category::where('url', 'theater')->firstOrFail();
        $posts = Post::where('category_id', $cat->id)->get();
        return view('category', ['posts' => $posts, 'title' => 'ΘΕΑΤΡΟ']);
    }

    public function music() {
        $cat = Category::where('url', 'music')->firstOrFail();
        $posts = Post::where('category_id', $cat->id)->get();
        return view('category', ['posts' => $posts, 'title' => 'ΜΟΥΣΙΚΗ']);
    }

    public function youtube() {
        $cat = Category::where('url', 'youtube')->firstOrFail();
        $posts = Post::where('category_id', $cat->id)->get();
        return view('category', ['posts' => $posts, 'title' => 'YOUTUBE']);
    }

    public function books() {
        $cat = Category::where('url', 'books')->firstOrFail();
        $posts = Post::where('category_id', $cat->id)->get();
        return view('category', ['posts' => $posts, 'title' => 'ΒΙΒΛΙΑ']);
    }

    public function podcasts() {
        $cat = Category::where('url', 'podcasts')->firstOrFail();
        $posts = Post::where('category_id', $cat->id)->get();
        return view('category', ['posts' => $posts, 'title' => 'PODCASTS']);
    }

    public function blog() {
        $cat = Category::where('url', 'blog')->firstOrFail();
        $posts = Post::where('category_id', $cat->id)->get();
        return view('category', ['posts' => $posts, 'title' => 'BLOG']);
    }

    public function search(Request $request) {
        $q = $request->get('q');
        $posts = Post::where('title','like','%'.$q.'%')->orWhere('body','like','%'.$q.'%')->get();
        return view('posts', ['posts' => $posts]);
    }
}
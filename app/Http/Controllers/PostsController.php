<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function home() { 
        return view('home');
    }

    public function post(Post $post) {
       return view('post', ['post' => $post]);
    }

    public function cinema() {
        $cat = Category::where('url', 'cinema')->firstOrFail();
        $posts = Post::where('category_id', $cat->id)->get();
        return view('category', ['posts' => $posts]);
    }

    public function theater() {
        $cat = Category::where('url', 'theater')->firstOrFail();
        $posts = Post::where('category_id', $cat->id)->get();
        return view('category', ['posts' => $posts]);
    }

    public function music() {
        $cat = Category::where('url', 'music')->firstOrFail();
        $posts = Post::where('category_id', $cat->id)->get();
        return view('category', ['posts' => $posts]);
    }

    public function youtube() {
        $cat = Category::where('url', 'youtube')->firstOrFail();
        $posts = Post::where('category_id', $cat->id)->get();
        return view('category', ['posts' => $posts]);
    }

    public function books() {
        $cat = Category::where('url', 'books')->firstOrFail();
        $posts = Post::where('category_id', $cat->id)->get();
        return view('category', ['posts' => $posts]);
    }

    public function podcasts() {
        $cat = Category::where('url', 'podcasts')->firstOrFail();
        $posts = Post::where('category_id', $cat->id)->get();
        return view('category', ['posts' => $posts]);
    }

    public function posts() {
        $posts = Post::all();
        return view('posts', ['posts' => $posts]);
    }

    public function edit_post(Post $post, Request $request) {
        $categories = Category::all();
        if ($request->method()== 'POST') {
            $post->title = $request->get('title');
            $post->body = $request->get('body');
            $post->category_id = $request->get('category');
            if($post->save()) {
                return redirect('posts');
            } else {
                $msg = 'Κάτι πήγε στραβά, και το άρθρο δεν καταχωρήθηκε επιτυχώς.';
            }
        }
        if ($request->method()== 'GET') {
            $msg = "";
        }
        return view('edit_post', ['text' => $msg, 'post' => $post, 'categories' => $categories]);
    }

    public function delete_post(Post $post) {
        if (Auth::user()->id != $post->user->id) return redirect('posts');
        $post->delete();
        return redirect('posts');
    }

    public function search(Request $request) {
        $q = $request->get('q');
        $posts = Post::where('title','like','%'.$q.'%')->orWhere('body','like','%'.$q.'%')->get();
        return view('posts', ['posts' => $posts]);
    }

    public function new_post(Request $request) {
        $categories = Category::all();
        if ($request->method()== 'POST') {
            $post = new Post();
            $post->title = $request->get('title');
            $post->body = $request->get('body');
            $post->category_id = $request->get('category');
            $post->user_id = Auth::user()->id;
            if ($request->hasFile('photo')) {
                $newfilename = time().$request->file('photo')->getClientOriginalName();
                $request->file('photo')->storeAs('public/post_images', $newfilename);
                $post->image = $newfilename;
            }
            if($post->save()) {
                return redirect('/posts');
            } else {
                $msg = 'Κάτι πήγε στραβά, και το άρθρο δεν καταχωρήθηκε επιτυχώς.';
            }
        }
        if ($request->method()== 'GET') {
            $msg = "";
        }
        return view('new_post', ['text' => $msg, 'categories' => $categories]);
    }

    public function new_category(Request $request) {
        if ($request->method()== 'POST') {
            $category = new Category();
            $category->title = $request->get('title');
            $category->url = $request->get('url');
            if($category->save()) {
                return redirect('/new_category');
            } else {
                $msg = 'Κάτι πήγε στραβά, και κατηγορία δεν καταχωρήθηκε επιτυχώς.';
            }
        }
        if ($request->method()== 'GET') {
            $categories = Category::all();
            $msg = "";
        }
        return view('new_category', ['text' => $msg, 'categories' => $categories]);
    }
}
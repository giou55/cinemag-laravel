<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function post(Post $post) {
       return view('post', ['post' => $post]);
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
                return redirect('posts');
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
                return redirect('new_category');
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

    public function users(User $user, Request $request) {
        if ($request->method()== 'POST') {
            $user = User::where('id', $request->get('user_id'))->first();
            if($request->has('status')){
                //Checkbox checked
                $user->is_activated = 1;
            }else {
                //Checkbox not checked
                $user->is_activated = 0;
            }
            if($user->save()) {
                return redirect('users');
            } else {
                $msg = 'Κάτι πήγε στραβά, και το άρθρο δεν καταχωρήθηκε επιτυχώς.';
            }
        }
        $users = User::all();
        $msg = "";
        return view('users', ['text' => $msg, 'users' => $users]);
    }

    public function delete_user(User $user) {
        $user->delete();
        return redirect('users');
    }
}

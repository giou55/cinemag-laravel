<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class AdminController extends Controller
{
    public function post(Post $post) {
       return view('post', ['post' => $post]);
    }

    public function posts() {
        $posts = Post::all();
        $categories = Category::all();
        return view('posts', ['posts' => $posts, 'categories' => $categories, 'selectedCat' => '']);
    }

    public function postsByCategory($category) {
        $cat = Category::where('url', $category)->firstOrFail();
        $posts = Post::where('category_id', $cat->id)->get();
        $categories = Category::all();
        return view('posts', ['posts' => $posts, 'categories' => $categories, 'selectedCat' => $cat]);
    }

    public function edit_post(Post $post, Request $request) {
        $categories = Category::all();
        if ($request->method()== 'POST') {
            $post->title = $request->get('title');
            $post->body = $request->get('body');
            $post->category_id = $request->get('category');

            if ($request->hasFile('photo')) {
                if (isset($post->image)) {
                    $image_path = public_path('storage/images/' . $post->image);
                    unlink($image_path);
                    $thumb_path = public_path('storage/thumbnails/' . $post->image);
                    unlink($thumb_path);
                }
                $image = $request->file('photo');
                $newfilename = time().$image->getClientOriginalName();
                $request->file('photo')->storeAs('public/images', $newfilename);

                $img = Image::make($image->path());
                $img->resize(240, 240);
                $img->save(public_path('storage/thumbnails/' . $newfilename), 80);

                $post->image = $newfilename;
            }

            if ($post->save()) {
                // return redirect('posts');
                $msg = 'Το άρθρο αποθηκεύτηκε επιτυχώς.';
                return view('edit_post', ['text' => $msg, 'post' => $post, 'categories' => $categories]);
            } else {
                $msg = 'Κάτι πήγε στραβά, και το άρθρο δεν αποθηκεύτηκε επιτυχώς.';
            }
        }
        if ($request->method()== 'GET') {
            $msg = NULL;
        }
        return view('edit_post', ['text' => $msg, 'post' => $post, 'categories' => $categories]);
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
                $image = $request->file('photo');
                $newfilename = time().$image->getClientOriginalName();
                // $request->file('photo')->storeAs('public/images', $newfilename);
                
                $img = Image::make($image->path());
                $img->resize(1000, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path('storage/images/' . $newfilename), 80);

                $img = Image::make($image->path());
                $img->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path('storage/thumbnails/' . $newfilename), 80);

                $post->image = $newfilename;
            }
            if ($post->save()) {
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

    public function delete_post(Post $post) {
        if (Auth::user()->id != $post->user->id) return redirect('posts');
        if (isset($post->image)) {
            $image_path = public_path('storage/images/' . $post->image);
            unlink($image_path);
            $thumb_path = public_path('storage/thumbnails/' . $post->image);
            unlink($thumb_path);
        }
        $post->delete();
        return redirect('posts');
    }

    public function categories() {
        $categories = Category::all();
        return view('categories', ['categories' => $categories]);
    }

    public function new_category(Request $request) {
        $categories = Category::all();
        if ($request->method()== 'POST') {
            $category = new Category();
            $category->title = $request->get('title');
            $category->url = $request->get('url');
            if ($category->save()) {
                // return redirect('categories');
                $msg = 'Η νέα κατηγορία δημιουργήθηκε επιτυχώς.';
                return view('new_category', ['text' => $msg, 'categories' => $categories]);
            } else {
                $msg = 'Κάτι πήγε στραβά, και η κατηγορία δεν δημιουργήθηκε επιτυχώς.';
            }
        }
        if ($request->method()== 'GET') {
            $msg = NULL;
        }
        return view('new_category', ['text' => $msg, 'categories' => $categories]);
    }

    public function edit_category(Category $category, Request $request) {
        if ($request->method()== 'POST') {
            $category->id = $request->get('id');
            $category->title = $request->get('title');
            $category->url = $request->get('url');
            if ($category->save()) {
                $msg = 'Η κατηγορία αποθηκεύτηκε επιτυχώς.';
                return view('edit_category', ['text' => $msg, 'category' => $category]);
            } else {
                $msg = 'Κάτι πήγε στραβά, και η κατηγορία δεν αποθηκεύτηκε επιτυχώς.';
            }
        }
        if ($request->method()== 'GET') {
            $msg = NULL;
        }
        return view('edit_category', ['text' => $msg, 'category' => $category]);
    }

    public function delete_category(Category $category) {
        Post::where('category_id', $category->id)->update(['category_id' => 11]);
        $category->delete();
        return redirect('categories');
    }

    // public function users(User $user, Request $request) {
    //     if ($request->method()== 'POST') {
    //         $user = User::where('id', $request->get('user_id'))->first();
    //         if ($request->has('status')){
    //             //Checkbox checked
    //             $user->is_activated = 1;
    //         } else {
    //             //Checkbox not checked
    //             $user->is_activated = 0;
    //         }
    //         if ($user->save()) {
    //             return redirect('users');
    //         } else {
    //             $msg = 'Κάτι πήγε στραβά, και το άρθρο δεν καταχωρήθηκε επιτυχώς.';
    //         }
    //     }
    //     $users = User::all();
    //     $msg = "";
    //     return view('users', ['text' => $msg, 'users' => $users]);
    // }

    public function users() {
        $users = User::all();
        return view('users', ['users' => $users]);
    }

    public function edit_user(User $user, Request $request) {
        if ($request->method()== 'POST') {
            $user->id = $request->get('id');
            $user->fullname = $request->get('fullname');
            $user->nickname = $request->get('nickname');
            $user->email = $request->get('email');
            $user->is_activated = $request->get('status');
            if ($user->save()) {
                $msg = 'Ο χρήστης αποθηκεύτηκε επιτυχώς.';
                return view('edit_user', ['text' => $msg, 'user' => $user]);
            } else {
                $msg = 'Κάτι πήγε στραβά, και ο χρήστης δεν αποθηκεύτηκε επιτυχώς.';
            }
        }
        if ($request->method()== 'GET') {
            $msg = NULL;
        }
        return view('edit_user', ['text' => $msg, 'user' => $user]);
    }

    public function delete_user(User $user) {
        Post::where('user_id', $user->id)->update(['user_id' => 1]);
        $user->delete();
        return redirect('users');
    }
}

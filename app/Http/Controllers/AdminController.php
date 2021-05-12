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
    public function posts() {
        $posts = Post::all();
        $categories = Category::all();
        return view('admin/posts', ['posts' => $posts, 'categories' => $categories, 'selectedCat' => '']);
    }

    public function postsByCategory($category) {
        $cat = Category::where('url', $category)->firstOrFail();
        $posts = Post::where('category_id', $cat->id)->get();
        $categories = Category::all();
        return view('admin/posts', ['posts' => $posts, 'categories' => $categories, 'selectedCat' => $cat]);
    }

    public function edit_post(Post $post, Request $request) {
        $categories = Category::all();
        if ($request->method()== 'POST') {
            $post->title = $request->get('title');
            if ($request->has('subtitle')) {
                $post->subtitle = $request->get('subtitle');
            }
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
                return redirect('admin/posts')->with('success','Το άρθρο αποθηκεύτηκε επιτυχώς!');
            } else {
                return redirect('admin/posts')->with('error','Κάτι πήγε στραβά, και το άρθρο δεν αποθηκεύτηκε επιτυχώς.');
            }
        }

        return view('admin/edit_post', ['post' => $post, 'categories' => $categories]);
    }

    public function new_post(Request $request) {
        $categories = Category::all();
        if ($request->method()== 'POST') {
            $post = new Post();
            $post->title = $request->get('title');
            if ($request->has('subtitle')) {
                $post->subtitle = $request->get('subtitle');
            }
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
                return redirect('admin/posts')->with('success','Το νέο άρθρο δημιουργήθηκε επιτυχώς!');
            } else {
                return redirect('admin/posts')->with('error','Κάτι πήγε στραβά, και το νέο άρθρο δεν δημιουργήθηκε επιτυχώς.');
            }
        }
        return view('admin/new_post', ['categories' => $categories]);
    }

    public function delete_image(Post $post) {
        $image_path = public_path('storage/images/' . $post->image);
        unlink($image_path);
        $thumb_path = public_path('storage/thumbnails/' . $post->image);
        unlink($thumb_path);
        $post->image = NULL;
        if ($post->save()) {
                return redirect('/admin/edit_post/' . $post->id)->with('success', 'Η εικόνα διαγράφτηκε επιτυχώς!');
        } else {
            return redirect('/admin/edit_post/' . $post->id)->with('error','Κάτι πήγε στραβά, και η εικόνα δεν διαγράφτηκε επιτυχώς.');
        }

        
    }

    public function delete_post(Post $post) {
        // if (Auth::user()->id != $post->user->id) return redirect('posts');
        if (isset($post->image)) {
            $image_path = public_path('storage/images/' . $post->image);
            unlink($image_path);
            $thumb_path = public_path('storage/thumbnails/' . $post->image);
            unlink($thumb_path);
        }
        if ($post->delete()) {
            return redirect('admin/posts')->with('success','Το άρθρο διαγράφτηκε επιτυχώς!');
        } else {
                return redirect('admin/posts')->with('error','Κάτι πήγε στραβά, και το άρθρο δεν διαγράφτηκε επιτυχώς.');
            }
        return redirect('posts');
    }

    public function categories() {
        $categories = Category::all();
        return view('admin/categories', ['categories' => $categories]);
    }

    public function new_category(Request $request) {
        $categories = Category::all();
        if ($request->method()== 'POST') {
            $category = new Category();
            $category->title = $request->get('title');
            $category->url = $request->get('url');
            if ($category->save()) {
                return redirect('admin/categories')->with('success','Η νέα κατηγορία δημιουργήθηκε επιτυχώς!');
            } else {
                return redirect('admin/categories')->with('error','Κάτι πήγε στραβά, και η νέα κατηγορία δεν δημιουργήθηκε επιτυχώς.');
            }
        }
        return view('admin/new_category', ['categories' => $categories]);
    }

    public function edit_category(Category $category, Request $request) {
        if ($request->method()== 'POST') {
            $category->id = $request->get('id');
            $category->title = $request->get('title');
            $category->url = $request->get('url');
            if ($category->save()) {
                return redirect('admin/categories')->with('success','Η κατηγορία αποθηκεύτηκε επιτυχώς!');
            } else {
                return redirect('admin/categories')->with('error','Κάτι πήγε στραβά, και η κατηγορία δεν αποθηκεύτηκε επιτυχώς.');
            }
        }
        return view('admin/edit_category', ['category' => $category]);
    }

    public function delete_category(Category $category) {
        Post::where('category_id', $category->id)->update(['category_id' => 11]);
        if ($category->delete()) {
                return redirect('admin/categories')->with('success','Η κατηγορία διαγράφτηκε επιτυχώς!');
        } else {
            return redirect('admin/categories')->with('error','Κάτι πήγε στραβά, και η κατηγορία δεν διαγράφτηκε επιτυχώς.');
        }
    }

    public function users() {
        $users = User::all();
        return view('admin/users', ['users' => $users]);
    }

    public function edit_user(User $user, Request $request) {
        if ($request->method()== 'POST') {
            $user->id = $request->get('id');
            $user->fullname = $request->get('fullname');
            $user->nickname = $request->get('nickname');
            $user->email = $request->get('email');
            $user->is_activated = $request->get('status');
            if ($user->save()) {
                return redirect('admin/users')->with('success','Ο χρήστης αποθηκεύτηκε επιτυχώς!');
            } else {
                return redirect('admin/users')->with('error','Κάτι πήγε στραβά, και ο χρήστης δεν αποθηκεύτηκε επιτυχώς.');
            }
        }
        return view('admin/edit_user', ['user' => $user]);
    }

    public function delete_user(User $user) {
        Post::where('user_id', $user->id)->update(['user_id' => 1]);
        if ($user->delete()) {
                return redirect('admin/users')->with('success','Ο χρήστης διαγράφτηκε επιτυχώς!');
            } else {
                return redirect('admin/users')->with('error','Κάτι πήγε στραβά, και ο χρήστης δεν διαγράφτηκε επιτυχώς.');
            }
        return redirect('admin/users');
    }
}

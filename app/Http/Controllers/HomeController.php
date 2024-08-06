<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('user_type', 0)->first();
        $categories = Category::getCategoryMenu();
        return view('home.index', ['user' => $user,  'categories' => $categories]);
    }

    public function blog()
    {
        $blogs = Blog::getFrontRecord();
        // Process each blog's description
        foreach ($blogs as $blog) {
            $blog->short_description = strip_tags(Str::limit($blog->description, 170));
        }
        $categories = Category::getCategoryMenu();
        return view('home.blog', ['blogs' => $blogs, 'categories' => $categories]);
    }
    public function show(Request $request, $id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // Handle decryption error
            abort(404);
        }

        $blog = Blog::with(['category', 'user'])->find($decryptedId);


        if (!$blog) {
            abort(404);
        }

        // Set short description
        $blog->short_description = strip_tags(Str::limit($blog->description, 170));

        $categories = Category::getCategoryMenu();


        return view('home.blog_detail', [
            'categories' => $categories,
            'blog' => $blog,
        ]);
    }

    public function filterByCategory($id)
    {
        $id = decrypt($id);
        $blogs = Blog::where('category_id', $id)->paginate(10);
        $categories = Category::getCategoryMenu();
        return view('home.categoryVise', ['blogs' => $blogs,  'categories' => $categories]);
    }
}

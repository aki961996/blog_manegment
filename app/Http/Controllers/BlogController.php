<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::getRecord();
        return view('admin.blog.list', ['blog' => $blog]);
    }

    public function create(Request $request)
    {
        $categories = Category::getRecord();
        return view('admin.blog.add', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'author' => 'required',
            'publish_date' => 'required',
            'image' => 'required'

        ]);


        $category = new Blog();
        $category->title = trim($request->title);
        $category->category_id = trim($request->category);
        $category->user_id = Auth::user()->id;
        $category->description = $request->description;
        $category->tags = trim($request->tags);
        $category->is_publish = trim($request->publish);
        $category->author = trim($request->author);
        $category->publish_date = trim($request->publish_date);
        $category->status = trim($request->status);
        $category->is_delete = 0;

        if ($request->hasFile('image')) {
            $extension = request('image')->extension();
            $fileName = 'blog_image_' . time() . '.' . $extension;

            request('image')->storeAs('images', $fileName);

            $category->image = $fileName;
        }


        $category->save();
        return redirect()->route('blog.list')->with('success', 'New Blog successfully addedd');
    }

    public function edit($id)
    {
        dd('df');
    }


    public function destroy($id)
    {
        dd('df');
    }
}

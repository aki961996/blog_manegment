<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PharIo\Manifest\Author;

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


        $id = decrypt($id);
        $blog = Blog::find($id);
        $categories = Category::getRecord();
        return view('admin.blog.edit', ['blog' => $blog, 'categories' => $categories]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'author' => 'required',
            'publish_date' => 'required',
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $id = $request->id;
        $blog = Blog::getSingleData($id);
        $blog->title = trim($request->title);
        $blog->category_id = trim(($request->category));
        $blog->user_id = Auth::user()->id;
        $blog->description = trim($request->description);
        $blog->tags = trim($request->tags);
        $blog->is_publish = trim($request->is_publish);
        $blog->author = trim($request->author);
        $blog->publish_date = trim($request->publish_date);
        $blog->status = trim($request->status);
        $blog->is_delete = 0;
        //image upload code
        if ($request->hasFile('image')) {
            Storage::delete('images/' . $blog->image);
            $extension = request('image')->extension();
            $fileName = 'blog_image' . time() . '.' . $extension;
            request('image')->storeAs('images', $fileName);
            $blog->image = $fileName;
        }
        $blog->save();
        return redirect()->route('blog.list')->with('success', 'Blog Updated Successfully');
    }


    public function destroy($id)
    {
        $id = $id;
        $category = Blog::find($id);
        $category->is_delete = 1;
        $category->save();
        return redirect()->route('blog.list')->with('success', 'Blog deleted successfully');
    }
}

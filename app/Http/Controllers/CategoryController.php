<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::getRecord();
        return view('admin.catagory.list', ['category' => $category]);
    }
    public function create()
    {
        return view('admin.catagory.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'description' => 'required',
            'keyword' => 'required',

        ]);
        $category = new Category();
        $category->name = trim($request->name);
        $category->slug = trim(str::slug($request->name));
        $category->title = trim($request->title);
        $category->description = trim($request->description);
        $category->keywords = trim($request->keyword);
        $category->status = trim($request->status);
        $category->is_delete = 0;


        $category->save();
        return redirect()->route('category.list')->with('success', 'New Category successfully addedd');
    }

    public function edit($id)
    {
        $id = decrypt($id);
        $category = Category::find($id);

        return view('admin.catagory.edit', ['category' => $category]);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $category = Category::getSingleData($id);
        $category->name = trim($request->name);
        $category->slug = trim(str::slug($request->name));
        $category->title = trim($request->title);
        $category->description = trim($request->description);
        $category->keywords = trim($request->keyword);
        $category->status = trim($request->status);
        $category->is_delete = 0;
        $category->save();
        return redirect()->route('category.list')->with('success', 'Catagory Updated Successfully');
    }

    public function destroy(Request $request, $id)
    {
        $id = $id;
        $category = Category::find($id);
        $category->is_delete = 1;
        $category->save();
        return redirect()->route('category.list')->with('success', 'Catagory deleted successfully');
    }
}

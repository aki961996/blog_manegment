<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class CategoryController extends Controller
{
    public function category()
    {
        $user = User::where('admin_is', 1)->first();
        $data['getRecord'] = Category::getRecord();
        return view('admin.catagory.list', $data, ['user' => $user]);
    }
}

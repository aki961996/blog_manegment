<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('user_type', 0)->first();
        return view('home.index', ['user' => $user]);
    }
}

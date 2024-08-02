<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = User::where('user_type', 1)->first();
        return view('admin.dashboard', ['user' => $user]);
    }
}

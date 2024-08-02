<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function create_user(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|size:8',
        ]);
        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make(trim($request->password));
        $user->remember_token = Str::random(10);
        $user->save();

        Mail::to($user->email)->send(new RegisterMail($user));
        return redirect()->route('login')->with('status', 'Your account created successfully and Verify your email address');
    }

    //when click mail verify button then this api
    public function verify($token)
    {
        $remember_token = $token;
        $user = User::where('remember_token', $remember_token)->first();
        if (!empty($user)) {
            //$user->email_verified_at = date('Y-m-d H:i:s');
            $user->email_verified_at = now();
            $user->remember_token = Str::random(40);
            $user->save();
            return redirect()->route('login')->with('status', 'Your account verified successfully');
        } else {
            abort(404);
        }
    }

    public function auth_login(Request $request)
    {

        $remember = !empty($request->remember) ? 'true' : 'false';

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            if (!empty(Auth::user()->email_verified_at)) {
                // echo 'successfully';
                // die;
                return redirect()->route('dashboard');
            } else {
                $user = new User();
                $user_id = Auth::user()->id;
                Auth::logout();
                $user = $user->getSingle($user_id);
                //remember_token token mati 
                $user->remember_token = Str::random(40);
                $user->save();
                Mail::to($user->email)->send(new RegisterMail($user));
                return redirect()->back()->with('status', 'Please first you can verify your email address');
            }
        } else {
            return redirect()->back()->with('error', 'Please enter current Email and Password');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logout the user

        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect()->route('index')->with('status', 'Logout Successfully');
    }
}

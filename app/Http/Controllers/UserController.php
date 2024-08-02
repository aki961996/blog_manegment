<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function users()
    {

        $users = User::getRecord();
        return view('admin.users.list', ['users' => $users]);
    }

    public function add()
    {
        return view('admin.users.add');
    }
    public function addPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = 0;
        // $user->is_delete = 0;
        $user->save();
        return redirect()->route('users.list')->with('success', 'New User successfully addedd');
    }

    public function edit($id)
    {

        $userData = User::getSingleDataId($id);


        if (!empty($userData)) {
            $data['header_title'] = "Edit Admin";
            return view("admin.users.edit", $data, ['users' => $userData]);
        } else {
            abort(404);
        }
    }

    public function user_update(Request $request)
    {

        $id = $request->id;
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id

        ]);
        $id = $request->id;
        $user = User::getSingleData($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.list')->with('success', 'Data Updated Successfully');
    }

    public function delete($id)
    {
        $user = User::getSingleData($id);
        $user->is_delete = 1;
        $user->save();
        return redirect()->route('users.list')->with('success', 'User deleted successfully');
    }
}

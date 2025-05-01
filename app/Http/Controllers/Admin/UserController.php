<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'roles' => 'required'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    public function show($id){
        $users = User::find($id);
        return view('admin.users.show', compact('users'));
    }

    public function edit($id){
        $users = User::find($id);
        return view('admin.users.edit', compact('users'));
    }

    public function update(Request $request,$id){

        $users = User::find($id);
        $users->update($request->all());
        return redirect()->route('users.index')->with('success', 'Users updated successfully.');
    }

    public function destroy($id){
        $user = User::FindOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success','Users deleted successfully');
    }
}

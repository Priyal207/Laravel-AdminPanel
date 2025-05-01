<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index(){
       $roles =  Role::whereNotIn('name',['Super Admin'])->get();

        return view('admin.role.index',compact('roles'));
    }

    public function create(Request $request){
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Role::create([
            'name' => $request->name,
        ]);
        return redirect()->route('roles.index')->with('success', 'Roles created successfully.');
    }

    public function show($id){
        $roles = Role::find($id);
        return view('roles.show', compact('roles'));
    }

    public function edit($id){
        $roles = Role::find($id);
        return view('roles.edit', compact('roles'));
    }

    public function update(Request $request, $id){
        $roles = Role::find($id);
        $roles->update($request->all());
        return redirect()->route('roles.index')->with('success', 'roles updated successfully.');
    }

    public function destroy($id){
        $roles = Role::FindOrFail($id);
        $roles->delete();
        return redirect()->route('roles.index')->with('success','roles deleted successfully');
    }
}

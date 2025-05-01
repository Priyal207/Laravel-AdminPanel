<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use App\Models\PermissionRole;

class PermissionController extends Controller
{
    public function index(){
        $permissions = Permission::all();
        return view('admin.permission.index',compact('permissions'));
    }

    public function create(Request $request){
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Permission::create([
            'name' => $request->name,
        ]);
        return redirect()->route('permission.index')->with('success', 'Permission created successfully.');
    }

    public function assignPermissionRole(){
        $roles = Role::whereNotIn('name',['Super Admin users'])->get();
        $permissions = Permission::all();
        return view('admin.permission.assign-permission-role',compact('roles','permissions'));
    }

    public function assignPermissions(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
        ]);
        $role = Role::findOrFail($request->role_id);

        $permissions = $request->permissions ?? [];
        $role->givePermissionTo($request->permissions ?? []); // Assign selected permissions

        return redirect()->back()->with('success', 'Permissions assigned successfully.');
    }
}

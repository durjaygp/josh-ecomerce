<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::latest()->get();
        return view('backEnd.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();



        return view('backEnd.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'permissions' => 'required|array',
            'permissions.*' => 'string|exists:permissions,name',
        ]);

        // Create a new role
        $role = Role::create(['name' => $request->name]);

        // Assign permissions to the role
        $role->syncPermissions($request->permissions);

        // Redirect with success message
        return redirect()->route('roles-permission.index')->with('success', 'Role and permissions have been assigned successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::find($id);
        // Get all permissions
        $permissions = Permission::all();

        // Get role permissions
        $rolePermissions = $role->permissions->pluck('name')->toArray();

        return view('backEnd.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('roles')->ignore($id)->where(function ($query) {
                    return $query->where('guard_name', 'web'); // Assuming 'web' is the guard name
                }),
            ],
            'permissions' => 'required|array',
            'permissions.*' => 'string|exists:permissions,name',
        ]);

        $role = Role::find($id);
        // Update the role name
        $role->name = $request->name;
        $role->save();

        // Update the role permissions
        $role->syncPermissions($request->permissions);

        // Redirect with success message
        return redirect()->route('roles-permission.index')->with('success', 'Role and permissions have been updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        return redirect()->route('roles-permission.index')->with('success', 'Role has been deleted successfully!');
    }
}

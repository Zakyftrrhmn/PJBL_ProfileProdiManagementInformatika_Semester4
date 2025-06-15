<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{


    public function index()
    {
        $roles = Role::all();
        return view('pages.role.index', compact('roles'));
    }

    public function create()
    {
        return view('pages.role.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name' // <-- INI PENTING!
        ]);

        Role::create(['name' => $request->name]);

        return redirect()->route('admin.roles.index')->with('success', 'Role dibuat.');
    }
    public function edit(Role $role)
    {

        if ($role->name === 'Superadmin') {
            return redirect()->route('admin.roles.index')->with('error', 'Role Superadmin tidak dapat diubah.');
        }

        $permissions = Permission::all();
        return view('pages.role.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        if ($role->name === 'Superadmin') {
            return redirect()->route('admin.roles.index')->with('error', 'Role Superadmin tidak dapat diubah.');
        }

        $request->validate(['name' => 'required']);
        $role->update(['name' => $request->name]);
        return redirect()->route('admin.roles.index')->with('success', 'Nama role diperbarui.');
    }

    public function destroy(Role $role)
    {
        if ($role->name === 'Superadmin') {
            return redirect()->route('admin.roles.index')->with('error', 'Role Superadmin tidak dapat dihapus.');
        }
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success', 'Role dihapus.');
    }

    public function editPermissions(Role $role)
    {
        $permissions = Permission::all();
        return view('pages.role.permissions', compact('role', 'permissions'));
    }

    public function updatePermissions(Request $request, Role $role)
    {
        $role->syncPermissions($request->permissions);
        return redirect()->route('admin.roles.index')->with('success', 'Permission role diperbarui.');
    }
}

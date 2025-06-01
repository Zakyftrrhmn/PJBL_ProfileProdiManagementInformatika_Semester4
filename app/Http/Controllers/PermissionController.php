<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function index()
    {
        $permissions = Permission::all();
        return view('pages.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('404');
    }

    public function store(Request $request)
    {
        return view('404');
    }

    public function edit(Permission $permission)
    {
        return view('404');
    }

    public function update(Request $request, Permission $permission)
    {
        return view('404');
    }

    public function destroy(Permission $permission)
    {
        return view('404');
    }
}

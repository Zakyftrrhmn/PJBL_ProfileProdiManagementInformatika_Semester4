<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('pages.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('pages.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required|string|min:8|max:20',
                'roles' => 'required'
            ],
            [
                'name.required' => 'Nama harus diisi',
                'email.required' => 'Email harus diisi',
                'password.required' => 'Password harus diisi',
                'roles.required' => 'Role harus diisi',
                'email.unique' => 'Email sudah terdaftar',
                'email.email' => 'Email tidak valid',
                'password.min' => 'Password minimal 8 karakter',
                'password.max' => 'Password maksimal 20 karakter',
                'name.max' => 'Nama maksimal 255 karakter',
                'email.max' => 'Email maksimal 255 karakter',
            ]
        );

        $user = User::create([
            // ID akan otomatis terisi oleh metode boot() di model User
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles($request->roles);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Anda mungkin ingin mengubah ini menjadi route model binding juga:
        // public function show(User $user) { ... return view('pages.user.show', compact('user')); }
        return view('404');
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Ubah parameter dari string $id menjadi User $user (Route Model Binding)
    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        // $user sudah otomatis ditemukan berdasarkan UUID oleh route model binding
        $userRoles = $user->roles()->pluck('name')->all();
        return view('pages.user.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // Ubah parameter dari string $id menjadi User $user (Route Model Binding)
    public function update(Request $request, User $user)
    {
        // Sesuaikan unique rule agar mengecualikan ID user saat ini
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $user->id . ',id', // Gunakan $user->id
                'password' => 'nullable|string|min:8|max:20',
                'roles' => 'required|array',
                'roles.*' => 'string'
            ],
            [
                'name.required' => 'Nama harus diisi',
                'email.required' => 'Email harus diisi',
                'roles.required' => 'Role harus diisi',
                'email.unique' => 'Email sudah terdaftar',
                'email.email' => 'Email tidak valid',
                'password.min' => 'Password minimal 8 karakter',
                'password.max' => 'Password maksimal 20 karakter',
                'name.max' => 'Nama maksimal 255 karakter',
                'email.max' => 'Email maksimal 255 karakter',
            ]
        );

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect()->route('admin.users.index')->with('success', 'Data User Berhasil Di Perbaharui');
    }


    /**
     * Remove the specified resource from storage.
     */
    // Ubah parameter dari string $id menjadi User $user (Route Model Binding)
    public function destroy(User $user)
    {
        // $user sudah otomatis ditemukan berdasarkan UUID oleh route model binding
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Data User Berhasil Di Hapus');
    }
}

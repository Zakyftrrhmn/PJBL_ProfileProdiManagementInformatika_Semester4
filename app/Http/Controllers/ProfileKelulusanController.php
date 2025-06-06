<?php

namespace App\Http\Controllers;

use App\Models\ProfileKelulusan;
use Illuminate\Http\Request;

class ProfileKelulusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profileKelulusan = ProfileKelulusan::all();
        return view('pages.profileKelulusan.index', compact('profileKelulusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.profileKelulusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_profile' => 'required|max:100',
                'deskripsi' => 'required|max:255',
            ],
            [
                'nama_profile.required' => 'Nama profile harus diisi',
                'deskripsi.max' => 'Nama Profile maksimal 100 karakter',
                'deskripsi.required' => 'Deskripsi harus diisi',
                'deskripsi.max' => 'Deskripsi maksimal 255 karakter',
            ]
        );

        ProfileKelulusan::create($request->all());
        return redirect()->route('admin.profile_kelulusan.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProfileKelulusan $profileKelulusan)
    {
        return view('404');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProfileKelulusan $profileKelulusan)
    {
        ProfileKelulusan::findOrFail($profileKelulusan->id);
        return view('pages.profileKelulusan.edit', compact('profileKelulusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfileKelulusan $profileKelulusan)
    {
        $request->validate(
            [
                'nama_profile' => 'required|max:100',
                'deskripsi' => 'required|max:255',
            ],
            [
                'nama_profile.required' => 'Nama profile harus diisi',
                'deskripsi.max' => 'Nama Profile maksimal 100 karakter',
                'deskripsi.required' => 'Deskripsi harus diisi',
                'deskripsi.max' => 'Deskripsi maksimal 255 karakter',
            ]
        );

        $profileKelulusan->update($request->all());
        return redirect()->route('admin.profile_kelulusan.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProfileKelulusan $profileKelulusan)
    {
        $profileKelulusan->delete();
        return redirect()->route('admin.profile_kelulusan.index')->with('success', 'Data berhasil dihapus');
    }
}

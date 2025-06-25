<?php

namespace App\Http\Controllers;

use App\Models\ProfileKelulusan;
use Illuminate\Http\Request;
// use Illuminate\Support\Str; // Tidak diperlukan di controller karena sudah di Model

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
                'nama_profile.max' => 'Nama Profile maksimal 100 karakter', // Perbaiki pesan validasi ini
                'deskripsi.required' => 'Deskripsi harus diisi',
                'deskripsi.max' => 'Deskripsi maksimal 255 karakter',
            ]
        );

        ProfileKelulusan::create($request->all()); // ID akan otomatis terisi oleh metode boot() di model
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
        // Baris ini dihapus karena $profileKelulusan sudah otomatis ditemukan oleh route model binding
        // ProfileKelulusan::findOrFail($profileKelulusan->id);
        return view('pages.profileKelulusan.edit', compact('profileKelulusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProfileKelulusan $profileKelulusan)
    {
        $request->validate(
            [
                // Jika nama_profile harus unik, Anda perlu menambahkan pengecualian ID saat ini:
                // 'nama_profile' => 'required|max:100|unique:profile_kelulusan,nama_profile,' . $profileKelulusan->id . ',id',
                'nama_profile' => 'required|max:100', // Sesuai dengan validasi Anda saat ini
                'deskripsi' => 'required|max:255',
            ],
            [
                'nama_profile.required' => 'Nama profile harus diisi',
                'nama_profile.max' => 'Nama Profile maksimal 100 karakter', // Perbaiki pesan validasi ini
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

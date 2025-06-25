<?php

namespace App\Http\Controllers;

use App\Models\AlasanBergabung;
use Illuminate\Http\Request;

class AlasanBergabungController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alasan_bergabung = AlasanBergabung::all();
        return view('pages.alasan_bergabung.index', compact('alasan_bergabung'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.alasan_bergabung.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'alasan' => 'required|unique:alasan_bergabung,alasan|max:255', // Sesuaikan unique rule
            ],
            [
                'alasan.required' => 'Alasan Bergabung harus diisi',
                'alasan.unique' => 'Alasan Bergabung sudah ada',
                'alasan.max' => 'Alasan Bergabung maksimal 255 karakter',
            ]
        );

        AlasanBergabung::create($request->all()); // ID akan otomatis terisi oleh metode boot() di model
        return redirect()->route('admin.alasan_bergabung.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('404');
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Ubah parameter dari string $id menjadi AlasanBergabung $alasan_bergabung (Route Model Binding)
    public function edit(AlasanBergabung $alasan_bergabung)
    {
        // Tidak perlu lagi find($alasan_bergabung->id) atau findOrFail($alasan_bergabung->id)
        // karena $alasan_bergabung sudah otomatis ditemukan oleh route model binding
        return view('pages.alasan_bergabung.edit', compact('alasan_bergabung'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Ubah parameter dari string $id menjadi AlasanBergabung $alasan_bergabung (Route Model Binding)
    public function update(Request $request, AlasanBergabung $alasan_bergabung)
    {
        // Sesuaikan unique rule agar mengecualikan ID alasan_bergabung saat ini
        $request->validate(
            [
                'alasan' => 'required|unique:alasan_bergabung,alasan,' . $alasan_bergabung->id . ',id|max:255',
            ],
            [
                'alasan.required' => 'Alasan Bergabung harus diisi',
                'alasan.unique' => 'Alasan Bergabung sudah ada',
                'alasan.max' => 'Alasan Bergabung maksimal 255 karakter',
            ]
        );

        $alasan_bergabung->update($request->all());
        return redirect()->route('admin.alasan_bergabung.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Ubah parameter dari string $id menjadi AlasanBergabung $alasan_bergabung (Route Model Binding)
    public function destroy(AlasanBergabung $alasan_bergabung)
    {
        $alasan_bergabung->delete();
        return redirect()->route('admin.alasan_bergabung.index')->with('success', 'Data berhasil dihapus');
    }
}

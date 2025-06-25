<?php

namespace App\Http\Controllers;

use App\Models\KategoriKarya;
use Illuminate\Http\Request;

class KategoriKaryaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori_karya = KategoriKarya::all();
        return view('pages.kategori_karya.index', compact('kategori_karya'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kategori_karya.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_kategori' => 'required|unique:kategori_karya,nama_kategori|max:20', // Sesuaikan unique rule
            ],
            [
                'nama_kategori.required' => 'Kategori harus diisi',
                'nama_kategori.unique' => 'Kategori sudah ada',
                'nama_kategori.max' => 'Kategori maksimal 20 karakter',
            ]
        );

        KategoriKarya::create($request->all()); // ID akan otomatis terisi oleh metode boot() di model
        return redirect()->route('admin.kategori_karya.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    // Menggunakan Route Model Binding
    public function show(KategoriKarya $kategori_karya)
    {
        return view('404');
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Menggunakan Route Model Binding
    public function edit(KategoriKarya $kategori_karya)
    {
        // Tidak perlu lagi find($kategori_karya->id) karena sudah otomatis ditemukan
        return view('pages.kategori_karya.edit', compact('kategori_karya'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Menggunakan Route Model Binding
    public function update(Request $request, KategoriKarya $kategori_karya)
    {
        $request->validate(
            [
                // Sesuaikan unique rule agar mengecualikan ID kategori saat ini
                'nama_kategori' => 'required|unique:kategori_karya,nama_kategori,' . $kategori_karya->id . ',id|max:20',
            ],
            [
                'nama_kategori.required' => 'Kategori harus diisi',
                'nama_kategori.unique' => 'Kategori sudah ada',
                'nama_kategori.max' => 'Kategori maksimal 20 karakter',
            ]
        );

        $kategori_karya->update($request->all());
        return redirect()->route('admin.kategori_karya.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Menggunakan Route Model Binding
    public function destroy(KategoriKarya $kategori_karya)
    {
        $kategori_karya->delete();
        return redirect()->route('admin.kategori_karya.index')->with('success', 'Data berhasil dihapus');
    }
}

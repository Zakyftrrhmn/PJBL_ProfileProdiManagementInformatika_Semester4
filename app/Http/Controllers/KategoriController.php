<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori_informasi = Kategori::all();
        return view('pages.kategori.index', compact('kategori_informasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_kategori' => 'required|unique:kategori,nama_kategori|max:20', // Sesuaikan unique rule
            ],
            [
                'nama_kategori.required' => 'Kategori harus diisi',
                'nama_kategori.unique' => 'Kategori sudah ada',
                'nama_kategori.max' => 'Kategori maksimal 20 karakter',
            ]
        );

        Kategori::create($request->all()); // ID akan otomatis terisi oleh metode boot() di model Kategori
        return redirect()->route('admin.kategori_informasi.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    // Menggunakan Route Model Binding
    public function show(Kategori $kategori_informasi)
    {
        return view('404'); // Tetap 404 jika tidak ada tampilan detail khusus
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Menggunakan Route Model Binding
    public function edit(Kategori $kategori_informasi)
    {
        // Tidak perlu lagi find($kategori_informasi->id) karena sudah otomatis ditemukan
        return view('pages.kategori.edit', compact('kategori_informasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Menggunakan Route Model Binding
    public function update(Request $request, Kategori $kategori_informasi)
    {
        $request->validate(
            [
                // Sesuaikan unique rule agar mengecualikan ID kategori saat ini
                'nama_kategori' => 'required|unique:kategori,nama_kategori,' . $kategori_informasi->id . ',id|max:20',
            ],
            [
                'nama_kategori.required' => 'Kategori harus diisi',
                'nama_kategori.unique' => 'Kategori sudah ada',
                'nama_kategori.max' => 'Kategori maksimal 20 karakter',
            ]
        );

        $kategori_informasi->update($request->all());
        return redirect()->route('admin.kategori_informasi.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Menggunakan Route Model Binding
    public function destroy(Kategori $kategori_informasi)
    {
        $kategori_informasi->delete();
        return redirect()->route('admin.kategori_informasi.index')->with('success', 'Data berhasil dihapus');
    }
}

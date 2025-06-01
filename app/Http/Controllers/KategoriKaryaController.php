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
                'nama_kategori' => 'required|unique:kategori_karya|max:20',
            ],
            [
                'nama_kategori.required' => 'Kategori harus diisi',
                'nama_kategori.unique' => 'Kategori sudah ada',
                'nama_kategori.max' => 'Kategori maksimal 20 karakter',
            ]
        );

        KategoriKarya::create($request->all());
        return redirect()->route('admin.kategori_karya.index')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(KategoriKarya $kategori_karya)
    {
        $kategori_karya = KategoriKarya::find($kategori_karya->id);
        return view('pages.kategori_karya.edit', compact('kategori_karya'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriKarya $kategori_karya)
    {
        $request->validate(
            [
                'nama_kategori' => 'required|unique:kategori_karya|max:20',
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
    public function destroy(KategoriKarya $kategori_karya)
    {
        $kategori_karya->delete();
        return redirect()->route('admin.kategori_karya.index')->with('success', 'Data berhasil dihapus');
    }
}

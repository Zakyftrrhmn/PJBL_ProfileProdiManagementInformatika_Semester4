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
                'nama_kategori' => 'required|unique:kategori|max:20',
            ],
            [
                'nama_kategori.required' => 'Kategori harus diisi',
                'nama_kategori.unique' => 'Kategori sudah ada',
                'nama_kategori.max' => 'Kategori maksimal 20 karakter',
            ]
        );

        Kategori::create($request->all());
        return redirect()->route('admin.kategori_informasi.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori_informasi)
    {
        return view('404');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori_informasi)
    {
        $kategori_informasi = Kategori::find($kategori_informasi->id);
        return view('pages.kategori.edit', compact('kategori_informasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori_informasi)
    {
        $request->validate(
            [
                'nama_kategori' => 'required|unique:kategori|max:20',
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
    public function destroy(Kategori $kategori_informasi)
    {
        $kategori_informasi->delete();
        return redirect()->route('admin.kategori_informasi.index')->with('success', 'Data berhasil dihapus');
    }
}

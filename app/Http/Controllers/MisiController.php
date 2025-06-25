<?php

namespace App\Http\Controllers;

use App\Models\Misi;
use Illuminate\Http\Request;

class MisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $misi = Misi::all();
        return view('pages.misi.index', compact('misi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.misi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'misi' => 'required|unique:misi,misi|max:100', // Sesuaikan unique rule
            ],
            [
                'misi.required' => 'Misi harus diisi',
                'misi.unique' => 'Misi sudah ada',
                'misi.max' => 'Misi maksimal 100 karakter',
            ]
        );

        Misi::create($request->all()); // ID akan otomatis terisi oleh metode boot() di model Misi
        return redirect()->route('admin.misi.index')->with('success', 'Data berhasil ditambahkan');
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
    // Ubah parameter dari Misi $misi (jika sebelumnya string $id)
    public function edit(Misi $misi)
    {
        // $misi sudah otomatis ditemukan berdasarkan UUID oleh route model binding
        // Tidak perlu lagi find($misi->id) atau findOrFail($misi->id)
        return view('pages.misi.edit', compact('misi'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Ubah parameter dari Misi $misi (jika sebelumnya string $id)
    public function update(Request $request, Misi $misi)
    {
        // Sesuaikan unique rule agar mengecualikan ID misi saat ini
        $request->validate(
            [
                'misi' => 'required|unique:misi,misi,' . $misi->id . ',id|max:100',
            ],
            [
                'misi.required' => 'Misi harus diisi',
                'misi.unique' => 'Misi sudah ada',
                'misi.max' => 'Misi maksimal 100 karakter',
            ]
        );

        $misi->update($request->all());
        return redirect()->route('admin.misi.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Ubah parameter dari Misi $misi (jika sebelumnya string $id)
    public function destroy(Misi $misi)
    {
        $misi->delete();
        return redirect()->route('admin.misi.index')->with('success', 'Data berhasil dihapus');
    }
}

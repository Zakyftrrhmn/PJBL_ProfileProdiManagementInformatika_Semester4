<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visiMisi = VisiMisi::all();
        return view('pages.visiMisi.index', compact('visiMisi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.visiMisi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'visi' => 'required|max:255',
            'misi' => 'required|max:255',
        ], [
            'visi.required' => 'Visi wajib diisi',
            'misi.required' => 'Misi wajib diisi',
            'visi.max' => 'Visi maksimal 255 karakter',
            'misi.max' => 'Misi maksimal 255 karakter',
        ]);

        VisiMisi::create($request->all());
        return redirect()->route('visi_misi.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(VisiMisi $visiMisi)
    {
        return view('404');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisiMisi $visiMisi)
    {
        $visiMisi = VisiMisi::find($visiMisi->id);
        return view('pages.visiMisi.edit', compact('visiMisi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VisiMisi $visiMisi)
    {
        $request->validate([
            'visi' => 'required|max:255',
            'misi' => 'required|max:255',
        ], [
            'visi.required' => 'Visi wajib diisi',
            'misi.required' => 'Misi wajib diisi',
            'visi.max' => 'Visi maksimal 255 karakter',
            'misi.max' => 'Misi maksimal 255 karakter',
        ]);

        $visiMisi->update($request->all());
        return redirect()->route('visi_misi.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisiMisi $visiMisi)
    {
        $visiMisi->delete();
        return redirect()->route('visi_misi.index')->with('success', 'Data berhasil dihapus');
    }
}

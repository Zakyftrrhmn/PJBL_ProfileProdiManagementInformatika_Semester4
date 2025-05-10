<?php

namespace App\Http\Controllers;

use App\Models\Deskripsi;
use Illuminate\Http\Request;

class DeskripsiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deskripsi = Deskripsi::all();
        return view('pages.deskripsi.index', compact('deskripsi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.deskripsi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'deskripsi' => 'required|max:500',
            ],
            [
                'deskripsi.required' => 'Deskripsi harus diisi',
                'deskripsi.max' => 'Deskripsi maksimal 500 karakter',
            ]
        );

        Deskripsi::create($request->all());
        return redirect()->route('deskripsi.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Deskripsi $deskripsi)
    {
        return view('404');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deskripsi $deskripsi)
    {
        return view('pages.deskripsi.edit', compact('deskripsi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deskripsi $deskripsi)
    {
        $request->validate(
            [
                'deskripsi' => 'required|max:500',
            ],
            [
                'deskripsi.required' => 'Deskripsi harus diisi',
                'deskripsi.max' => 'Deskripsi maksimal 500 karakter',
            ]
        );

        $deskripsi->update($request->all());
        return redirect()->route('deskripsi.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deskripsi $deskripsi)
    {
        $deskripsi->delete();
        return redirect()->route('deskripsi.index')->with('success', 'Data berhasil dihapus');
    }
}

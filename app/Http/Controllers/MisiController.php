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
                'misi' => 'required|unique:misi|max:100',
            ],
            [
                'misi.required' => 'Misi harus diisi',
                'misi.unique' => 'Misi sudah ada',
                'misi.max' => 'Misi maksimal 100 karakter',
            ]
        );

        Misi::create($request->all());
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
    public function edit(Misi $misi)
    {
        $misi = Misi::find($misi->id);
        return view('pages.misi.edit', compact('misi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Misi $misi)
    {
        $request->validate(
            [
                'misi' => 'required|unique:misi|max:100',
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
    public function destroy(Misi $misi)
    {
        $misi->delete();
        return redirect()->route('admin.misi.index')->with('success', 'Data berhasil dihapus');
    }
}

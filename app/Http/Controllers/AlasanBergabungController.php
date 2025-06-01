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
                'alasan' => 'required|unique:alasan_bergabung|max:255',
            ],
            [
                'alasan.required' => 'Alasan Bergabung harus diisi',
                'alasan.unique' => 'Alasan Bergabung sudah ada',
                'alasan.max' => 'Alasan Bergabung maksimal 255 karakter',
            ]
        );

        AlasanBergabung::create($request->all());
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
    public function edit(AlasanBergabung $alasan_bergabung)
    {
        $alasan_bergabung = AlasanBergabung::find($alasan_bergabung->id);
        return view('pages.alasan_bergabung.edit', compact('alasan_bergabung'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AlasanBergabung $alasan_bergabung)
    {
        $request->validate(
            [
                'alasan' => 'required|unique:alasan_bergabung|max:255',
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
    public function destroy(AlasanBergabung $alasan_bergabung)
    {
        $alasan_bergabung->delete();
        return redirect()->route('admin.alasan_bergabung.index')->with('success', 'Data berhasil dihapus');
    }
}

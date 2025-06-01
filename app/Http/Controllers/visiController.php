<?php

namespace App\Http\Controllers;

use App\Models\Visi;
use Illuminate\Http\Request;

class visiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visi = Visi::first();
        return view('pages.visi.index', compact('visi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('404');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'visi' => 'required|string|max:1000',
            ],
            [
                'visi.required' => 'Visi Prodi harus diisi.',
                'visi.max' => 'Visi Prodi tidak boleh lebih dari 1000 karakter.',
            ]
        );


        Visi::create([
            'visi' => $request->visi,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
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
    public function edit(string $id)
    {
        return view('404');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visi $visi)
    {
        $request->validate(
            [
                'visi' => 'required|string|max:1000',
            ],
            [
                'visi.required' => 'Visi Prodi harus diisi.',
                'visi.max' => 'Visi Prodi tidak boleh lebih dari 1000 karakter.',
            ]
        );

        $visi->visi = $request->visi;
        $visi->save();

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return view('404');
    }
}

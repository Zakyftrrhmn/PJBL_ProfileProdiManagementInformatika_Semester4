<?php

namespace App\Http\Controllers;

use App\Models\KalenderAkademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KalenderAkademikController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kalender = KalenderAkademik::first();
        return view('pages.kalenderAkademik.index', compact('kalender'));
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
        $request->validate([
            'judul' => 'required|string|max:255',
            'photo_kalender' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan file
        $path = $request->file('photo_kalender')->store('kalender', 'public');

        KalenderAkademik::create([
            'judul' => $request->judul,
            'photo_kalender' => $path,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(KalenderAkademik $kalenderAkademik)
    {
        return view('404');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KalenderAkademik $kalenderAkademik) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'photo_kalender' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        $kalender = KalenderAkademik::findOrFail($id);

        if ($request->hasFile('photo_kalender')) {
            $path = $request->file('photo_kalender')->store('kalender', 'public');
            $kalender->photo_kalender = $path;
        }

        $kalender->judul = $request->judul;
        $kalender->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KalenderAkademik $kalenderAkademik)
    {
        return view('404');
    }
}

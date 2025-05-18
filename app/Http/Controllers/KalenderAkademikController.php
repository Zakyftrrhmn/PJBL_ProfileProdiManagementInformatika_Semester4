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
        $kalenderAkademik = KalenderAkademik::all();
        return view('pages.kalenderAkademik.index', compact('kalenderAkademik'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kalenderAkademik.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun_ajaran' => 'required',
            'file_kalender' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $data = [
            'tahun_ajaran' => $request->tahun_ajaran,
        ];

        // Jika ada file diunggah
        if ($request->hasFile('file_kalender')) {
            $file = $request->file('file_kalender');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('kalenderAkademik', $filename, 'public');
            $data['file_kalender'] = $filename;
        }

        KalenderAkademik::create($data);
        return redirect()->route('kalender_akademik.index')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(KalenderAkademik $kalenderAkademik)
    {
        return view('pages.kalenderAkademik.edit', compact('kalenderAkademik'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KalenderAkademik $kalenderAkademik)
    {
        $request->validate([
            'tahun_ajaran' => 'required',
            'file_kalender' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $data = [
            'tahun_ajaran' => $request->tahun_ajaran,
        ];

        // Jika ada file baru diunggah
        if ($request->hasFile('file_kalender')) {
            // Hapus file lama jika ada
            if ($kalenderAkademik->file_kalender && Storage::disk('public')->exists('kalenderAkademik/' . $kalenderAkademik->file_kalender)) {
                Storage::disk('public')->delete('kalenderAkademik/' . $kalenderAkademik->file_kalender);
            }

            $file = $request->file('file_kalender');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('kalenderAkademik', $filename, 'public');
            $data['file_kalender'] = $filename;
        }

        $kalenderAkademik->update($data);
        return redirect()->route('kalender_akademik.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KalenderAkademik $kalenderAkademik)
    {
        $kalenderAkademik->delete();
        return redirect()->route('kalender_akademik.index')->with('success', 'Data berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KurikulumController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kurikulum = Kurikulum::all();
        return view('pages.kurikulum.index', compact('kurikulum'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kurikulum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun_kurikulum' => 'required|integer',
            'nama_kurikulum' => 'required|string|max:255',
            'file_kurikulum' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $data = [
            'tahun_kurikulum' => $request->tahun_kurikulum,
            'nama_kurikulum' => $request->nama_kurikulum,
        ];

        // Jika ada file diunggah
        if ($request->hasFile('file_kurikulum')) {
            $file = $request->file('file_kurikulum');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('kurikulum', $filename, 'public');
            $data['file_kurikulum'] = $filename;
        }

        Kurikulum::create($data);

        return redirect()->route('kurikulum.index')->with('success', 'Data kurikulum berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Kurikulum $kurikulum)
    {
        return view('404');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kurikulum $kurikulum)
    {
        return view('pages.kurikulum.edit', compact('kurikulum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kurikulum $kurikulum)
    {
        $request->validate([
            'tahun_kurikulum' => 'required|integer',
            'nama_kurikulum' => 'required|string|max:255',
            'file_kurikulum' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $data = [
            'tahun_kurikulum' => $request->tahun_kurikulum,
            'nama_kurikulum' => $request->nama_kurikulum,
        ];

        // Jika ada file baru diunggah
        if ($request->hasFile('file_kurikulum')) {
            // Hapus file lama jika ada
            if ($kurikulum->file_kurikulum && Storage::disk('public')->exists('kurikulum/' . $kurikulum->file_kurikulum)) {
                Storage::disk('public')->delete('kurikulum/' . $kurikulum->file_kurikulum);
            }

            $file = $request->file('file_kurikulum');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('kurikulum', $filename, 'public');
            $data['file_kurikulum'] = $filename;
        }

        $kurikulum->update($data);

        return redirect()->route('kurikulum.index')->with('success', 'Data kurikulum berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kurikulum $kurikulum)
    {
        $kurikulum->delete();
        return redirect()->route('kurikulum.index')->with('success', 'Data kurikulum berhasil dihapus.');
    }
}

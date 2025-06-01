<?php

namespace App\Http\Controllers;

use App\Models\LaporanKepuasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanKepuasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporan_kepuasan = LaporanKepuasan::orderBy('updated_at', 'desc')->get();
        return view('pages.laporan_kepuasan.index', compact('laporan_kepuasan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.laporan_kepuasan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_laporan' => 'required|string|max:50',
                'file_laporan' => 'required|file|mimes:pdf,doc,docx',
            ],
            [
                'nama_laporan.required' => 'Mata kuliah harus diisi',
                'nama_laporan.max' => 'Mata kuliah tidak boleh lebih dari 50 karakter',
                'file_laporan.required' => 'File Laporan harus diisi',
                'file_laporan.mimes' => 'Format file File Laporan harus PDF, DOC, atau DOCX',
            ]
        );

        $file = $request->file('file_laporan');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('laporan_kepuasan', $filename, 'public');

        LaporanKepuasan::create([
            'nama_laporan' => $request->nama_laporan,
            'file_laporan' => $filename,
        ]);

        return redirect()->route('admin.laporan_kepuasan.index')->with('success', 'Data Laporan Kepuasan berhasil ditambahkan.');
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
        $laporan_kepuasan = LaporanKepuasan::findOrFail($id);
        return view('pages.laporan_kepuasan.edit', compact('laporan_kepuasan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $laporan_kepuasan = LaporanKepuasan::findOrFail($id);

        $request->validate(
            [
                'nama_laporan' => 'required|string|max:50',
                'file_laporan' => 'nullable|file|mimes:pdf,doc,docx',
            ],
            [
                'nama_laporan.required' => 'Mata kuliah harus diisi',
                'nama_laporan.max' => 'Mata kuliah tidak boleh lebih dari 50 karakter',
                'file_laporan.mimes' => 'Format file File Laporan harus PDF, DOC, atau DOCX',
            ]
        );

        $data = [
            'nama_laporan' => $request->nama_laporan,
        ];

        // Tambahkan file_laporan hanya jika ada file baru
        if ($request->hasFile('file_laporan')) {
            if ($laporan_kepuasan->file_laporan && Storage::disk('public')->exists('laporan_kepuasan/' . $laporan_kepuasan->file_laporan)) {
                Storage::disk('public')->delete('laporan_kepuasan/' . $laporan_kepuasan->file_laporan);
            }

            $file = $request->file('file_laporan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('laporan_kepuasan', $filename, 'public');
            $data['file_laporan'] = $filename;
        }


        $laporan_kepuasan->update($data);
        return redirect()->route('admin.laporan_kepuasan.index')->with('success', 'Data Laporan Kepuasan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $laporan_kepuasan = LaporanKepuasan::findOrFail($id);
        $laporan_kepuasan->delete();
        return redirect()->route('admin.laporan_kepuasan.index')->with('success', 'Data Laporan Kepuasan berhasil dihapus.');
    }
}

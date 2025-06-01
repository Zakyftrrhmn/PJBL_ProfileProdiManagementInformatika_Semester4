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
        $kurikulum = Kurikulum::orderBy('semester')->get();
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
        $request->validate(
            [
                'kode_mk' => 'required|string|max:10|unique:kurikulum,kode_mk',
                'mata_kuliah' => 'required|string|max:255',
                'bentuk_perkuliahan' => 'required|string|max:255',
                'sks' => 'required|string|max:255',
                'rps' => 'required|file|mimes:pdf,doc,docx',
                'semester' => 'required|string|max:10',
            ],
            [
                'kode_mk.required' => 'Kode MK harus diisi',
                'mata_kuliah.required' => 'Mata kuliah harus diisi',
                'bentuk_perkuliahan.required' => 'Bentuk perkuliahan harus diisi',
                'sks.required' => 'SKS harus diisi',
                'rps.required' => 'RPS harus diisi',
                'semester.required' => 'Semester harus diisi',
                'kode_mk.unique' => 'Kode MK sudah terdaftar',
                'rps.mimes' => 'Format file RPS harus PDF, DOC, atau DOCX',
            ]
        );

        $file = $request->file('rps');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('kurikulum', $filename, 'public');

        Kurikulum::create([
            'kode_mk' => $request->kode_mk,
            'mata_kuliah' => $request->mata_kuliah,
            'bentuk_perkuliahan' => $request->bentuk_perkuliahan,
            'sks' => $request->sks,
            'rps' => $filename,
            'semester' => $request->semester,
        ]);

        return redirect()->route('admin.kurikulum.index')->with('success', 'Data kurikulum berhasil ditambahkan.');
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
    public function update(Request $request, $id)
    {
        $kurikulum = Kurikulum::findOrFail($id);

        $request->validate(
            [
                'kode_mk' => 'required|string|max:10|unique:kurikulum,kode_mk,' . $kurikulum->id,
                'mata_kuliah' => 'required|string|max:255',
                'bentuk_perkuliahan' => 'required|string|max:255',
                'sks' => 'required|string|max:255',
                'rps' => 'nullable|file|mimes:pdf,doc,docx',
                'semester' => 'required|string|max:10',
            ],
            [
                'kode_mk.required' => 'Kode MK harus diisi',
                'mata_kuliah.required' => 'Mata kuliah harus diisi',
                'bentuk_perkuliahan.required' => 'Bentuk perkuliahan harus diisi',
                'sks.required' => 'SKS harus diisi',
                'semester.required' => 'Semester harus diisi',
                'kode_mk.unique' => 'Kode MK sudah terdaftar',
                'rps.mimes' => 'Format file RPS harus PDF, DOC, atau DOCX',
            ]
        );

        $data = [
            'kode_mk' => $request->kode_mk,
            'mata_kuliah' => $request->mata_kuliah,
            'bentuk_perkuliahan' => $request->bentuk_perkuliahan,
            'sks' => $request->sks,
            'semester' => $request->semester,
        ];

        // Jika ada file baru diunggah
        if ($request->hasFile('rps')) {
            // Hapus file lama jika ada
            if ($kurikulum->rps && Storage::disk('public')->exists('kurikulum/' . $kurikulum->rps)) {
                Storage::disk('public')->delete('kurikulum/' . $kurikulum->rps);
            }

            $file = $request->file('rps');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('kurikulum', $filename, 'public');
            $data['rps'] = $filename;
        }

        $kurikulum->update($data);

        return redirect()->route('admin.kurikulum.index')->with('success', 'Data kurikulum berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kurikulum $kurikulum)
    {
        $kurikulum->delete();
        return redirect()->route('admin.kurikulum.index')->with('success', 'Data kurikulum berhasil dihapus.');
    }
}

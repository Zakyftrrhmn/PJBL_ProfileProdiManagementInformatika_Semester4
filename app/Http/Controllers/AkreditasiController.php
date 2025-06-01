<?php

namespace App\Http\Controllers;

use App\Models\Akreditasi;
use Illuminate\Http\Request;

class AkreditasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $akreditasi = Akreditasi::first();
        return view('pages.akreditasi.index', compact('akreditasi'));
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
                'photo_sertifikat' => 'required|file|mimes:jpeg,jpg,png',
                'nama_prodi' => 'required|string|max:255',
                'akreditasi' => 'required|string|max:255',
                'sk_akreditasi' => 'required|string|max:255',
                'tanggal_mulai' => 'required|date',
                'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
                'lembaga_akreditasi' => 'required|string|max:255',
                'jenjang' => 'required|string|max:255',
            ],
            [
                'photo_sertifikat.required' => 'Foto sertifikat harus diunggah.',
                'photo_sertifikat.mimes' => 'Format file harus berupa PDF, DOC, DOCX, JPG, atau PNG.',
                'nama_prodi.required' => 'Nama prodi harus diisi.',
                'akreditasi.required' => 'Akreditasi harus diisi.',
                'sk_akreditasi.required' => 'Nomor SK akreditasi harus diisi.',
                'tanggal_mulai.required' => 'Tanggal mulai harus diisi.',
                'tanggal_mulai.date' => 'Tanggal mulai harus berupa tanggal.',
                'tanggal_berakhir.required' => 'Tanggal berakhir harus diisi.',
                'tanggal_berakhir.date' => 'Tanggal berakhir harus berupa tanggal.',
                'tanggal_berakhir.after_or_equal' => 'Tanggal berakhir harus setelah tanggal mulai.',
                'lembaga_akreditasi.required' => 'Lembaga akreditasi harus diisi.',
                'jenjang.required' => 'Jenjang harus diisi.',
            ]
        );

        $path = $request->file('photo_sertifikat')->store('akreditasi', 'public');

        Akreditasi::create([
            'photo_sertifikat' => $path,
            'nama_prodi' => $request->nama_prodi,
            'akreditasi' => $request->akreditasi,
            'sk_akreditasi' => $request->sk_akreditasi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir' => $request->tanggal_berakhir,
            'lembaga_akreditasi' => $request->lembaga_akreditasi,
            'jenjang' => $request->jenjang,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Akreditasi $akreditasi)
    {
        return view('404');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Akreditasi $akreditasi)
    {
        return view('404');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Akreditasi $akreditasi)
    {
        $request->validate(
            [
                'photo_sertifikat' => 'nullable|file|mimes:jpeg,jpg,png',
                'nama_prodi' => 'required|string|max:255',
                'akreditasi' => 'required|string|max:255',
                'sk_akreditasi' => 'required|string|max:255',
                'tanggal_mulai' => 'required|date',
                'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
                'lembaga_akreditasi' => 'required|string|max:255',
                'jenjang' => 'required|string|max:255',
            ],
            [
                'photo_sertifikat.required' => 'Foto sertifikat harus diunggah.',
                'photo_sertifikat.mimes' => 'Format file harus berupa PDF, DOC, DOCX, JPG, atau PNG.',
                'nama_prodi.required' => 'Nama prodi harus diisi.',
                'akreditasi.required' => 'Akreditasi harus diisi.',
                'sk_akreditasi.required' => 'Nomor SK akreditasi harus diisi.',
                'tanggal_mulai.required' => 'Tanggal mulai harus diisi.',
                'tanggal_mulai.date' => 'Tanggal mulai harus berupa tanggal.',
                'tanggal_berakhir.required' => 'Tanggal berakhir harus diisi.',
                'tanggal_berakhir.date' => 'Tanggal berakhir harus berupa tanggal.',
                'tanggal_berakhir.after_or_equal' => 'Tanggal berakhir harus setelah tanggal mulai.',
                'lembaga_akreditasi.required' => 'Lembaga akreditasi harus diisi.',
                'jenjang.required' => 'Jenjang harus diisi.',
            ]
        );

        if ($request->hasFile('photo_sertifikat')) {
            $path = $request->file('photo_sertifikat')->store('akreditasi', 'public');
            $akreditasi->photo_sertifikat = $path;
        }

        $akreditasi->nama_prodi = $request->nama_prodi;
        $akreditasi->akreditasi = $request->akreditasi;
        $akreditasi->sk_akreditasi = $request->sk_akreditasi;
        $akreditasi->tanggal_mulai = $request->tanggal_mulai;
        $akreditasi->tanggal_berakhir = $request->tanggal_berakhir;
        $akreditasi->lembaga_akreditasi = $request->lembaga_akreditasi;
        $akreditasi->jenjang = $request->jenjang;

        $akreditasi->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Akreditasi $akreditasi)
    {
        return view('404');
    }
}

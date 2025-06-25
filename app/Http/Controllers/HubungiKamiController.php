<?php

namespace App\Http\Controllers;

use App\Models\HubungiKami;
use Illuminate\Http\Request;

class HubungiKamiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hubungiKami = HubungiKami::all();
        return view('pages.hubungiKami.index', compact('hubungiKami'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('404'); // Tetap mengembalikan 404 jika tidak ada form create di admin
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Implementasi store untuk menyimpan pesan kontak
        $request->validate(
            [
                'nama' => 'required|string|max:100',
                'email' => 'required|email|max:255',
                'pesan' => 'required|string|max:1000',
            ],
            [
                'nama.required' => 'Nama harus diisi',
                'email.required' => 'Email harus diisi',
                'email.email' => 'Format email tidak valid',
                'pesan.required' => 'Pesan harus diisi',
            ]
        );

        HubungiKami::create($request->all()); // ID akan otomatis terisi oleh metode boot() di model
        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim!'); // Biasanya redirect ke halaman yang sama atau halaman sukses
    }

    /**
     * Display the specified resource.
     */
    // Ubah parameter dari string $id menjadi HubungiKami $hubungiKami (Route Model Binding)
    public function show(HubungiKami $hubungiKami)
    {
        // $hubungiKami sudah otomatis ditemukan berdasarkan UUID oleh route model binding
        return view('pages.hubungiKami.show', compact('hubungiKami'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('404'); // Tetap mengembalikan 404 jika tidak ada fungsionalitas edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return view('404'); // Tetap mengembalikan 404 jika tidak ada fungsionalitas update
    }

    /**
     * Remove the specified resource from storage.
     */
    // Ubah parameter dari string $id menjadi HubungiKami $hubungiKami (Route Model Binding)
    public function destroy(HubungiKami $hubungiKami)
    {
        $hubungiKami->delete();
        return redirect()->route('admin.hubungi_kami.index')->with('success', 'Data berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\KaryaMahasiswa;
use App\Models\KategoriKarya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KeryaMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karya_mahasiswa = KaryaMahasiswa::with('kategori_karya')->get();
        return view('pages.karya_mahasiswa.index', compact('karya_mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori_karya = KategoriKarya::all();
        return view('pages.karya_mahasiswa.create', compact('kategori_karya'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori_id' => 'required|exists:kategori_karya,id',
            'tahun' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['judul', 'isi', 'kategori_id', 'tahun']);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('karya_mahasiswa', 'public');
        }

        KaryaMahasiswa::create($data);

        return redirect()->route('admin.karya_mahasiswa.index')->with('success', 'Karya Mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $karya_mahasiswa = KaryaMahasiswa::with('kategori_karya')->findOrFail($id);
        return view('pages.karya_mahasiswa.show', compact('karya_mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $karya_mahasiswa = KaryaMahasiswa::findOrFail($id);
        $kategori_karya = KategoriKarya::all();
        return view('pages.karya_mahasiswa.edit', compact('karya_mahasiswa', 'kategori_karya'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $karya = KaryaMahasiswa::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori_id' => 'required|exists:kategori_karya,id',
            'tahun' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['judul', 'isi', 'kategori_id', 'tahun']);

        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($karya->thumbnail && Storage::disk('public')->exists($karya->thumbnail)) {
                Storage::disk('public')->delete($karya->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('karya_mahasiswa', 'public');
        }

        $karya->update($data);

        return redirect()->route('admin.karya_mahasiswa.index')->with('success', 'Karya Mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $karya = KaryaMahasiswa::findOrFail($id);

        if ($karya->thumbnail && Storage::disk('public')->exists($karya->thumbnail)) {
            Storage::disk('public')->delete($karya->thumbnail);
        }

        $karya->delete();

        return redirect()->route('admin.karya_mahasiswa.index')->with('success', 'Karya Mahasiswa berhasil dihapus.');
    }
}

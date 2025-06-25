<?php

namespace App\Http\Controllers;

use App\Models\KaryaMahasiswa;
use App\Models\KategoriKarya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Tambahkan ini jika Anda ingin membuat slug secara manual di controller

class KeryaMahasiswaController extends Controller // Typonya dipertahankan
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
        $kategori_karya = KategoriKarya::all(); // ID-nya sekarang UUID
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
            'kategori_id' => 'required|exists:kategori_karya,id', // 'exists' rule bekerja dengan UUID
            'tahun' => 'required|integer', // Mengubah ke integer karena tahun adalah angka
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['judul', 'isi', 'kategori_id', 'tahun']);
        // Slug akan otomatis dibuat di model KaryaMahasiswa saat 'creating'

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('karya_mahasiswa', 'public');
        }

        KaryaMahasiswa::create($data);

        return redirect()->route('admin.karya_mahasiswa.index')->with('success', 'Karya Mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    // Ubah parameter dari string $id menjadi KaryaMahasiswa $karya_mahasiswa (Route Model Binding)
    public function show(KaryaMahasiswa $karya_mahasiswa)
    {
        $karya_mahasiswa->load('kategori_karya'); // Load relasi kategori_karya
        return view('pages.karya_mahasiswa.show', compact('karya_mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Ubah parameter dari string $id menjadi KaryaMahasiswa $karya_mahasiswa (Route Model Binding)
    public function edit(KaryaMahasiswa $karya_mahasiswa)
    {
        $kategori_karya = KategoriKarya::all();
        return view('pages.karya_mahasiswa.edit', compact('karya_mahasiswa', 'kategori_karya'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Ubah parameter dari string $id menjadi KaryaMahasiswa $karya_mahasiswa (Route Model Binding)
    public function update(Request $request, KaryaMahasiswa $karya_mahasiswa)
    {
        // Sesuaikan validasi unique slug agar mengecualikan ID karya_mahasiswa saat ini
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori_id' => 'required|exists:kategori_karya,id',
            'tahun' => 'required|integer', // Mengubah ke integer
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['judul', 'isi', 'kategori_id', 'tahun']);
        // Slug akan otomatis diperbarui di model KaryaMahasiswa saat 'updating'

        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($karya_mahasiswa->thumbnail && Storage::disk('public')->exists($karya_mahasiswa->thumbnail)) {
                Storage::disk('public')->delete($karya_mahasiswa->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('karya_mahasiswa', 'public');
        }

        $karya_mahasiswa->update($data);

        return redirect()->route('admin.karya_mahasiswa.index')->with('success', 'Karya Mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Ubah parameter dari string $id menjadi KaryaMahasiswa $karya_mahasiswa (Route Model Binding)
    public function destroy(KaryaMahasiswa $karya_mahasiswa)
    {
        if ($karya_mahasiswa->thumbnail && Storage::disk('public')->exists($karya_mahasiswa->thumbnail)) {
            Storage::disk('public')->delete($karya_mahasiswa->thumbnail);
        }

        $karya_mahasiswa->delete();

        return redirect()->route('admin.karya_mahasiswa.index')->with('success', 'Karya Mahasiswa berhasil dihapus.');
    }
}

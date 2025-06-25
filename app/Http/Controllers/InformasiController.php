<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Kategori; // Sudah ada
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Tambahkan ini untuk slug di controller jika tidak di model

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $informasi = Informasi::all();
        return view('pages.informasi.index', compact('informasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all(); // Ambil semua kategori (ID-nya sekarang UUID)
        return view('pages.informasi.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori_id' => 'required|exists:kategori,id', // 'exists' rule bekerja dengan UUID
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'judul.required' => 'Judul wajib diisi.',
            'isi.required' => 'Isi informasi wajib diisi.',
            'kategori_id.required' => 'Kategori wajib dipilih.',
            'kategori_id.exists' => 'Kategori tidak valid.',
            'thumbnail.image' => 'File harus berupa gambar.',
            'thumbnail.max' => 'Ukuran gambar maksimal 2MB.'
        ]);

        $data = $request->only(['judul', 'isi', 'kategori_id']);
        $data['user_id'] = Auth::id(); // Auth::id() akan mengembalikan UUID user yang login

        // Slug akan otomatis dibuat di model Informasi saat 'creating'

        // Simpan thumbnail jika ada
        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('informasi', 'public');
        }

        Informasi::create($data);

        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    // Ubah parameter dari string $id menjadi Informasi $informasi (Route Model Binding)
    public function show(Informasi $informasi)
    {
        // $informasi sudah otomatis ditemukan berdasarkan UUID oleh route model binding
        return view('pages.informasi.show', compact('informasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Menggunakan Route Model Binding
    public function edit(Informasi $informasi)
    {
        $kategori = Kategori::all();
        return view('pages.informasi.edit', compact('informasi', 'kategori'));
    }

    public function update(Request $request, Informasi $informasi)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'kategori_id' => 'required|exists:kategori,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['judul', 'isi', 'kategori_id']);

        // Slug akan otomatis diperbarui di model Informasi saat 'updating'

        // Jika ada file thumbnail baru
        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($informasi->thumbnail && Storage::disk('public')->exists($informasi->thumbnail)) {
                Storage::disk('public')->delete($informasi->thumbnail);
            }

            $data['thumbnail'] = $request->file('thumbnail')->store('informasi', 'public');
        }

        $informasi->update($data);

        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Ubah parameter dari string $id menjadi Informasi $informasi (Route Model Binding)
    public function destroy(Informasi $informasi)
    {
        // Hapus thumbnail lama jika ada
        if ($informasi->thumbnail && Storage::disk('public')->exists($informasi->thumbnail)) {
            Storage::disk('public')->delete($informasi->thumbnail);
        }
        $informasi->delete();
        return redirect()->route('admin.informasi.index')->with('success', 'Informasi berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Tambahkan ini

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gallery = Gallery::orderBy('updated_at', 'desc')->get();
        return view('pages.gallery.index', compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ], [
            'photo.required' => 'Foto gallery wajib diunggah',
            'photo.mimes' => 'Format foto harus JPG, JPEG, atau PNG',
        ]);

        $file = $request->file('photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('gallery', $filename, 'public');

        Gallery::create([
            // ID akan otomatis terisi oleh metode boot() di model Gallery
            'photo' => $filename,
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Photo berhasil ditambahkan.');
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
        return view('404');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return view('404');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Ubah parameter dari string $id menjadi Gallery $gallery (Route Model Binding)
    public function destroy(Gallery $gallery)
    {
        // Hapus file foto terkait jika ada
        if ($gallery->photo && Storage::disk('public')->exists('gallery/' . $gallery->photo)) {
            Storage::disk('public')->delete('gallery/' . $gallery->photo);
        }

        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Data berhasil dihapus.');
    }
}

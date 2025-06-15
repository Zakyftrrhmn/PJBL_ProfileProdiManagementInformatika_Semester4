<?php

namespace App\Http\Controllers;

use App\Models\PrestasiMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestasi = PrestasiMahasiswa::orderBy('updated_at', 'desc')->get();
        return view('pages.prestasi_mahasiswa.index', compact('prestasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.prestasi_mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_mahasiswa' => 'required|string|max:100',
            'nim' => 'required|string|max:20',
            'nama_lomba' => 'required|string|max:100',
            'tingkat' => 'required|string|max:50',
            'penyelenggara' => 'required|string|max:100',
            'tanggal_lomba' => 'required|date',
            'peringkat' => 'required|string|max:50',
            'file_sertifikat' => 'required|file|mimes:jpg,jpeg,png|max:2048',
        ], [
            'nama_mahasiswa.required' => 'Nama mahasiswa harus diisi',
            'nim.required' => 'NIM harus diisi',
            'nama_lomba.required' => 'Nama lomba harus diisi',
            'tingkat.required' => 'Tingkat lomba harus diisi',
            'penyelenggara.required' => 'Penyelenggara harus diisi',
            'tanggal_lomba.required' => 'Tanggal lomba harus diisi',
            'peringkat.required' => 'Peringkat harus diisi',
            'file_sertifikat.required' => 'File sertifikat harus diunggah',
            'file_sertifikat.mimes' => 'Format file harus berupa  JPG, JPEG, atau PNG',
            'file_sertifikat.max' => 'Ukuran file maksimal 2MB',
        ]);

        $file = $request->file('file_sertifikat');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('prestasi_mahasiswa', $filename, 'public');

        PrestasiMahasiswa::create([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'nim' => $request->nim,
            'nama_lomba' => $request->nama_lomba,
            'tingkat' => $request->tingkat,
            'penyelenggara' => $request->penyelenggara,
            'tanggal_lomba' => $request->tanggal_lomba,
            'peringkat' => $request->peringkat,
            'file_sertifikat' => $filename,
        ]);

        return redirect()->route('admin.prestasi_mahasiswa.index')->with('success', 'Prestasi mahasiswa berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prestasi = PrestasiMahasiswa::findOrFail($id);
        return view('pages.prestasi_mahasiswa.show', compact('prestasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prestasi = PrestasiMahasiswa::findOrFail($id);
        return view('pages.prestasi_mahasiswa.edit', compact('prestasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $prestasi = PrestasiMahasiswa::findOrFail($id);

        $request->validate([
            'nama_mahasiswa' => 'required|string|max:100',
            'nim' => 'required|string|max:20',
            'nama_lomba' => 'required|string|max:100',
            'tingkat' => 'required|string|max:50',
            'penyelenggara' => 'required|string|max:100',
            'tanggal_lomba' => 'required|date',
            'peringkat' => 'required|string|max:50',
            'file_sertifikat' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ], [
            'nama_mahasiswa.required' => 'Nama mahasiswa harus diisi',
            'nim.required' => 'NIM harus diisi',
            'nama_lomba.required' => 'Nama lomba harus diisi',
            'tingkat.required' => 'Tingkat lomba harus diisi',
            'penyelenggara.required' => 'Penyelenggara harus diisi',
            'tanggal_lomba.required' => 'Tanggal lomba harus diisi',
            'peringkat.required' => 'Peringkat harus diisi',
            'file_sertifikat.mimes' => 'Format file harus berupa  JPG, JPEG, atau PNG',
            'file_sertifikat.max' => 'Ukuran file maksimal 2MB',
        ]);

        $data = $request->only([
            'nama_mahasiswa',
            'nim',
            'nama_lomba',
            'tingkat',
            'penyelenggara',
            'tanggal_lomba',
            'peringkat',
        ]);

        // Jika file baru diunggah
        if ($request->hasFile('file_sertifikat')) {
            // Hapus file lama
            if ($prestasi->file_sertifikat && Storage::disk('public')->exists('prestasi_mahasiswa/' . $prestasi->file_sertifikat)) {
                Storage::disk('public')->delete('prestasi_mahasiswa/' . $prestasi->file_sertifikat);
            }

            $file = $request->file('file_sertifikat');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('prestasi_mahasiswa', $filename, 'public');
            $data['file_sertifikat'] = $filename;
        }

        $prestasi->update($data);

        return redirect()->route('admin.prestasi_mahasiswa.index')->with('success', 'Data prestasi mahasiswa berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prestasi = PrestasiMahasiswa::findOrFail($id);
        $prestasi->delete();
        return redirect()->route('admin.prestasi_mahasiswa.index')->with('success', 'Data prestasi mahasiswa berhasil dihapus.');
    }
}

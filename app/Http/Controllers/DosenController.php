<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule; // Tambahkan ini untuk Rule::unique

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = Dosen::orderBy('created_at', 'desc')->get();
        return view('pages.dosen.index', compact('dosen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'username' => 'required|string|max:50|unique:dosen,username',
            'nama' => 'required|string|max:255',
            'asal_kota' => 'required|string|max:100',
            'nidn' => 'required|string|max:50|unique:dosen,nidn',
            'website' => 'nullable|url|max:255', // Website bisa null, tambahkan url rule
            'email' => 'nullable|email|max:255|unique:dosen,email', // Email nullable dan unique
            'pendidikan' => 'required|string|max:100',
            'jabatan' => 'nullable|string|max:100', // Jabatan nullable
            'kompetensi' => 'nullable|string|max:255', // Kompetensi nullable
        ], [
            'photo.required' => 'Foto dosen wajib diunggah',
            'photo.mimes' => 'Format foto harus JPG, JPEG, atau PNG',
            'username.required' => 'Username wajib diisi',
            'nidn.unique' => 'NIDN sudah terdaftar',
            'email.unique' => 'Email sudah terdaftar',
            'website.url' => 'Format website tidak valid.', // Pesan validasi untuk url
        ]);

        $file = $request->file('photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('dosen', $filename, 'public');

        Dosen::create([
            'photo' => $filename,
            'username' => $request->username,
            'nama' => $request->nama,
            'asal_kota' => $request->asal_kota,
            'nidn' => $request->nidn,
            'website' => $request->website,
            'email' => $request->email,
            'pendidikan' => $request->pendidikan,
            'jabatan' => $request->jabatan,
            'kompetensi' => $request->kompetensi, // Simpan kompetensi
        ]);

        return redirect()->route('admin.dosen.index')->with('success', 'Data dosen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    // Menggunakan Route Model Binding
    public function show(Dosen $dosen)
    {
        return view('pages.dosen.show', compact('dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Menggunakan Route Model Binding
    public function edit(Dosen $dosen)
    {
        // Tidak perlu lagi find($dosen->id) karena sudah otomatis ditemukan
        return view('pages.dosen.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Menggunakan Route Model Binding
    public function update(Request $request, Dosen $dosen) // Ubah $id menjadi Dosen $dosen
    {
        $request->validate([
            'photo' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'username' => [
                'required',
                'string',
                'max:50',
                Rule::unique('dosen', 'username')->ignore($dosen->id, 'id'), // Mengecualikan ID saat ini
            ],
            'nama' => 'required|string|max:255',
            'asal_kota' => 'required|string|max:100',
            'nidn' => [
                'required',
                'string',
                'max:50',
                Rule::unique('dosen', 'nidn')->ignore($dosen->id, 'id'), // Mengecualikan ID saat ini
            ],
            'website' => 'nullable|url|max:255',
            'email' => [
                'nullable',
                'email',
                'max:255',
                Rule::unique('dosen', 'email')->ignore($dosen->id, 'id'), // Email nullable dan unique
            ],
            'pendidikan' => 'required|string|max:100',
            'jabatan' => 'nullable|string|max:100', // Jabatan nullable
            'kompetensi' => 'nullable|string|max:255', // Kompetensi nullable
        ], [
            'photo.mimes' => 'Format foto harus JPG, JPEG, atau PNG',
            'username.required' => 'Username wajib diisi',
            'nidn.unique' => 'NIDN sudah terdaftar',
            'email.unique' => 'Email sudah terdaftar',
            'website.url' => 'Format website tidak valid.',
        ]);

        $data = [
            'username' => $request->username,
            'nama' => $request->nama,
            'asal_kota' => $request->asal_kota,
            'nidn' => $request->nidn,
            'website' => $request->website,
            'email' => $request->email,
            'pendidikan' => $request->pendidikan,
            'jabatan' => $request->jabatan,
            'kompetensi' => $request->kompetensi, // Update kompetensi
        ];

        if ($request->hasFile('photo')) {
            // Hapus file lama jika ada
            if ($dosen->photo && Storage::disk('public')->exists('dosen/' . $dosen->photo)) {
                Storage::disk('public')->delete('dosen/' . $dosen->photo);
            }

            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('dosen', $filename, 'public');
            $data['photo'] = $filename;
        }

        $dosen->update($data);

        return redirect()->route('admin.dosen.index')->with('success', 'Data dosen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Menggunakan Route Model Binding
    public function destroy(Dosen $dosen)
    {
        // Hapus foto jika ada
        if ($dosen->photo && Storage::disk('public')->exists('dosen/' . $dosen->photo)) {
            Storage::disk('public')->delete('dosen/' . $dosen->photo);
        }
        $dosen->delete();
        return redirect()->route('admin.dosen.index')->with('success', 'Data dosen berhasil dihapus');
    }
}

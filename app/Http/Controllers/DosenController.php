<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'website' => 'nullable|max:255',
            'email' => 'required|email|max:255|unique:dosen,email',
            'pendidikan' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
        ], [
            'photo.required' => 'Foto dosen wajib diunggah',
            'photo.mimes' => 'Format foto harus JPG, JPEG, atau PNG',
            'username.required' => 'Username wajib diisi',
            'nidn.unique' => 'NIDN sudah terdaftar',
            'email.unique' => 'Email sudah terdaftar',
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
        ]);

        return redirect()->route('admin.dosen.index')->with('success', 'Data dosen berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen)
    {
        return view('pages.dosen.show', compact('dosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        $dosen = Dosen::find($dosen->id);
        return view('pages.dosen.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);

        $request->validate([
            'photo' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'username' => 'required|string|max:50|unique:dosen,username,' . $dosen->id,
            'nama' => 'required|string|max:255',
            'asal_kota' => 'required|string|max:100',
            'nidn' => 'required|string|max:50|unique:dosen,nidn,' . $dosen->id,
            'website' => 'nullable|max:255',
            'email' => 'required|email|max:255|unique:dosen,email,' . $dosen->id,
            'pendidikan' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
        ], [
            'photo.mimes' => 'Format foto harus JPG, JPEG, atau PNG',
            'username.required' => 'Username wajib diisi',
            'nidn.unique' => 'NIDN sudah terdaftar',
            'email.unique' => 'Email sudah terdaftar',
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
    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('admin.dosen.index')->with('success', 'Data dosen berhasil dihapus');
    }
}

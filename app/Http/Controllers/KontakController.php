<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontak = Kontak::first();
        return view('pages.kontak.index', compact('kontak'));
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
                'link_fb'       => 'required|string|max:255',
                'link_twitter'  => 'required|string|max:255',
                'link_instagram' => 'required|string|max:255',
                'link_wa'       => 'required|string|max:255',
                'link_website'  => 'required|string|max:255',
                'no_telp'       => 'required|string|max:20',
                'gmail'         => 'required|email|max:255',
                'location'      => 'required|string|max:500',
            ],
            [
                'link_fb.required'        => 'Link Facebook harus diisi.',
                'link_twitter.required'   => 'Link Twitter harus diisi.',
                'link_instagram.required' => 'Link Instagram harus diisi.',
                'link_wa.required'        => 'Link WhatsApp harus diisi.',
                'link_website.required'   => 'Link Website harus diisi.',
                'no_telp.required'        => 'Nomor Telepon harus diisi.',
                'gmail.required'          => 'Email harus diisi.',
                'gmail.email'             => 'Format email tidak valid.',
                'location.required'       => 'Lokasi harus diisi.',
            ]
        );

        Kontak::create([
            'link_fb'        => $request->link_fb,
            'link_twitter'   => $request->link_twitter,
            'link_instagram' => $request->link_instagram,
            'link_wa'        => $request->link_wa,
            'link_website'   => $request->link_website,
            'no_telp'        => $request->no_telp,
            'gmail'          => $request->gmail,
            'location'       => $request->location,
        ]);

        return redirect()->back()->with('success', 'Data kontak berhasil disimpan.');
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
    public function update(Request $request, Kontak $kontak)
    {
        $request->validate(
            [
                'link_fb'        => 'required|string|max:255',
                'link_twitter'   => 'required|string|max:255',
                'link_instagram' => 'required|string|max:255',
                'link_wa'        => 'required|string|max:255',
                'link_website'   => 'required|string|max:255',
                'no_telp'        => 'required|string|max:20',
                'gmail'          => 'required|email|max:255',
                'location'       => 'required|string|max:500',
            ],
            [
                'link_fb.required'        => 'Link Facebook harus diisi.',
                'link_twitter.required'   => 'Link Twitter harus diisi.',
                'link_instagram.required' => 'Link Instagram harus diisi.',
                'link_wa.required'        => 'Link WhatsApp harus diisi.',
                'link_website.required'   => 'Link Website harus diisi.',
                'no_telp.required'        => 'Nomor Telepon harus diisi.',
                'gmail.required'          => 'Email harus diisi.',
                'gmail.email'             => 'Format email tidak valid.',
                'location.required'       => 'Lokasi harus diisi.',
            ]
        );

        $kontak->link_fb        = $request->link_fb;
        $kontak->link_twitter   = $request->link_twitter;
        $kontak->link_instagram = $request->link_instagram;
        $kontak->link_wa        = $request->link_wa;
        $kontak->link_website   = $request->link_website;
        $kontak->no_telp        = $request->no_telp;
        $kontak->gmail          = $request->gmail;
        $kontak->location       = $request->location;
        $kontak->save();

        return redirect()->back()->with('success', 'Data kontak berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return view('404');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Frontside;
use Illuminate\Http\Request;

class FrontsideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $frontside = Frontside::first();
        return view('pages.frontsidee.index', compact('frontside'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'required|string|max:255',
            'hero_description' => 'required|string|max:255',

            'intro_title' => 'required|string|max:255',
            'intro_description' => 'required|string|max:255',

            'visi_misi_title' => 'required|string|max:255',
            'visi_misi_subtitle' => 'required|string|max:255',
            'visi_misi_description' => 'required|string|max:255',
            'visi_misi_video_url' => 'nullable|file|mimes:mp4|max:20480 ',

            'why_join_title' => 'required|string|max:255',
            'why_join_description' => 'required|string|max:255',
            'why_join_video_url' => 'nullable|file|mimes:mp4|max:20480 ',

            'karya_title' => 'required|string|max:255',
            'karya_subtitle' => 'required|string|max:255',
            'karya_description' => 'required|string|max:255',

            'banner' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',

            'dosen_title' => 'required|string|max:255',
            'dosen_subtitle' => 'required|string|max:255',
            'dosen_description' => 'required|string|max:255',

            'information_title' => 'required|string|max:255',
            'information_subtitle' => 'required|string|max:255',
            'information_description' => 'required|string|max:255',

            'penutup_title' => 'required|string|max:255',
            'penutup_description' => 'required|string|max:255',

            'kurikulum_title' => 'required|string|max:255',
            'kurikulum_subtitle' => 'required|string|max:255',
            'kurikulum_description' => 'required|string|max:255',

            'akreditasi_title' => 'required|string|max:255',
            'akreditasi_subtitle' => 'required|string|max:255',
            'akreditasi_description' => 'required|string|max:255',

            'kalender_title' => 'required|string|max:255',
            'kalender_subtitle' => 'required|string|max:255',

            'profile_title' => 'required|string|max:255',
            'profile_subtitle' => 'required|string|max:255',
            'profile_description' => 'required|string|max:255',

            'laporan_title' => 'required|string|max:255',
            'laporan_subtitle' => 'required|string|max:255',
            'laporan_description' => 'required|string|max:255',

            'galeri_title' => 'required|string|max:255',
            'galeri_subtitle' => 'required|string|max:255',
            'galeri_description' => 'required|string|max:255',

            'prestasi_title' => 'required|string|max:255',
            'prestasi_subtitle' => 'required|string|max:255',
            'prestasi_description' => 'required|string|max:255',

            'kontak_title' => 'required|string|max:255',
            'kontak_description' => 'required|string|max:255',
        ], [
            '*.required' => 'Bagian ini wajib diisi.',
            '*.max' => 'Maksimum karakter melebihi batas.',
            'visi_misi_video_url.mimes' => 'File harus berupa video MP4.',
            'why_join_video_url.mimes' => 'File harus berupa video MP4.',
            'banner.mimes' => 'File harus berupa jpeg, png, jpg',
            '*.file' => 'Pastikan input berupa file yang valid.',
        ]);

        // Handle video upload
        $visiMisiVideo = $request->file('visi_misi_video_url');
        $whyJoinVideo = $request->file('why_join_video_url');

        $bannerPath = null;
        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/banner'), $filename);
            $bannerPath = 'banner/' . $filename;
        }


        $visiMisiVideoPath = $visiMisiVideo ? $visiMisiVideo->store('videos', 'public') : null;
        $whyJoinVideoPath = $whyJoinVideo ? $whyJoinVideo->store('videos', 'public') : null;

        // Simpan data ke database
        Frontside::create([
            'hero_title' => $request->hero_title,
            'hero_subtitle' => $request->hero_subtitle,
            'hero_description' => $request->hero_description,

            'intro_title' => $request->intro_title,
            'intro_description' => $request->intro_description,

            'visi_misi_title' => $request->visi_misi_title,
            'visi_misi_subtitle' => $request->visi_misi_subtitle,
            'visi_misi_description' => $request->visi_misi_description,
            'visi_misi_video_url' => $visiMisiVideoPath,

            'why_join_title' => $request->why_join_title,
            'why_join_description' => $request->why_join_description,
            'why_join_video_url' => $whyJoinVideoPath,

            'karya_title' => $request->karya_title,
            'karya_subtitle' => $request->karya_subtitle,
            'karya_description' => $request->karya_description,

            'dosen_title' => $request->dosen_title,
            'dosen_subtitle' => $request->dosen_subtitle,
            'dosen_description' => $request->dosen_description,

            'banner' => $bannerPath,

            'information_title' => $request->information_title,
            'information_subtitle' => $request->information_subtitle,
            'information_description' => $request->information_description,

            'penutup_title' => $request->penutup_title,
            'penutup_description' => $request->penutup_description,

            'kurikulum_title' => $request->kurikulum_title,
            'kurikulum_subtitle' => $request->kurikulum_subtitle,
            'kurikulum_description' => $request->kurikulum_description,

            'akreditasi_title' => $request->akreditasi_title,
            'akreditasi_subtitle' => $request->akreditasi_subtitle,
            'akreditasi_description' => $request->akreditasi_description,

            'kalender_title' => $request->kalender_title,
            'kalender_subtitle' => $request->kalender_subtitle,

            'profile_title' => $request->profile_title,
            'profile_subtitle' => $request->profile_subtitle,
            'profile_description' => $request->profile_description,

            'laporan_title' => $request->laporan_title,
            'laporan_subtitle' => $request->laporan_subtitle,
            'laporan_description' => $request->laporan_description,

            'galeri_title' => $request->galeri_title,
            'galeri_subtitle' => $request->galeri_subtitle,
            'galeri_description' => $request->galeri_description,

            'prestasi_title' => $request->prestasi_title,
            'prestasi_subtitle' => $request->prestasi_subtitle,
            'prestasi_description' => $request->prestasi_description,

            'kontak_title' => $request->kontak_title,
            'kontak_description' => $request->kontak_description,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Frontside $frontside)
    {
        $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'required|string|max:255',
            'hero_description' => 'required|string|max:255',

            'intro_title' => 'required|string|max:255',
            'intro_description' => 'required|string|max:255',

            'visi_misi_title' => 'required|string|max:255',
            'visi_misi_subtitle' => 'required|string|max:255',
            'visi_misi_description' => 'required|string|max:255',
            'visi_misi_video_url' => 'nullable|file|mimes:mp4|max:20480',

            'why_join_title' => 'required|string|max:255',
            'why_join_description' => 'required|string|max:255',
            'why_join_video_url' => 'nullable|file|mimes:mp4|max:20480',

            'karya_title' => 'required|string|max:255',
            'karya_subtitle' => 'required|string|max:255',
            'karya_description' => 'required|string|max:255',

            'dosen_title' => 'required|string|max:255',
            'dosen_subtitle' => 'required|string|max:255',
            'dosen_description' => 'required|string|max:255',

            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

            'information_title' => 'required|string|max:255',
            'information_subtitle' => 'required|string|max:255',
            'information_description' => 'required|string|max:255',

            'penutup_title' => 'required|string|max:255',
            'penutup_description' => 'required|string|max:255',

            'kurikulum_title' => 'required|string|max:255',
            'kurikulum_subtitle' => 'required|string|max:255',
            'kurikulum_description' => 'required|string|max:255',

            'akreditasi_title' => 'required|string|max:255',
            'akreditasi_subtitle' => 'required|string|max:255',
            'akreditasi_description' => 'required|string|max:255',

            'kalender_title' => 'required|string|max:255',
            'kalender_subtitle' => 'required|string|max:255',

            'profile_title' => 'required|string|max:255',
            'profile_subtitle' => 'required|string|max:255',
            'profile_description' => 'required|string|max:255',

            'laporan_title' => 'required|string|max:255',
            'laporan_subtitle' => 'required|string|max:255',
            'laporan_description' => 'required|string|max:255',

            'galeri_title' => 'required|string|max:255',
            'galeri_subtitle' => 'required|string|max:255',
            'galeri_description' => 'required|string|max:255',

            'prestasi_title' => 'required|string|max:255',
            'prestasi_subtitle' => 'required|string|max:255',
            'prestasi_description' => 'required|string|max:255',

            'kontak_title' => 'required|string|max:255',
            'kontak_description' => 'required|string|max:255',
        ]);

        // Proses upload video jika ada
        if ($request->hasFile('visi_misi_video_url')) {
            $frontside->visi_misi_video_url = $request->file('visi_misi_video_url')->store('videos', 'public');
        }

        if ($request->hasFile('why_join_video_url')) {
            $frontside->why_join_video_url = $request->file('why_join_video_url')->store('videos', 'public');
        }

        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/banner'), $filename);
            $frontside->banner = 'banner/' . $filename;
        }

        // Simpan manual satu per satu
        $frontside->hero_title = $request->hero_title;
        $frontside->hero_subtitle = $request->hero_subtitle;
        $frontside->hero_description = $request->hero_description;

        $frontside->intro_title = $request->intro_title;
        $frontside->intro_description = $request->intro_description;

        $frontside->visi_misi_title = $request->visi_misi_title;
        $frontside->visi_misi_subtitle = $request->visi_misi_subtitle;
        $frontside->visi_misi_description = $request->visi_misi_description;

        $frontside->why_join_title = $request->why_join_title;
        $frontside->why_join_description = $request->why_join_description;

        $frontside->karya_title = $request->karya_title;
        $frontside->karya_subtitle = $request->karya_subtitle;
        $frontside->karya_description = $request->karya_description;

        $frontside->dosen_title = $request->dosen_title;
        $frontside->dosen_subtitle = $request->dosen_subtitle;
        $frontside->dosen_description = $request->dosen_description;


        $frontside->information_title = $request->information_title;
        $frontside->information_subtitle = $request->information_subtitle;
        $frontside->information_description = $request->information_description;

        $frontside->penutup_title = $request->penutup_title;
        $frontside->penutup_description = $request->penutup_description;

        $frontside->kurikulum_title = $request->kurikulum_title;
        $frontside->kurikulum_subtitle = $request->kurikulum_subtitle;
        $frontside->kurikulum_description = $request->kurikulum_description;

        $frontside->akreditasi_title = $request->akreditasi_title;
        $frontside->akreditasi_subtitle = $request->akreditasi_subtitle;
        $frontside->akreditasi_description = $request->akreditasi_description;

        $frontside->kalender_title = $request->kalender_title;
        $frontside->kalender_subtitle = $request->kalender_subtitle;

        $frontside->profile_title = $request->profile_title;
        $frontside->profile_subtitle = $request->profile_subtitle;
        $frontside->profile_description = $request->profile_description;

        $frontside->laporan_title = $request->laporan_title;
        $frontside->laporan_subtitle = $request->laporan_subtitle;
        $frontside->laporan_description = $request->laporan_description;

        $frontside->galeri_title = $request->galeri_title;
        $frontside->galeri_subtitle = $request->galeri_subtitle;
        $frontside->galeri_description = $request->galeri_description;

        $frontside->prestasi_title = $request->prestasi_title;
        $frontside->prestasi_subtitle = $request->prestasi_subtitle;
        $frontside->prestasi_description = $request->prestasi_description;

        $frontside->kontak_title = $request->kontak_title;
        $frontside->kontak_description = $request->kontak_description;

        $frontside->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

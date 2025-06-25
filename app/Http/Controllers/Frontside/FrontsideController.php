<?php

namespace App\Http\Controllers\Frontside;

use App\Http\Controllers\Controller;
use App\Models\Akreditasi;
use App\Models\AlasanBergabung;
use App\Models\Dosen;
use App\Models\Frontside;
use App\Models\Gallery;
use App\Models\HubungiKami;
use App\Models\Informasi;
use App\Models\InformasiUmum;
use App\Models\KalenderAkademik;
use App\Models\KaryaMahasiswa;
use App\Models\Kontak;
use App\Models\Kurikulum;
use App\Models\LaporanKepuasan;
use Illuminate\Http\Request;

use App\Models\Visi;
use App\Models\Misi;
use App\Models\PrestasiMahasiswa;
use App\Models\ProfileKelulusan;
use Illuminate\Support\Facades\DB;

class FrontsideController extends Controller
{
    /**
     * Menampilkan daftar sumber daya.
     */
    public function index()
    {
        // Mencatat tampilan halaman untuk homepage
        DB::table('page_views')->insert([
            'page_slug' => 'homepage',
            'ip_address' => request()->ip(),
            'viewed_at' => now(),
        ]);

        $informasi_umum = InformasiUmum::first();
        $kontak_kami = Kontak::first();
        $visi = Visi::first();
        $misi = Misi::all();
        $karya_mahasiswa = KaryaMahasiswa::latest()->take(4)->get(); // Mengambil karya mahasiswa terbaru
        $alasan_bergabung = AlasanBergabung::all();
        $dosen = Dosen::all();
        $informasi = Informasi::latest()->take(4)->get(); // Mengambil informasi terbaru
        $frontside = Frontside::first();
        return view('pages.frontside.index', compact('frontside', 'visi', 'misi', 'alasan_bergabung', 'karya_mahasiswa', 'dosen', 'informasi', 'kontak_kami', 'informasi_umum'));
    }

    public function kurikulum()
    {
        $kontak_kami = Kontak::first();
        $kurikulums = Kurikulum::orderBy('semester')->get();
        $perSemester = $kurikulums->groupBy('semester');
        $frontside = Frontside::first();
        return view('pages.frontside.kurikulum', compact('perSemester', 'frontside', 'kontak_kami'));
    }

    public function akreditasi()
    {
        $kontak_kami = Kontak::first();
        $frontside = Frontside::first();
        $akreditasi = Akreditasi::first();
        return view('pages.frontside.akreditasi', compact('frontside', 'akreditasi', 'kontak_kami'));
    }

    public function kalender_akademik()
    {
        $kontak_kami = Kontak::first();
        $frontside = Frontside::first();
        $kalender_akademik = KalenderAkademik::first();
        return view('pages.frontside.kalender_akademik', compact('frontside', 'kalender_akademik', 'kontak_kami'));
    }

    public function profile_lulusan()
    {
        $kontak_kami = Kontak::first();
        $frontside = Frontside::first();
        $profile = ProfileKelulusan::all();
        return view('pages.frontside.profile_lulusan', compact('frontside', 'profile', 'kontak_kami'));
    }

    public function laporan_kepuasan()
    {
        $kontak_kami = Kontak::first();
        $frontside = Frontside::first();
        $laporan_kepuasan = LaporanKepuasan::all();
        return view('pages.frontside.laporan_kepuasan', compact('frontside', 'laporan_kepuasan', 'kontak_kami'));
    }

    public function karya_mahasiswa()
    {
        $kontak_kami = Kontak::first();
        $frontside = Frontside::first();
        $karya_mahasiswa = KaryaMahasiswa::all();
        return view('pages.frontside.karya_mahasiswa', compact('frontside', 'karya_mahasiswa', 'kontak_kami'));
    }

    public function informasi()
    {
        $kontak_kami = Kontak::first();
        $frontside = Frontside::first();
        $informasi = Informasi::all();
        return view('pages.frontside.informasi', compact('frontside', 'informasi', 'kontak_kami'));
    }

    public function galeri()
    {
        $kontak_kami = Kontak::first();
        $frontside = Frontside::first();
        $galeri = Gallery::all();
        return view('pages.frontside.galeri', compact('frontside', 'galeri', 'kontak_kami'));
    }

    public function prestasi_mahasiswa()
    {
        $kontak_kami = Kontak::first();
        $frontside = Frontside::first();
        $prestasi_mahasiswa = PrestasiMahasiswa::all();
        return view('pages.frontside.prestasi_mahasiswa', compact('frontside', 'prestasi_mahasiswa', 'kontak_kami'));
    }

    public function hubungi_kami()
    {
        $kontak_kami = Kontak::first();
        $frontside = Frontside::first();
        return view('pages.frontside.hubungi_kami', compact('frontside', 'kontak_kami')); // kontak_kami diulang
    }

    public function hubungi_kami_proses(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|string|max:100',
                'email' => 'required|email|max:100',
                'pesan' => 'required|string|max:350',
            ],
            [
                'nama.required' => 'Nama harus diisi',
                'email.required' => 'Email harus diisi',
                'pesan.required' => 'Pesan harus diisi',
                'email.email' => 'Format email salah',
                'nama.max' => 'Nama maksimal 100 karakter',
                'email.max' => 'Email maksimal 100 karakter',
                'pesan.max' => 'Pesan maksimal 350 karakter',
            ]
        );

        HubungiKami::create($request->all());
        return redirect()->route('hubungi_kami')->with('success', 'Pesanmu berhasil dikirim. Kami akan membalasnya lewat email, jadi jangan lupa pantau emailmu, ya!');
    }

    public function showInformasi($slug)
    {
        $informasi = Informasi::where('slug', $slug)->firstOrFail();
        $beritaTerbaru = Informasi::latest()->take(4)->get();
        return view('pages.frontside.informasi-detail', compact('informasi', 'beritaTerbaru'));
    }

    public function showKaryaMahasiswa($slug)
    {
        $karya_mahasiswa = KaryaMahasiswa::where('slug', $slug)->firstOrFail();
        $karyaTerbaru = KaryaMahasiswa::latest()->take(4)->get();
        return view('pages.frontside.karya-detail', compact('karya_mahasiswa', 'karyaTerbaru'));
    }
}

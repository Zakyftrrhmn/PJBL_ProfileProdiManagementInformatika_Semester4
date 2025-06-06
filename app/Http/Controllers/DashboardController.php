<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Informasi;
use App\Models\HubungiKami;
use App\Models\Dosen;
use App\Models\KaryaMahasiswa;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\PrestasiMahasiswa;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $jumlahPesan = HubungiKami::count();
        $jumlahInformasi = Informasi::count();
        $jumlahKarya = KaryaMahasiswa::count();
        $jumlahPrestasi = PrestasiMahasiswa::count();

        // Ambil data kunjungan 30 hari terakhir untuk halaman promosi
        $views = DB::table('page_views')
            ->selectRaw('DATE(viewed_at) as date, COUNT(*) as total')
            ->where('page_slug', 'homepage') // atau sesuaikan slug
            ->whereBetween('viewed_at', [now()->subDays(30), now()])
            ->groupByRaw('DATE(viewed_at)')
            ->orderBy('date', 'asc')
            ->get();

        $labels = $views->pluck('date')->map(fn($d) => Carbon::parse($d)->format('d M'))->toArray();
        $data = $views->pluck('total')->toArray();

        return view('pages.dashboard.index', compact(
            'jumlahPesan',
            'jumlahInformasi',
            'jumlahKarya',
            'jumlahPrestasi',
            'labels',
            'data'
        ));
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
        return view('404');
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
    public function destroy(string $id)
    {
        return view('404');
    }
}

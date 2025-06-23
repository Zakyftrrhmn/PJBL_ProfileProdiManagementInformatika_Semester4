<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\KalenderAkademikResource;
use App\Models\KalenderAkademik;
use Illuminate\Http\Request;

class KalenderAkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil SEMUA data kalender akademik
        $kalenderAkademik = KalenderAkademik::all();
        // Kembalikan sebagai KOLEKSI dari KalenderAkademikResource
        return KalenderAkademikResource::collection($kalenderAkademik);
    }
}

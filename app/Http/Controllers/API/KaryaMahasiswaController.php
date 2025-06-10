<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\KaryaMahasiswaResource;
use App\Models\KaryaMahasiswa;
use Illuminate\Http\Request;

class KaryaMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karya_mahasiswa = KaryaMahasiswa::with('kategori_karya')->get();
        return KaryaMahasiswaResource::collection($karya_mahasiswa);
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(KaryaMahasiswa $karyaMahasiswa)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, KaryaMahasiswa $karyaMahasiswa)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(KaryaMahasiswa $karyaMahasiswa)
    // {
    //     //
    // }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PrestasiMahasiswaResource;
use App\Models\PrestasiMahasiswa;
use Illuminate\Http\Request;

class PrestasiMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestasiMahasiswa = PrestasiMahasiswa::all();
        return PrestasiMahasiswaResource::collection($prestasiMahasiswa);
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
    // public function show(PrestasiMahasiswa $prestasiMahasiswa)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, PrestasiMahasiswa $prestasiMahasiswa)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(PrestasiMahasiswa $prestasiMahasiswa)
    // {
    //     //
    // }
}

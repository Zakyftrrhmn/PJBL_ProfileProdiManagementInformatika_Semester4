<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\LaporanKepuasanResource;
use App\Models\LaporanKepuasan;
use Illuminate\Http\Request;

class LaporanKepuasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporanKepuasan = LaporanKepuasan::all();
        return LaporanKepuasanResource::collection($laporanKepuasan);
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
    // public function show(LaporanKepuasan $laporanKepuasan)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, LaporanKepuasan $laporanKepuasan)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(LaporanKepuasan $laporanKepuasan)
    // {
    //     //
    // }
}

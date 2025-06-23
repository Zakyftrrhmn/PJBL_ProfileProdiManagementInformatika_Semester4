<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\InformasiUmum;
use Illuminate\Http\Request;
use App\Http\Resources\InformasiUmumResource;

class InformasiUmumController extends Controller
{
    public function index()
    {

        $informasi_umum = InformasiUmum::all();
        return InformasiUmumResource::collection($informasi_umum);
    }
}

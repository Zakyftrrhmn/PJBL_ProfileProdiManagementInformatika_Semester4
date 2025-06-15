<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\HubungiKamiResource;
use App\Models\HubungiKami;
use Illuminate\Http\Request;

class HubungiKamiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hubungiKami = HubungiKami::all();
        return HubungiKamiResource::collection($hubungiKami);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $hubungiKami = HubungiKami::create($request->all());
        return HubungiKamiResource::make($hubungiKami);
    }

    /**
     * Display the specified resource.
     */
    public function show(HubungiKami $hubungiKami)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HubungiKami $hubungiKami)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HubungiKami $hubungiKami)
    {
        //
    }
}

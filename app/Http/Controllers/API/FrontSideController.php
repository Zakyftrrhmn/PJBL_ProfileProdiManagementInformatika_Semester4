<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\FrontsideResource;
use App\Models\Frontside;
use Illuminate\Http\Request;

class FrontSideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $frontside = Frontside::all();
        return FrontsideResource::collection($frontside);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Frontside $frontside)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Frontside $frontside)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Frontside $frontside)
    {
        //
    }
}

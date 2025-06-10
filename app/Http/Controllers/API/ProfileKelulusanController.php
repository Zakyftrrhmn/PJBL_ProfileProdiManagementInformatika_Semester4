<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileKelulusanResource;
use App\Models\ProfileKelulusan;
use Illuminate\Http\Request;

class ProfileKelulusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profileKelulusan = ProfileKelulusan::all();
        return ProfileKelulusanResource::collection($profileKelulusan);
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
    // public function show(ProfileKelulusan $profileKelulusan)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, ProfileKelulusan $profileKelulusan)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(ProfileKelulusan $profileKelulusan)
    // {
    //     //
    // }
}

<?php

namespace App\Http\Controllers;

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
        return view('pages.hubungiKami.index', compact('hubungiKami'));
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
    public function show(HubungiKami $hubungiKami)
    {
        return view('pages.hubungiKami.show', compact('hubungiKami'));
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
    public function destroy(HubungiKami $hubungiKami)
    {
        $hubungiKami->delete();
        return redirect()->route('admin.hubungi_kami.index')->with('success', 'Data berhasil dihapus');
    }
}

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
}

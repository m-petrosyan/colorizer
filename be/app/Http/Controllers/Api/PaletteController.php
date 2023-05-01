<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Palette;
use App\Service\PaletteService;
use Illuminate\Http\Request;

class PaletteController extends Controller
{
    protected PaletteService $paletteService;

    public function __construct(PaletteService $paletteService)
    {
        $this->paletteService = $paletteService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function like(Palette $palette)
    {
        $this->paletteService->likeToggle($palette);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Palette $palette)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Palette $palette)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Palette $palette)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Palette\PaletteCreateRequest;
use App\Http\Resources\Palette\PaletteCollection;
use App\Http\Resources\Palette\PaletteResource;
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
    public function index(): PaletteCollection
    {
        return new PaletteCollection(Palette::get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaletteCreateRequest $request): PaletteResource
    {
        return new PaletteResource($this->paletteService->store($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Palette $palette): PaletteResource
    {
        return new PaletteResource($palette);
    }


    public function like(Palette $palette)
    {
        $this->paletteService->likeToggle($palette);
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

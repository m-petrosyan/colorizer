<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Palettes;
use Illuminate\Http\Request;

class PalettesController extends Controller
{
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

    /**
     * Display the specified resource.
     */
    public function show(Palettes $palettes)
    {
        //
    }

    public function like(Palettes $palettes)
    {
        $palettes->likes()->toggle(['user_id' => auth()->id()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Palettes $palettes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Palettes $palettes)
    {
        //
    }
}

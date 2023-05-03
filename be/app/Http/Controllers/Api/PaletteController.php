<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Palette\PaletteCreateRequest;
use App\Http\Resources\Palette\PaletteCollection;
use App\Http\Resources\Palette\PaletteResource;
use App\Models\Palette;
use App\Service\PaletteService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PaletteController extends Controller
{
    protected PaletteService $paletteService;

    /**
     * @param  PaletteService  $paletteService
     */
    public function __construct(PaletteService $paletteService)
    {
        $this->paletteService = $paletteService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return PaletteCollection
     */
    public function index(): PaletteCollection
    {
        return new PaletteCollection(Palette::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PaletteCreateRequest  $request
     * @return PaletteResource
     */
    public function store(PaletteCreateRequest $request): PaletteResource
    {
        return new PaletteResource($this->paletteService->store($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  Palette  $palette
     * @return PaletteResource
     */
    public function show(Palette $palette): PaletteResource
    {
        return new PaletteResource($palette);
    }

    /**
     * @param  Palette  $palette
     * @return Response
     */
    public function like(Palette $palette): Response
    {
        $this->paletteService->likeToggle($palette);

        return response()->noContent();
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
     *
     * @param  Palette  $palette
     * @return JsonResponse|Response
     */
    public function destroy(Palette $palette): Response|JsonResponse
    {
        try {
            $this->paletteService->destroy($palette);

            return response()->noContent();
        } catch (\Exception $e) {
            return response()->json(['message' => 'permission denied.'], 403);
        }
    }
}

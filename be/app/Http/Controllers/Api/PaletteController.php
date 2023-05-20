<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Palette\PaletteCreateRequest;
use App\Http\Requests\Palette\PaletteUpdateRequest;
use App\Http\Requests\Palette\PalleteListRequest;
use App\Http\Resources\Palette\PaletteCollection;
use App\Http\Resources\Palette\PaletteResource;
use App\Models\Palette;
use App\Repositories\UserRepository;
use App\Service\PaletteService;
use Illuminate\Http\JsonResponse;
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
     * @param  PalleteListRequest  $request
     * @return PaletteCollection
     */
    public function index(PalleteListRequest $request): PaletteCollection
    {
        return new PaletteCollection(
            Palette::with('likes', 'user')
                ->withCount('likes')
                ->orderBy('likes_count', 'desc')
                ->paginate($request->validated()['limit'] ?? 20)
        );
    }

    /**
     * @return PaletteCollection
     */
    public function userPalettes(): PaletteCollection
    {
        return new PaletteCollection(UserRepository::authUser()->palettes->load('likes', 'user'));
    }

    /**
     * @return PaletteCollection
     */
    public function likes(): PaletteCollection
    {
        return new PaletteCollection(UserRepository::authUser()->likes->load('likes', 'user'));
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
     *
     * @param  PaletteUpdateRequest  $request
     * @param  Palette  $palette
     * @return JsonResponse|Response
     */
    public function update(PaletteUpdateRequest $request, Palette $palette): Response|JsonResponse
    {
        try {
            $this->paletteService->update($palette, $request->validated());

            return response()->noContent();
        } catch (\Exception $e) {
            return response()->json(['message' => 'permission denied.'], 403);
        }
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

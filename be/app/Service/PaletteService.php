<?php

namespace App\Service;

use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class PaletteService
{
    /**
     * @param  array  $attributes
     * @return mixed
     */
    public function store(array $attributes): mixed
    {
        return UserRepository::authUser()->palettes()->create($attributes);
    }

    /**
     * @param  object  $palette
     * @return void
     */
    public function likeToggle(object $palette): void
    {
        $palette->likes()->toggle(UserRepository::authUserId());
    }

    /**
     * @param  object  $palette
     * @return JsonResponse|Response
     */
    public function destroy(object $palette): Response|JsonResponse
    {
        try {
            Gate::allows('delete-palette', $palette);
        
            $palette->delete();

            return response()->noContent();
        } catch (\Exception $e) {
            return response()->json(['message' => 'permission denied.'], 403);
        }
    }
}

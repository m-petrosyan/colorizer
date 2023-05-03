<?php

namespace App\Service;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

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
     * @return void
     */
    public function destroy(object $palette): void
    {
        if (Gate::allows('palette-owner', $palette)) {
            $palette->delete();
        } else {
            throw new BadRequestException();
        }
    }
}

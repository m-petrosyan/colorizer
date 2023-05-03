<?php

namespace App\Service;

use App\Repositories\UserRepository;

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
}

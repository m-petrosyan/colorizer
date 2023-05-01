<?php

namespace App\Service;

use App\Repositories\UserRepository;

class PaletteService
{
    public function likeToggle(object $palette): void
    {
        $palette->likes()->toggle(['user_id' => UserRepository::authUser()]);
    }
}

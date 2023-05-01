<?php

namespace App\Repositories;

use Illuminate\Contracts\Auth\Authenticatable;

class UserRepository
{
    public static function authUser(): Authenticatable
    {
        return auth()->user();
    }
}

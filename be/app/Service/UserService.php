<?php

namespace App\Service;

use App\Models\User;

class UserService
{
    /**
     * @param  array  $attribues
     * @return mixed
     */
    public function store(array $attribues): User
    {
        return User::create($attribues);
    }
}

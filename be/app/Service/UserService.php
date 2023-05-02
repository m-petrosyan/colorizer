<?php

namespace App\Service;

use App\Models\User;
use App\Repositories\UserRepository;

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

    /**
     * @param  array  $attribues
     * @return void
     */
    public function update(array $attribues): void
    {
        UserRepository::authUser()->update($attribues);
    }

    /**
     * @return void
     */
    public function destroy(): void
    {
        UserRepository::authUser()->delete();
    }
}

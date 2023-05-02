<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\User\UserResource;
use App\Repositories\UserRepository;
use App\Service\UserService;
use Illuminate\Http\Response;

class UserController extends Controller
{
    protected UserService $userService;

    /**
     * @param  UserService  $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    public function show()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserCreateRequest  $request
     * @return UserResource
     */
    public function store(UserCreateRequest $request): UserResource
    {
        return new UserResource($this->userService->store($request->validated()));
    }


    public function auth(): UserResource
    {
        return new UserResource(UserRepository::authUser());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserUpdateRequest  $request
     * @return Response
     */
    public function update(UserUpdateRequest $request): Response
    {
        $this->userService->update($request->validated());

        return response()->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Response
     */
    public function destroy(): Response
    {
        $this->userService->destroy();

        return response()->noContent();
    }
}

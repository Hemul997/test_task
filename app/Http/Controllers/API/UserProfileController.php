<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserProfileController\UpdateUserProfileRequest;
use App\Http\Resources\UserProfileResource;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserProfileController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(): UserProfileResource
    {
        $user = auth()->user();

        return UserProfileResource::make($user->profile);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserProfileRequest $request): UserProfileResource
    {
        $user = auth()->user() ?? throw new HttpException(Response::HTTP_FORBIDDEN, 'User not found');
        $validated = $request->validated();

        $user->profile()->update($validated);

        return UserProfileResource::make($user->profile);
    }
}

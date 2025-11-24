<?php

namespace App\Http\Services;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * @param array $data
     * @return User
     */
    public function createUser(array $data): User
    {
        return User::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function createUserProfile(array $data): UserProfile
    {

    }
}
<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * @param array $data
     * @return User
     */
    public static function createUser(array $data): User
    {
        return User::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Метод для создания пользователя вместе с профилем
     *
     * @param array $data
     * @return bool
     */
    public static function createUserWithProfile(array $data): bool
    {
        $user_fillable = (new User)->getFillable();
        $user_fillable_keys = array_combine($user_fillable, $user_fillable);

        $user = self::createUser(array_intersect_key($data, $user_fillable_keys));

        if ($user->wasRecentlyCreated) {
            $profile = $user->profile()->create(Arr::except($data, $user_fillable_keys));
        }

        return $profile->wasRecentlyCreated ?? false;
    }
}
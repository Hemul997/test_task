<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

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

    public static function updateUserWithProfile(User $user, array $data): bool
    {
        try {
            $user_fillable = Arr::except((new User)->getFillable(), ['password']);
            $user_fillable_keys = array_combine($user_fillable, $user_fillable);

            $user->update(array_intersect_key($data, $user_fillable_keys));

            $user_profile_fields = Arr::except($data, $user_fillable_keys);

            if (!empty($user_profile_fields)) {
                $user->profile()->update($user_profile_fields);
            }
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return false;
        }
        return true;
    }
}
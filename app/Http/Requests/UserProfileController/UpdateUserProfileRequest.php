<?php

namespace App\Http\Requests\UserProfileController;

use App\Enums\UserGenderEnum;
use App\Models\UserProfile;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @mixin UserProfile
 */
class UpdateUserProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'gender' => [
                'sometimes',
                Rule::enum(UserGenderEnum::class),
            ],
            'birthday' => [
                'sometimes',
                'date_format:d-m-Y',
                Rule::date()->beforeOrEqual(today()->subYears(10)),
            ],
            'phone' => [
                'sometimes',
                'phone:RU',
                'max:20'
            ]
        ];
    }
}

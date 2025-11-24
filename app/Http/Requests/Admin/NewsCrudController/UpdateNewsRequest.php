<?php

namespace App\Http\Requests\Admin\NewsCrudController;

use App\Models\News;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @mixin News
 */
class UpdateNewsRequest extends FormRequest
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
            'id' => [
                'required',
                'integer',
                'exists:' . News::class . ',id',
            ],
            'title' => [
                'sometimes',
                'string',
                'min:3',
                'max:255',
            ],
            'description' => [
                'sometimes',
                'string',
            ]
        ];
    }
}

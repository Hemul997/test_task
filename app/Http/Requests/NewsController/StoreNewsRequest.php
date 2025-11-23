<?php

namespace App\Http\Requests\NewsController;

use App\Models\News;
use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @mixin News
 */
class StoreNewsRequest extends FormRequest
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
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],
            'description' => [
                'required',
                'string',
            ],
            'author_id' => [
                'required',
                'integer',
                'exists:' . User::class . ',id',
            ]
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'author_id' => auth()->id() ?? 0,
        ]);
    }
}

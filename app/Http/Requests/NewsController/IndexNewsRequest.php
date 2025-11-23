<?php

namespace App\Http\Requests\NewsController;

use Illuminate\Foundation\Http\FormRequest;

class IndexNewsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'page'            => [
                'nullable',
                'integer',
                'min:1',
            ],
            'per_page'        => [
                'nullable',
                'integer',
                'min:1',
                'max:50',
            ],
        ];
    }

    public function authorize(): bool
    {
        return auth()->check();
    }
}

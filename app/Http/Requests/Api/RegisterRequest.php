<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'phone' => [
                'required',
                'string',
                'unique:users',
                'regex:/\+7[0-9]{10}/m'
            ],
            'password' => [
                'required',
                'string'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'phone.required' => __('Phone is required'),
            'phone.string' => __('Phone must be string'),
            'phone.unique' => __('Phone must be unique'),
        ];
    }
}
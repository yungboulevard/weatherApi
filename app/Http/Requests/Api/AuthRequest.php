<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthRequest extends FormRequest
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
                'exists:users,phone',
            ],
            'password' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'phone.required' => __('Phone is required'),
            'phone.string' => __('Phone must be string'),
            'phone.exists' => __('There is no user with given phone number'),
            'password.required' => __('Password is required'),
        ];
    }
}
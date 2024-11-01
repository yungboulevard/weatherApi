<?php

namespace App\Http\Requests\Api;

use App\Enums\DegreeTypeEnum;
use App\Enums\LangCodeEnum;
use App\Enums\WeatherTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GetWeatherRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'q' => [
                'required',
                'string',
                'max:255'
            ],
            'lang' => [
                'sometimes',
                'string',
                Rule::in(LangCodeEnum::getValues())
            ],
            'type' => [
                'required',
                'string',
                Rule::in(WeatherTypeEnum::getValues())
            ],
            'degree_type' => [
                'required',
                'string',
                Rule::in(DegreeTypeEnum::getValues())
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'q.required' => __('City is required'),
            'q.string' => __('City must be string'),
            'q.max' => __('City length must be shorter than or equal to 255 characters'),

            'lang.string' => __('Language code must be string'),
            'lang.max' => __('Language code length must be shorter than or equal to 6 characters'),

            'type.required' => __('Weather forecats type is required'),
            'type.string' => __('Weather forecats type must be string'),
            'type.in' => __('Weather forecats type is invalid'),

            'degree_type.required' => __('Degree type is required'),
            'degree_type.string' => __('Degree type type must be string'),
            'degree_type.in' => __('Degree type type is invalid'),



        ];
    }
}

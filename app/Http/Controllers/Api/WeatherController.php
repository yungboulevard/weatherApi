<?php

namespace App\Http\Controllers\Api;

use App\DTO\ApiCallDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GetWeatherRequest;
use App\Http\Resources\Api\WeatherResource;
use App\Services\WeatherService;
use App\Traits\DegreeTypeTrait;
use Illuminate\Support\Facades\Auth;

class WeatherController extends Controller
{
    use DegreeTypeTrait;

    private WeatherService $service;

    public function __construct(WeatherService $service)
    {
        $this->service = $service;
    }

    public function get(GetWeatherRequest $request): WeatherResource
    {
        $user = Auth::user();
        $validatedRequest = $request->validated();
    
        $weather = $this->service->getWeather(new ApiCallDTO($validatedRequest), $user);
        
        $weather = $this->selectDegreeType($weather, $validatedRequest['degree_type']);

        return new WeatherResource($weather);
    }
}

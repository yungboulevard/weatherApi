<?php

namespace App\Services;

use App\DTO\ApiCallDTO;
use App\Models\User;
use App\Traits\ApiCallTrait;

class WeatherService
{
    use ApiCallTrait;

    private UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function getWeather(ApiCallDTO $dto, User $user): array
    {
        $this->service->storeStory($user, $dto);
        $response = $this->call($dto);

        return $response;

    }
}
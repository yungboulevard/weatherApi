<?php

namespace App\Http\Controllers\Api;

use App\DTO\CreateUserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use App\Http\Resources\Api\AuthUserResource;
use App\Services\RegisterUserService;
use Exception;

class SignUpController extends Controller
{
    public function __invoke(RegisterRequest $request, RegisterUserService $registerUserService): AuthUserResource
    {
        $user = new CreateUserDTO($request->validated());

        return new AuthUserResource($registerUserService->register($user));
    }
}
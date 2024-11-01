<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Http\Resources\Api\AuthUserResource;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class SignInController extends Controller
{
    public function __invoke(AuthRequest $request): AuthUserResource|JsonResponse
    {
        $user = User::query()->where('phone', $request->phone)->first();
        
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['data' => ['message' => __('Invalid login')]], Response::HTTP_FORBIDDEN);
        }

        $user->withAccessToken($user->createToken(
            name:$request->phone,
            expiresAt: Carbon::now()->addSeconds(config('sanctum.expiration')))->plainTextToken);

        return new AuthUserResource($user);
    }
}

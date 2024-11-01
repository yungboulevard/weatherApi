<?php

namespace App\Services;

use App\DTO\CreateUserDTO;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegisterUserService
{
    public function register(CreateUserDTO $dto): User
    {
        DB::beginTransaction();
        try {

            $user = User::create([
                ...$dto->toArray()
            ]);

            $user->withAccessToken($user->createToken(
                name:$dto->phone,
                expiresAt: Carbon::now()->addSeconds(config('sanctum.expiration')))->plainTextToken
            );

            DB::commit();

            return $user;

        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

}
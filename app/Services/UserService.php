<?php

namespace App\Services;

use App\DTO\ApiCallDTO;
use App\Models\RequestStory;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class UserService
{
    public function storeStory(User $user, ApiCallDTO $dto): void
    {
        DB::beginTransaction();
        try {

            RequestStory::create([
                'user_id' => $user->id,
                'q' => $dto->q
            ]);

            DB::commit();

        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
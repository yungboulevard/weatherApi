<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResource;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function get(): UserResource
    {
        $user = Auth::user();
        return new UserResource($user->load('requests'));
    }
}

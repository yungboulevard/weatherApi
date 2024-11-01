<?php

namespace App\Http\Controllers\Swagger;

use Exception;
use OpenApi\Annotations as OA;

class SignUpController
{
    /**
     *  @OA\Post(
     *     path="/api/sign-up",
     *     tags={"Sign Up"},
     *     summary="Register user.",
     *     description="Register user.",
     *     operationId="registerUser",
     *     @OA\Parameter(
     *         in="query",
     *         name="phone",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             description="regex:/\+7[0-9]{10}/m"
     *         )
     *     ),
     *     @OA\Parameter(
     *         in="query",
     *         name="password",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Success. This token must be use in header 'Authorization: Bearer $token'",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 @OA\Property(
     *                     property="access_token",
     *                     type="string",
     *                     example="4|HgY4knp76ukDIfka2eFqt3zX1a0aa6W76YqSKwwk7b276e29"
     *                 ),
     *                 @OA\Property(
     *                     property="token_type",
     *                     type="string",
     *                     example="Bearer"
     *                 ),
     *                 @OA\Property(
     *                     property="expires",
     *                     type="integer",
     *                     example="3600"
     *                 ),
     *             )
     *         ),
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Invalid phone/password supplied",
     *     ),
     *  )
     */
    public function __invoke()
    {
        //
    }
}
<?php

namespace App\Http\Controllers\Swagger;

use OpenApi\Annotations as OA;

class SignInController
{

    /**
     *  @OA\Post(
     *     path="/api/sign-in",
     *     tags={"Sign In"},
     *     summary="Login user.",
     *     description="Login user.",
     *     operationId="loginUser",
     *     security={{ "bearerAuth": {} }},
     *     @OA\Parameter(
     *         in="query",
     *         name="phone",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
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
     *         response="201",
     *         description="Successful operation",
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
     *         )
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Invalid query params.",
     *     ),
     *  )
     */
    public function __invoke()
    {
        //
    }
}
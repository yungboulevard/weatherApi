<?php

namespace App\Http\Controllers\Swagger;

use Exception;
use OpenApi\Annotations as OA;

class UserController
{
  /**
   * @OA\Get(
   *   path="/api/user/get",
   *   tags={"User"},
   *   summary="Get a user with his request history. Requires Bearer token",
   *   description="Get a user with his request history. Requires Bearer token",
   *   operationId="get",
   *   security={{ "bearerAuth": {} }},
   *   @OA\Response(
   *     response=200,
   *     description="Successful response",
   *     @OA\JsonContent(
   *       @OA\Property(
   *         property="data",
   *         type="object",
   *         @OA\Property(
   *           property="id",
   *           type="integer",
   *           example=9
   *         ),
   *         @OA\Property(
   *           property="name",
   *           type="string",
   *           nullable=true,
   *           example=null
   *         ),
   *         @OA\Property(
   *           property="phone",
   *           type="string",
   *           example="+79999999999"
   *         ),
   *         @OA\Property(
   *           property="created_at",
   *           type="string",
   *           format="date-time",
   *           example="2024-11-01T14:51:37.000000Z"
   *         ),
   *         @OA\Property(
   *           property="updated_at",
   *           type="string",
   *           format="date-time",
   *           example="2024-11-01T14:51:37.000000Z"
   *         ),
   *         @OA\Property(
   *           property="requests",
   *           type="array",
   *           @OA\Items(
   *             type="object",
   *             @OA\Property(
   *               property="id",
   *               type="integer",
   *               example=4
   *             ),
   *             @OA\Property(
   *               property="user_id",
   *               type="integer",
   *               example=9
   *             ),
   *             @OA\Property(
   *               property="q",
   *               type="string",
   *               example="москва"
   *             ),
   *             @OA\Property(
   *               property="created_at",
   *               type="string",
   *               format="date-time",
   *               example="2024-11-01T15:19:52.000000Z"
   *             ),
   *             @OA\Property(
   *               property="updated_at",
   *               type="string",
   *               format="date-time",
   *               example="2024-11-01T15:19:52.000000Z"
   *             )
   *           )
   *         )
   *       )
   *     )
   *   ),
   * )
   */
    public function get()
    {
        //
    }
}
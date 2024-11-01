<?php

namespace App\Http\Controllers\Swagger;

use Exception;
use OpenApi\Annotations as OA;

class WeatherController
{
/**
  * @OA\Get(
  *  path="/api/weather/get-weather",
  *  tags={"Weather"},
  *  summary="Get weather. Requires Bearer token",
  *  description="Get weather. Requires Bearer token",
  *  @OA\Parameter(
  *   name="q",
  *   in="query",
  *   description="Город",
  *   required=true,
  *   @OA\Schema(
  *    type="string"
  *   )
  *  ),
  *  @OA\Parameter(
  *   name="lang",
  *   in="query",
  *   description="Язык. Если не указывать, то по дефолту - en",
  *   required=false,
  *   @OA\Schema(
  *    type="string",
  *    enum={"ru"}
  *   )
  *  ),
  *  @OA\Parameter(
  *   name="type",
  *   in="query",
  *   description="Тип погоды",
  *   required=false,
  *   @OA\Schema(
  *    type="string",
  *    enum={"current", "forecast"}
  *   )
  *  ),
  *  @OA\Parameter(
  *   name="degree_type",
  *   in="query",
  *   description="Тип градусов",
  *   required=true,
  *   @OA\Schema(
  *    type="string",
  *    enum={"celsius", "fahrenheit"}
  *   )
  *  ),
  *  security={{ "bearerAuth": {} }},
  *  @OA\Response(
  *   response=200,
  *   description="Successful response",
  *   @OA\JsonContent(
  *     @OA\Property(
  *       property="data",
  *       type="object",
  *       @OA\Property(
  *         property="city",
  *         type="string",
  *         example="Stavropol"
  *       ),
  *       @OA\Property(
  *         property="country",
  *         type="string",
  *         example="Russia"
  *       ),
  *       @OA\Property(
  *         property="temp",
  *         type="float",
  *         example=12.3
  *       ),
  *       @OA\Property(
  *         property="wind",
  *         type="integer",
  *         example=32
  *       ),
  *       @OA\Property(
  *         property="feelslike",
  *         type="float",
  *         example=9.5
  *       ),
  *       @OA\Property(
  *         property="forecast",
  *         type="object",
  *         description="Прогноз погоды"
  *       )
  *     )
  *   )
  *  ),
  * )
  */
    public function get()
    {
        //
    }
}
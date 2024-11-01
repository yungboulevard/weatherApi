<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeatherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'city' => $this['location']['name'],
            'country' => $this['location']['country'],
            'temp' => $this['current']['temp'],
            'wind' => $this['current']['wind'],
            'feelslike' => $this['current']['feelslike'],
            'forecast' => $this['forecast']
        ];
    }
}

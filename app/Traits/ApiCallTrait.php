<?php 

namespace App\Traits;

use App\DTO\ApiCallDTO;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

trait ApiCallTrait
{
    protected function call(ApiCallDTO $dto): array
    {
        $response = Http::withQueryParameters([
            ...$dto->toArray()
          ])->get(config('services.weatherapi.baseUrl') . $dto->transform($dto->type));

        if($response->status() !== Response::HTTP_OK){

            $message = match ($response->json()['error']['code']) {
                1006 => __('Incorrect location'),
                default => __('Weather service error'),
              };

            throw new \Exception($message);
        }
        $response = $response->json();
        
        return $response;
        
    }
}
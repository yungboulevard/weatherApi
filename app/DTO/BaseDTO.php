<?php

namespace App\DTO;

use Illuminate\Support\Facades\Log;

abstract class BaseDTO
{
    public function fill(array $request): void
    {
        foreach ($request as $key => $value) {
            try {
                $this->{$key} = $value;
                if($this->{$key} == 'type'){
                    $this->{$key} = $this->transform($value);
                }
                $this->key = config('services.weatherapi.key');
            } catch (\Throwable $e) {
                Log::error($e->getMessage(), $e->getTrace());
            }
        }
    }

    public function toArray(): array
    {
        return (array) $this;
    }

    public function transform(string $string): string
    {
        return $string . '.json';
    }
}
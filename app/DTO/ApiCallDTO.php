<?php

namespace App\DTO;

class ApiCallDTO extends BaseDTO
{
    public string $q;
    public ?string $lang;
    public string $key;
    public string $type;

    public function __construct(array $data)
    {
        $this->fill($data);
    }

}
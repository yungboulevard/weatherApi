<?php

namespace App\DTO;

use Carbon\Carbon;

class CreateUserDTO extends BaseDTO
{
    public string $phone;
    public string $password;
    public Carbon $created_at;
    public Carbon $updated_at;

    public function __construct(array $data)
    {
        $this->fillValues($data);
    }

    private function fillValues(array $data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key) === false) {
                continue;
            }
            $this->$key = $value;
        }
    }
}
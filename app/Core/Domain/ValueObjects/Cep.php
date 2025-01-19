<?php

namespace App\Core\Domain\ValueObjects;

class Cep
{
    private string $cep;

    public function __construct(string $cep)
    {
        if (strlen($cep) !== 8 || !is_numeric($cep)) {
            throw new \InvalidArgumentException(__('exceptions.invalid_cep_format'));
        }
        $this->cep = $cep;
    }

    public function getValue(): string
    {
        return $this->cep;
    }
}

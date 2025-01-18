<?php

namespace App\Core\Domain\ValueObjects;

class Cep
{
    private string $cep;

    public function __construct(string $cep)
    {
        $this->cep = $cep;
    }

    public function getValue(): string
    {
        return $this->cep;
    }
}

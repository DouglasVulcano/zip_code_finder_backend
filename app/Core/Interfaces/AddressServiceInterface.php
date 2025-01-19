<?php

namespace App\Core\Interfaces;

use App\Core\Domain\ValueObjects\Cep;

interface AddressServiceInterface
{
    public function searchAddressByCep(Cep $cep): array;
}

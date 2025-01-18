<?php

namespace App\Core\Interfaces;

use App\Core\Domain\ValueObjects\Cep;

interface iAddressService
{
    public function searchAddressByCep(Cep $cep): array;
}

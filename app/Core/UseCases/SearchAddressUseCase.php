<?php

namespace App\Core\UseCases;

use App\Core\Interfaces\iAddressService;
use App\Core\Domain\ValueObjects\Cep;

class SearchAddressUseCase
{
    private iAddressService $cepService;

    public function __construct(iAddressService $addressService)
    {
        $this->cepService = $addressService;
    }

    /**
     * @param string $cep
     * @return array
     */
    public function execute(string $cep): array
    {
        $cepVO = new Cep($cep);
        return $this->cepService->searchAddressByCep($cepVO);
    }
}

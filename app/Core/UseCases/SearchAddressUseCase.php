<?php

namespace App\Core\UseCases;

use App\Core\Domain\ValueObjects\Cep;
use App\Core\Interfaces\AddressServiceInterface;

class SearchAddressUseCase
{
    private AddressServiceInterface $addressService;

    public function __construct(AddressServiceInterface $addressService)
    {
        $this->addressService = $addressService;
    }

    /**
     * @param string $cep
     * @return array
     */
    public function execute(string $cep): array
    {
        $cepVO = new Cep($cep);
        return $this->addressService->searchAddressByCep($cepVO);
    }
}

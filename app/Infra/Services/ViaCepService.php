<?php

namespace App\Infra\Services;

use App\Core\Domain\ValueObjects\Cep;
use App\Core\Interfaces\iAddressService;
use Illuminate\Support\Facades\Http;

class ViaCepService implements iAddressService
{
    /**
     * @param Cep $cep
     * @return array
     */
    public function searchAddressByCep(Cep $cep): array
    {
        $response = Http::get("https://viacep.com.br/ws/{$cep->getValue()}/json/");
        return $response->json();
    }
}

<?php

namespace App\Infra\Services;

use App\Infra\Exceptions\ViaCepServiceException;
use App\Core\Interfaces\AddressServiceInterface;
use App\Core\Domain\ValueObjects\Cep;
use Illuminate\Support\Facades\Http;

class ViaCepService implements AddressServiceInterface
{
    const BASE_URL = "https://viacep.com.br/ws/";

    /**
     * @param Cep $cep
     * @return array
     */
    public function searchAddressByCep(Cep $cep): array
    {
        $response = Http::get(self::BASE_URL . $cep->getValue() . "/json/");
        if ($response->failed() || array_key_exists('erro', $response->json())) {
            throw new ViaCepServiceException(__('exceptions.address_not_found', ['cep' => $cep->getValue()]));
        }
        return $response->json();
    }
}

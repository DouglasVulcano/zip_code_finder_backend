<?php

namespace App\Infra\Http\Controllers;

use App\Core\UseCases\SearchAddressUseCase;
use App\Infra\Requests\SearchAddressRequest;
use Illuminate\Http\JsonResponse;

class AddressController
{
    private SearchAddressUseCase $searchAddressUseCase;

    public function __construct(SearchAddressUseCase $searchAddressUseCase)
    {
        $this->searchAddressUseCase = $searchAddressUseCase;
    }

    /**
     * @param SearchAddressRequest $request
     * @return JsonResponse
     */
    public function search(SearchAddressRequest $request): JsonResponse
    {
        $result = $this->searchAddressUseCase->execute($request->cep);
        return response()->json($result, JsonResponse::HTTP_OK);
    }
}

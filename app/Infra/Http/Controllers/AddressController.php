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
     * @OA\Get(
     *     path="/search-address/{cep}",
     *     tags={"Address"},
     *     summary="Search address by CEP",
     *     @OA\Parameter(
     *         name="cep",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             format="string",
     *             example="01001000"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="address", type="string", example="Praça da Sé"),
     *             @OA\Property(property="city", type="string", example="São Paulo"),
     *             @OA\Property(property="state", type="string", example="SP")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Invalid CEP",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Não foi possível encontrar um endereço para o CEP: 111."),
     *             @OA\Property(property="errors", type="object",
     *                 @OA\Property(property="cep", type="array", @OA\Items(type="string", example="Não foi possível encontrar um endereço para o CEP: 111."))
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid CEP",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Não foi possível encontrar um endereço para o CEP: 00000000."))
     *         )
     *     )
     * )
     */
    public function search(SearchAddressRequest $request): JsonResponse
    {
        $result = $this->searchAddressUseCase->execute($request->cep);
        return response()->json($result, JsonResponse::HTTP_OK);
    }
}

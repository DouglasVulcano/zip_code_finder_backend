<?php

namespace Tests\Unit;

use App\Core\Interfaces\AddressServiceInterface;
use App\Core\UseCases\SearchAddressUseCase;
use Tests\TestCase;

class SearchAddressUseCaseTest extends TestCase
{
    public function testExecuteReturnsAddressData(): void
    {
        $mockService = $this->createMock(AddressServiceInterface::class);
        $mockService->method('searchAddressByCep')
            ->willReturn(['logradouro' => 'Rua Teste', 'bairro' => 'Bairro Teste']);

        $useCase = new SearchAddressUseCase($mockService);
        $result = $useCase->execute('12345678');

        $this->assertIsArray($result);
        $this->assertEquals('Rua Teste', $result['logradouro']);
    }

    public function testExecuteThrowsExceptionForInvalidCep(): void
    {
        $mockService = $this->createMock(AddressServiceInterface::class);
        $this->expectException(\InvalidArgumentException::class);

        $useCase = new SearchAddressUseCase($mockService);
        $useCase->execute('invalid_cep');
    }
}

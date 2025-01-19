<?php

namespace Tests\Feature;

use App\Core\Domain\ValueObjects\Cep;
use App\Infra\Exceptions\ViaCepServiceException;
use App\Infra\Services\ViaCepService;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViaCepServiceTest extends TestCase
{
    public function testSearchAddressByCepReturnsValidData(): void
    {
        Http::fake([
            'https://viacep.com.br/ws/12345678/json/' => Http::response([
                'logradouro' => 'Rua Teste',
                'bairro' => 'Bairro Teste',
            ], 200),
        ]);

        $service = new ViaCepService();
        $cep = new Cep('12345678');
        $result = $service->searchAddressByCep($cep);

        $this->assertIsArray($result);
        $this->assertEquals('Rua Teste', $result['logradouro']);
    }

    public function testSearchAddressByCepThrowsExceptionForInvalidCep(): void
    {
        Http::fake([
            'https://viacep.com.br/ws/12345678/json/' => Http::response(['erro' => true], 404),
        ]);

        $this->expectException(ViaCepServiceException::class);

        $service = new ViaCepService();
        $cep = new Cep('12345678');
        $service->searchAddressByCep($cep);
    }
}

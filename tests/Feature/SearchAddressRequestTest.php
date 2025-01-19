<?php

namespace Tests\Feature;

use Tests\TestCase;

class SearchAddressRequestTest extends TestCase
{
    public function testValidCepNormalization(): void
    {
        $response = $this->getJson('/api/search-address/01001000');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'cep',
            'logradouro',
            'bairro',
            'estado'
        ]);
    }

    public function testSearchCepWithSpecialCharacters(): void
    {
        $response = $this->getJson('/api/search-address/01001-000');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'cep',
            'logradouro',
            'bairro',
            'estado'
        ]);
    }

    public function testValidationFailsForInvalidCep(): void
    {
        $response = $this->getJson('/api/search-address/00000000');
        $response->assertStatus(400);
    }

    public function testValidationFailsForNonNumericCep(): void
    {
        $response = $this->getJson('/api/search-address/abc123');
        $response->assertStatus(422);
    }
}

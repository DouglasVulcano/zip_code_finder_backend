<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Core\Domain\ValueObjects\Cep;
use InvalidArgumentException;

class CepTest extends TestCase
{
    public function testValidCep(): void
    {
        $cep = new Cep('12345678');
        $this->assertEquals('12345678', $cep->getValue());
    }

    public function testInvalidCepThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Cep('12345');
    }

    public function testCepWithNonNumericCharactersThrowsException(): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Cep('12a45b78');
    }
}

<?php

namespace Pierre\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Pierre\UnitTest\Calculator;

#[CoversClass(Calculator::class)]
class CalculatorTest extends TestCase
{
    #[DataProvider('addProvider')]
    public function testAdd(int $a, int $b, int $expected): void
    {
        $calculator = new Calculator();

        $result = $calculator->add($a, $b);

        $this->assertEquals($expected, $result, 'La somme de 3 et 4 doit retourner 7');
    }

    public function testAddErrors(): void
    {
        $calculator = new Calculator();

        $this->expectException(\TypeError::class);

        $calculator->add('bonjour', '4');
    }

    public static function addProvider(): array
    {
        return [
            [3, 4, 7],
            [-4, 4, 0],
            [-3, -4, -7],
        ];
    }
}

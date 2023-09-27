<?php

namespace Pierre\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Pierre\UnitTest\Calculator;

#[CoversClass(Calculator::class)]
class CalculatorTest extends TestCase
{
    public function testAdd()
    {
        $calculator = new Calculator();

        $result = $calculator->add(3, 4);

        $this->assertEquals(7, $result, 'La somme de 3 et 4 doit retourner 7');

        $this->markTestIncomplete(
            'Le test est encore incomplet.',
        );
    }
}

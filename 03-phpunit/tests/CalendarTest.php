<?php

namespace Pierre\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Pierre\UnitTest\Calendar;

#[CoversClass(Calendar::class)]
class CalendarTest extends TestCase
{
    public function testWorkingDays()
    {
        $calendar = new Calendar();

        $result = $calendar->workingDays(
            new \DateTimeImmutable('2023-09-25'),
            new \DateTimeImmutable('2023-10-02'),
        );

        $this->assertEquals(6, $result, 'Il y a 6j entre le lundi 25 sept et le lundi suivant');
    }

    public function testWorkingDaysBadArgument()
    {
        $calendar = new Calendar();

        $this->expectException(\InvalidArgumentException::class);

        $calendar->workingDays(
            new \DateTimeImmutable('2023-10-02'),
            new \DateTimeImmutable('2023-09-25'),
        );
    }
}

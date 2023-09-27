<?php

namespace Pierre\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use Pierre\UnitTest\Calendar;
use Pierre\UnitTest\Entity\TrainingSession;
use Pierre\UnitTest\TrainingSessionManager;
use PHPUnit\Framework\TestCase;

#[CoversClass(TrainingSessionManager::class)]
class TrainingSessionManagerTest extends TestCase
{
    public function testGetHours()
    {
        $calendar = $this->createStub(Calendar::class);
        $calendar
            ->method('workingDays')
            ->willReturn(5)
        ;

        $manager = new TrainingSessionManager($calendar);

        $session = new TrainingSession(
            new \DateTimeImmutable('2023-09-25'),
            new \DateTimeImmutable('2023-09-29'),
        );

        $result = $manager->getHours($session);

        $this->assertEquals(35, $result, 'Une formation de 5j correspond à 35h');
    }
}

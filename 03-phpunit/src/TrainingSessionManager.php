<?php

namespace Pierre\UnitTest;

use Pierre\UnitTest\Entity\TrainingSession;

class TrainingSessionManager
{
    public function __construct(
        private Calendar $calendar,
    ) {
    }

    public function getHours(TrainingSession $trainingSession): int
    {
        return 7 * $this->calendar->workingDays($trainingSession->getFrom(), $trainingSession->getTo());
    }
}

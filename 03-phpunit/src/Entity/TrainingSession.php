<?php

namespace Pierre\UnitTest\Entity;

class TrainingSession
{
    public function __construct(
        private \DateTimeImmutable $from,
        private \DateTimeImmutable $to,
    ) {
    }

    public function getFrom(): \DateTimeImmutable
    {
        return $this->from;
    }

    public function getTo(): \DateTimeImmutable
    {
        return $this->to;
    }
}
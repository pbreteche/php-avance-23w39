<?php

namespace Pierre\UnitTest;

class Calendar
{
    public function workingDays(\DateTimeImmutable $from, \DateTimeImmutable $to): int
    {
        if ($from > $to) {
            throw new \InvalidArgumentException('La date de fin doit être ultérieure à celle de début');
        }

        $count = 0;
        for ($i = $from; $i <= $to; $i = $i->modify('+1 day')) {
            if (!in_array($i->format('N'), ['6', '7'])) {
                ++$count;
            }
        }

        return $count;
    }
}

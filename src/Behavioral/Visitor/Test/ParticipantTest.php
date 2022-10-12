<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Visitor\Test;

use DesignPatterns\Behavioral\Visitor\LastMinuteCalculator;
use DesignPatterns\Behavioral\Visitor\Participant;
use PHPUnit\Framework\TestCase;

final class ParticipantTest extends TestCase
{
    public function testCanCalculateLastMinutePriceForParticipant(): void
    {
        $participant = new Participant(false);

        self::assertSame(500.00, $participant->calculatePrice(new LastMinuteCalculator(500.00)));
    }

    public function testCanCalculateLastMinutePriceForVipParticipant(): void
    {
        $participant = new Participant(true);

        self::assertSame(450.00, $participant->calculatePrice(new LastMinuteCalculator(500.00)));
    }
}

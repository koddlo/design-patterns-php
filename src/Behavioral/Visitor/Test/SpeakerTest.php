<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Visitor\Test;

use DesignPatterns\Behavioral\Visitor\LastMinuteCalculator;
use DesignPatterns\Behavioral\Visitor\Speaker;
use PHPUnit\Framework\TestCase;

final class SpeakerTest extends TestCase
{
    public function testCanCalculateLastMinutePriceForSpeaker(): void
    {
        $speaker = new Speaker();

        self::assertSame(0.00, $speaker->calculatePrice(new LastMinuteCalculator(500.00)));
    }
}

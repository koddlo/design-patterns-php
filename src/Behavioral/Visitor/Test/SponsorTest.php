<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Visitor\Test;

use DesignPatterns\Behavioral\Visitor\LastMinuteCalculator;
use DesignPatterns\Behavioral\Visitor\Sponsor;
use DesignPatterns\Behavioral\Visitor\Status;
use PHPUnit\Framework\TestCase;

final class SponsorTest extends TestCase
{
    public function testCanCalculateLastMinutePriceForBronzeSponsor(): void
    {
        $sponsor = new Sponsor(Status::STATUS_BRONZE, false);

        self::assertSame(2500.00, $sponsor->calculatePrice(new LastMinuteCalculator(500.00)));
    }

    public function testCanCalculateLastMinutePriceForBronzeSponsorWithExhibition(): void
    {
        $sponsor = new Sponsor(Status::STATUS_BRONZE, true);

        self::assertSame(12500.00, $sponsor->calculatePrice(new LastMinuteCalculator(500.00)));
    }

    public function testCanCalculateLastMinutePriceForSilverSponsor(): void
    {
        $sponsor = new Sponsor(Status::STATUS_SILVER, false);

        self::assertSame(5000.00, $sponsor->calculatePrice(new LastMinuteCalculator(500.00)));
    }

    public function testCanCalculateLastMinutePriceForSilverSponsorWithExhibition(): void
    {
        $sponsor = new Sponsor(Status::STATUS_SILVER, true);

        self::assertSame(25000.00, $sponsor->calculatePrice(new LastMinuteCalculator(500.00)));
    }

    public function testCanCalculateLastMinutePriceForGoldenSponsor(): void
    {
        $sponsor = new Sponsor(Status::STATUS_GOLDEN, false);

        self::assertSame(150000.00, $sponsor->calculatePrice(new LastMinuteCalculator(500.00)));
    }

    public function testCanCalculateLastMinutePriceForGoldenSponsorWithExhibition(): void
    {
        $sponsor = new Sponsor(Status::STATUS_GOLDEN, true);

        self::assertSame(200000.00, $sponsor->calculatePrice(new LastMinuteCalculator(500.00)));
    }
}

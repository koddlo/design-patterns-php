<?php

declare(strict_types=1);

namespace Behavioral\Observer\Test;

use DateTimeImmutable;
use DesignPatterns\Behavioral\Observer\Conference;
use DesignPatterns\Behavioral\Observer\Sponsor;
use PHPUnit\Framework\TestCase;

final class SponsorTest extends TestCase
{
    public function testShouldStopSubscribingOnlineConference(): void
    {
        $sponsor = new Sponsor();
        $conference = new Conference(new DateTimeImmutable());
        $conference->attach($sponsor);

        $conference->online();

        self::assertSame(0, $conference->countObservers());
    }
}

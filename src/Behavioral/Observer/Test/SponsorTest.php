<?php

declare(strict_types=1);

namespace Behavioral\Observer\Test;

use DesignPatterns\Behavioral\Observer\Conference;
use DesignPatterns\Behavioral\Observer\Sponsor;
use PHPUnit\Framework\TestCase;

class SponsorTest extends TestCase
{
    public function testShouldStopSubscribingOnlineConference(): void
    {
        $sponsor = new Sponsor();
        $conference = new Conference(new \DateTime());
        $conference->attach($sponsor);

        $this->assertSame(1, $conference->countObservers());

        $conference->online();

        $this->assertSame(0, $conference->countObservers());
    }
}

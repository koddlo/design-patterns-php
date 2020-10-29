<?php

declare(strict_types=1);

namespace Behavioral\Observer\Test;

use DesignPatterns\Behavioral\Observer\Conference;
use DesignPatterns\Behavioral\Observer\ConferenceStatistic;
use PHPUnit\Framework\TestCase;

class ConferenceStatisticTest extends TestCase
{
    public function testCanCollectStatisticsForFewConferences(): void
    {
        $conferenceStatistics = new ConferenceStatistic();

        $conference1 = new Conference(new \DateTime());
        $conference1->attach($conferenceStatistics);
        $conference1->online();

        $this->assertSame($conferenceStatistics->countOnline(), 1);

        $conference2 = new Conference(new \DateTime());
        $conference2->attach($conferenceStatistics);
        $conference2->online();

        $this->assertSame($conferenceStatistics->countOnline(), 2);
    }
}

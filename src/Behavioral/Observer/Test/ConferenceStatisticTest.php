<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Observer\Test;

use DateTimeImmutable;
use DesignPatterns\Behavioral\Observer\Conference;
use DesignPatterns\Behavioral\Observer\ConferenceStatistic;
use PHPUnit\Framework\TestCase;

final class ConferenceStatisticTest extends TestCase
{
    public function testCanCollectStatisticsForFewConferences(): void
    {
        $conferenceStatistics = new ConferenceStatistic();
        $conference1 = new Conference(new DateTimeImmutable());
        $conference1->attach($conferenceStatistics);
        $conference2 = new Conference(new DateTimeImmutable());
        $conference2->attach($conferenceStatistics);

        $conference1->online();
        $conference2->online();

        self::assertSame($conferenceStatistics->countOnline(), 2);
    }
}

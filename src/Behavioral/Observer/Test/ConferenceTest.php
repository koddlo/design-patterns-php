<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Observer\Test;

use DateTimeImmutable;
use DesignPatterns\Behavioral\Observer\Conference;
use DesignPatterns\Behavioral\Observer\InvalidConferenceTypeException;
use PHPUnit\Framework\TestCase;
use SplObserver;

final class ConferenceTest extends TestCase
{
    public function testCanNotifyAttachedObserver(): void
    {
        $conference = new Conference(new DateTimeImmutable());
        $splObserverMock = $this->createMock(SplObserver::class);
        $conference->attach($splObserverMock);

        $splObserverMock
            ->expects($this->once())
            ->method('update');

        $conference->notify();
    }

    public function testCannotNotifyDetachedObserver(): void
    {
        $conference = new Conference(new DateTimeImmutable());
        $splObserverMock = $this->createMock(SplObserver::class);
        $conference->attach($splObserverMock);
        $conference->detach($splObserverMock);

        $splObserverMock
            ->expects($this->never())
            ->method('update');

        $conference->notify();
    }

    public function testCanChangeTypeToOnlineIfIsUndecided(): void
    {
        $conferenceUndecided = new Conference(new DateTimeImmutable());

        $conferenceUndecided->online();

        self::assertTrue($conferenceUndecided->isOnline());
    }

    public function testCannotChangeTypeToOnlineIfIsNotUndecided(): void
    {
        $conferenceOffline = (new Conference(new DateTimeImmutable()));
        $conferenceOffline->offline();

        self::expectException(InvalidConferenceTypeException::class);

        $conferenceOffline->online();
    }

    public function testCannotChangeTypeToOfflineIfIsNotUndecided(): void
    {
        $conferenceOnline = (new Conference(new DateTimeImmutable()));
        $conferenceOnline->online();

        self::expectException(InvalidConferenceTypeException::class);

        $conferenceOnline->offline();
    }

    public function testCanChangeTypeToOfflineIfIsUndecided(): void
    {
        $conferenceUndecided = new Conference(new DateTimeImmutable());

        $conferenceUndecided->offline();

        self::assertTrue($conferenceUndecided->isOffline());
    }
}

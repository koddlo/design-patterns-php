<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Observer\Test;

use DesignPatterns\Behavioral\Observer\Conference;
use DesignPatterns\Behavioral\Observer\InvalidConferenceTypeException;
use PHPUnit\Framework\TestCase;

final class ConferenceTest extends TestCase
{
    public function testCanNotifyAttachedObserver(): void
    {
        $conference = new Conference(new \DateTimeImmutable());
        $splObserverMock = $this->createMock(\SplObserver::class);
        $splObserverMock
            ->expects($this->once())
            ->method('update');

        $conference->attach($splObserverMock);
        $conference->notify();
    }

    public function testCannotNotifyDetachedObserver(): void
    {
        $conference = new Conference(new \DateTimeImmutable());
        $splObserverMock = $this->createMock(\SplObserver::class);
        $splObserverMock
            ->expects($this->never())
            ->method('update');

        $conference->attach($splObserverMock);
        $conference->detach($splObserverMock);
        $conference->notify();
    }

    public function testCanChangeTypeToOnlineOnlyIfIsUndecided(): void
    {
        $conferenceUndecided = new Conference(new \DateTimeImmutable());
        $conferenceOffline = (new Conference(new \DateTimeImmutable()));
        $conferenceOffline->offline();

        $conferenceUndecided->online();

        $this->assertTrue($conferenceUndecided->isOnline());

        $this->expectException(InvalidConferenceTypeException::class);

        $conferenceOffline->online();
    }

    public function testCanChangeTypeToOfflineOnlyIfIsUndecided(): void
    {
        $conferenceUndecided = new Conference(new \DateTimeImmutable());
        $conferenceOnline = (new Conference(new \DateTimeImmutable()));
        $conferenceOnline->online();

        $conferenceUndecided->offline();

        $this->assertTrue($conferenceUndecided->isOffline());

        $this->expectException(InvalidConferenceTypeException::class);

        $conferenceOnline->offline();
    }
}

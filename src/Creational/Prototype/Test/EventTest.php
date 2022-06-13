<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\Prototype\Test;

use DateTimeInterface;
use DesignPatterns\Creational\Prototype\City;
use DesignPatterns\Creational\Prototype\Event;
use DesignPatterns\Creational\Prototype\EventPrototypeInterface;
use DesignPatterns\Creational\Prototype\Invitation;
use DesignPatterns\Creational\Prototype\Place;
use PHPUnit\Framework\TestCase;

final class EventTest extends TestCase
{
    public function testIsEventValidAfterCreation(): void
    {
        $event = (new Event(new City(), new Place()))
            ->setBudget(1000000)
            ->addInvitation(new Invitation())
            ->addInvitation(new Invitation());

        self::assertInstanceOf(EventPrototypeInterface::class, $event);
        self::assertIsString($event->getId());
        self::assertInstanceOf(City::class, $event->getCity());
        self::assertInstanceOf(Place::class, $event->getPlace());
        self::assertSame(1000000, $event->getBudget());
        self::assertInstanceOf(DateTimeInterface::class, $event->getCreated());
        self::assertSame($event, $event->getPlace()->getEvent());
        self::assertCount(2, $event->getInvitations());
    }

    public function testIsConfiguredFineAfterClone(): void
    {
        $event = (new Event(new City(), new Place()))
            ->setBudget(1000000)
            ->addInvitation(new Invitation())
            ->addInvitation(new Invitation());

        $cloneEvent = clone $event;

        self::assertNotEquals($event, $cloneEvent);
        self::assertNotSame($event->getId(), $cloneEvent->getId());
        self::assertSame($event->getCity(), $cloneEvent->getCity());
        self::assertSame($event->getBudget(), $cloneEvent->getBudget());
        self::assertNotSame($event->getCreated(), $cloneEvent->getCreated());
        self::assertNotSame($event->getPlace(), $cloneEvent->getPlace());
        self::assertNotSame($event, $cloneEvent->getPlace()->getEvent());
        self::assertEmpty($cloneEvent->getInvitations());
    }
}

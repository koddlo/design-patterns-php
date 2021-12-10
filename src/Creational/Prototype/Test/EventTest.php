<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\Prototype\Test;

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

        $this->assertInstanceOf(EventPrototypeInterface::class, $event);
        $this->assertIsString($event->getId());
        $this->assertInstanceOf(City::class, $event->getCity());
        $this->assertInstanceOf(Place::class, $event->getPlace());
        $this->assertSame(1000000, $event->getBudget());
        $this->assertInstanceOf(\DateTimeInterface::class, $event->getCreated());
        $this->assertSame($event, $event->getPlace()->getEvent());
        $this->assertCount(2, $event->getInvitations());
    }

    public function testIsConfiguredFineAfterClone(): void
    {
        $event = (new Event(new City(), new Place()))
            ->setBudget(1000000)
            ->addInvitation(new Invitation())
            ->addInvitation(new Invitation());

        $cloneEvent = clone $event;

        $this->assertNotEquals($event, $cloneEvent);
        $this->assertNotSame($event->getId(), $cloneEvent->getId());
        $this->assertSame($event->getCity(), $cloneEvent->getCity());
        $this->assertSame($event->getBudget(), $cloneEvent->getBudget());
        $this->assertNotSame($event->getCreated(), $cloneEvent->getCreated());
        $this->assertNotSame($event->getPlace(), $cloneEvent->getPlace());
        $this->assertNotSame($event, $cloneEvent->getPlace()->getEvent());
        $this->assertEmpty($cloneEvent->getInvitations());
    }
}

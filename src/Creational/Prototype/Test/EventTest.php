<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\Prototype\Test;

use DesignPatterns\Creational\Prototype\City;
use DesignPatterns\Creational\Prototype\Event;
use DesignPatterns\Creational\Prototype\EventPrototype;
use DesignPatterns\Creational\Prototype\Invitation;
use DesignPatterns\Creational\Prototype\Place;
use PHPUnit\Framework\TestCase;

class EventTest extends TestCase
{
    private Event $event;

    protected function setUp(): void
    {
        $this->event = (new Event(new City(), new Place()))
            ->setBudget(1000000)
            ->addInvitation(new Invitation())
            ->addInvitation(new Invitation());
    }

    public function testIsEventValidAfterCreation(): void
    {
        $this->assertInstanceOf(EventPrototype::class, $this->event);
        $this->assertIsString($this->event->getId());
        $this->assertInstanceOf(City::class, $this->event->getCity());
        $this->assertInstanceOf(Place::class, $this->event->getPlace());
        $this->assertSame(1000000, $this->event->getBudget());
        $this->assertInstanceOf(\DateTimeInterface::class, $this->event->getCreated());
        $this->assertSame($this->event, $this->event->getPlace()->getEvent());
        $this->assertCount(2, $this->event->getInvitations());
    }

    public function testIsConfiguredFineAfterClone(): void
    {
        $cloneEvent = clone $this->event;

        $this->assertNotEquals($this->event, $cloneEvent);
        $this->assertNotSame($this->event->getId(), $cloneEvent->getId());
        $this->assertSame($this->event->getCity(), $cloneEvent->getCity());
        $this->assertSame($this->event->getBudget(), $cloneEvent->getBudget());
        $this->assertNotSame($this->event->getCreated(), $cloneEvent->getCreated());
        $this->assertNotSame($this->event->getPlace(), $cloneEvent->getPlace());
        $this->assertNotSame($this->event, $cloneEvent->getPlace()->getEvent());
        $this->assertEmpty($cloneEvent->getInvitations());
    }
}

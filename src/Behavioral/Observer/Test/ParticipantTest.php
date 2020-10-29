<?php

declare(strict_types=1);

namespace Behavioral\Observer\Test;

use DesignPatterns\Behavioral\Observer\Conference;
use DesignPatterns\Behavioral\Observer\Participant;
use PHPUnit\Framework\TestCase;

class ParticipantTest extends TestCase
{
    public function testCanBookNewConference(): void
    {
        $participant = new Participant();
        $conference = new Conference(new \DateTime());
        $conference->attach($participant);
        $conference->online();

        $this->assertSame($participant->getCalendar()[$conference->getId()], $conference->getDate()->format('d.m.Y'));
    }

    public function testCannotBookSameConferenceTwice(): void
    {
        $participant = new Participant();
        $conference = new Conference(new \DateTime());
        $conference->attach($participant);
        $conference->changeDate(new \DateTime());
        $conference->online();

        $this->assertCount(1, $participant->getCalendar());
    }

    public function testCannotBookSameDateTwice(): void
    {
        $sameDate = new \DateTime();
        $participant = new Participant();
        $conference1 = new Conference($sameDate);
        $conference1->attach($participant);
        $conference1->online();
        $conference2 = new Conference($sameDate);
        $conference2->attach($participant);
        $conference2->online();

        $this->assertCount(1, $participant->getCalendar());
    }

    public function testIsBookDateChangedWhenNewDateIsFree(): void
    {
        $changedDate = new \DateTime();
        $participant = new Participant();
        $conference = new Conference(new \DateTime());
        $conference->attach($participant);
        $conference->online();
        $conference->changeDate($changedDate);

        $this->assertSame($participant->getCalendar()[$conference->getId()], $changedDate->format('d.m.Y'));
    }

    public function testIsBookDateCanceledWhenNewDateIsNotFree(): void
    {
        $bookedDate = new \DateTime();
        $participant = new Participant();
        $conference1 = new Conference($bookedDate);
        $conference1->attach($participant);
        $conference1->online();

        $conference2 = new Conference((new \DateTime())->modify('+1 days'));
        $conference2->attach($participant);
        $conference2->online();

        $this->assertCount(2, $participant->getCalendar());

        $conference2->changeDate($bookedDate);

        $this->assertCount(1, $participant->getCalendar());
    }
}

<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Observer;

class Participant implements \SplObserver
{
    private array $calendar;

    public function __construct()
    {
        $this->calendar = [];
    }

    public function update(\SplSubject $subject): void
    {
        $conferenceId = $subject->getId();
        $conferenceDate = $subject->getDate();

        if ($this->isDateFree($conferenceId, $conferenceDate)) {
            $this->book($conferenceId, $conferenceDate);
        } else {
            $this->cancel($conferenceId);
        }
    }

    public function getCalendar(): array
    {
        return $this->calendar;
    }

    private function book(string $conferenceId, \DateTime $conferenceDate)
    {
        $this->calendar[$conferenceId] = $conferenceDate->format('d.m.Y');
    }

    private function cancel(string $conferenceId)
    {
        unset($this->calendar[$conferenceId]);
    }

    private function isDateFree(string $conferenceId, \DateTime $date): bool
    {
        return !in_array($date->format('d.m.Y'), $this->calendar)
            || $this->calendar[$conferenceId] === $date->format('d.m.Y');
    }
}

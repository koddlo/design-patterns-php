<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Observer;

use DateTimeImmutable;
use SplObjectStorage;
use SplObserver;
use SplSubject;

final class Conference implements SplSubject
{
    public const TYPE_UNDECIDED = 0;
    public const TYPE_OFFLINE = 1;
    public const TYPE_ONLINE = 2;

    private string $id;

    private int $type;

    private SplObjectStorage $observers;

    public function __construct(
        private DateTimeImmutable $date
    ) {
        $this->id = uniqid();
        $this->type = self::TYPE_UNDECIDED;
        $this->observers = new SplObjectStorage();
    }

    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    public function notify(): void
    {
        /** @var SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function countObservers(): int
    {
        return $this->observers->count();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    public function changeDate(DateTimeImmutable $date): void
    {
        $this->date = $date;
        $this->notify();
    }

    public function isOnline(): bool
    {
        return self::TYPE_ONLINE === $this->type;
    }

    public function isOffline(): bool
    {
        return self::TYPE_OFFLINE === $this->type;
    }

    /**
     * @throws InvalidConferenceTypeException
     */
    public function online(): void
    {
        if (self::TYPE_UNDECIDED !== $this->type) {
            throw new InvalidConferenceTypeException();
        }

        $this->type = self::TYPE_ONLINE;
        $this->notify();
    }

    /**
     * @throws InvalidConferenceTypeException
     */
    public function offline(): void
    {
        if (self::TYPE_UNDECIDED !== $this->type) {
            throw new InvalidConferenceTypeException();
        }

        $this->type = self::TYPE_OFFLINE;
        $this->notify();
    }
}

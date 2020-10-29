<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Observer;

class Conference implements \SplSubject
{
    public const TYPE_UNDECIDED = 0;
    public const TYPE_OFFLINE = 1;
    public const TYPE_ONLINE = 2;

    private string $id;

    private \DateTime $date;

    private int $type;

    private \SplObjectStorage $observers;

    public function __construct(\DateTime $date)
    {
        $this->id = uniqid();
        $this->date = $date;
        $this->type = self::TYPE_UNDECIDED;
        $this->observers = new \SplObjectStorage();
    }

    public function attach(\SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    public function notify(): void
    {
        /** @var \SplObserver $observer */
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

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function changeDate(\DateTime $date): void
    {
        $this->date = $date;
        $this->notify();
    }

    public function offline(): void
    {
        if ($this->type !== self::TYPE_UNDECIDED) {
            throw new InvalidConferenceTypeException();
        }

        $this->type = self::TYPE_OFFLINE;
        $this->notify();
    }

    public function isOffline(): bool
    {
        return $this->type === self::TYPE_OFFLINE;
    }

    public function online(): void
    {
        if ($this->type !== self::TYPE_UNDECIDED) {
            throw new InvalidConferenceTypeException();
        }

        $this->type = self::TYPE_ONLINE;
        $this->notify();
    }

    public function isOnline(): bool
    {
        return $this->type === self::TYPE_ONLINE;
    }
}

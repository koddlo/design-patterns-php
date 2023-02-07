<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\State;

final class Task
{
    private int $estimatePoints = 0;

    private StateInterface $state;

    public function __construct() {
        $this->state = new Open();
    }

    /**
     * @throws InvalidStateException
     */
    public function changeState(State $state): void
    {
        $this->state = $this->state->move($state);
    }

    /**
     * @throws InvalidStateException
     */
    public function estimate(int $points): void
    {
        if (! $this->state->canEstimate()) {
            throw new InvalidStateException();
        }

        $this->estimatePoints = $points;
    }

    public function isOpen(): bool
    {
        return $this->state instanceof Open;
    }

    public function isInProgress(): bool
    {
        return $this->state instanceof InProgress;
    }

    public function isResolved(): bool
    {
        return $this->state instanceof Resolved;
    }

    public function isClosed(): bool
    {
        return $this->state instanceof Closed;
    }

    public function isReopened(): bool
    {
        return $this->state instanceof Reopened;
    }

    public function getEstimatePoints(): int
    {
        return $this->estimatePoints;
    }
}

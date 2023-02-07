<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\State;

final class Closed implements StateInterface
{
    public function move(State $state): StateInterface
    {
        return match ($state) {
            State::REOPENED => new Reopened(),
            State::RESOLVED => new Resolved(),
            default => throw new InvalidStateException()
        };
    }

    public function canEstimate(): bool
    {
        return false;
    }
}
